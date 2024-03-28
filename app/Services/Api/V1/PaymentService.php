<?php

declare(strict_types=1);

namespace App\Services\Api\V1;

use App\Models\Additional;
use App\Models\AdditionalAccess;
use App\Models\Card;
use App\Models\Course;
use App\Models\CourseAccess;
use App\Models\Guide;
use App\Models\GuideAccess;
use App\Models\Payment;
use App\Models\PaymentItem;
use App\Models\Subscription;
use App\Models\SubscriptionAccess;
use Exception;
use Illuminate\Support\Facades\DB;

class PaymentService
{

    const TERMINAL_ID = '67e34d63-102f-4bd1-898e-370781d0074d';
    const CLIENT_ID = 'test';
    const CLIENT_SECRET = 'yF587AV9Ms94qN2QShFzVR3vFnWkhjbAK3sG';

    /**
     * @throws Exception
     */
    public function payment(array $data): array
    {
        $user = auth()->user();
        $invoiceId = time() . rand(10, 99);
        $amount = 0;
        $description = "";

        if (!isset($data['products'])) {
            return throw new \Exception('Произошла ошибка! Товары не найдено!');
        }

        if (!count($data['products'])) {
            return throw new \Exception('Произошла ошибка! Товары не найдено!');
        }

        info("data: ", ['data' => $data]);

        DB::beginTransaction();
        $payment = Payment::query()->create([
            'user_id' => $user->id,
            'invoice_id' => $invoiceId,
            'amount' => $amount,
            'payment_card' => $data['payment_card'],
            'status' => Payment::NEW
        ]);

        foreach ($data['products'] as $product) {
            $type = $product['type_name'];

            if ($type == 'course') {
                $model = Course::query()->where('id', '=', $product['type_id'])->first();

                if ($model) {
                    PaymentItem::query()->create([
                        'payment_id' => $payment->id,
                        'type_id' => $product['type_id'],
                        'type_name' => 'course',
                        'type_time' => 'infinite',
                        'price' => (int)$model->price
                    ]);

                    $amount += (int)$model->price;
                    $description = $description . 'Курс ';
                }
            } elseif ($type == 'guide') {
                $model = Guide::query()->where('id', '=', $product['type_id'])->first();

                if ($model) {
                    PaymentItem::query()->create([
                        'payment_id' => $payment->id,
                        'type_id' => $product['type_id'],
                        'type_name' => 'guide',
                        'type_time' => 'infinite',
                        'price' => (int)$model->price
                    ]);

                    $amount += (int)$model->price;
                    $description = $description . 'Гайд ';
                }
            } elseif ($type == 'additional') {
                $model = Additional::query()->where('id', '=', $product['type_id'])->first();

                if ($product['type_value'] == 1) {
                    $price = $model->price;
                } else {
                    $price = $model->price_2;
                }

                if ($model) {
                    PaymentItem::query()->create([
                        'payment_id' => $payment->id,
                        'type_id' => $product['type_id'],
                        'type_name' => 'additional',
                        'type_value' => $product['type_value'],
                        'type_time' => 'infinite',
                        'price' => (int)$price
                    ]);

                    $amount += (int)$price;
                    $description = $description . 'Доп.услуга ';
                }
            } else {
                $model = Subscription::query()->where('id', '=', $product['type_id'])->first();
                $price = match ((int)$product['type_time']) {
                    1 => $model->price_1,
                    3 => $model->price_3,
                    6 => $model->price_6,
                    12 => $model->price_12,
                    default => 0,
                };

                info("price", ['$price' => $price]);

                if ($model) {
                    PaymentItem::query()->create([
                        'payment_id' => $payment->id,
                        'type_id' => $product['type_id'],
                        'type_name' => 'subscription',
                        'type_time' => $product['type_time'],
                        'price' => (int)$price
                    ]);

                    $amount += $price;
                    $description = $description . 'Подписка ';
                }
            }

        }

        $requestPayment = [
            'amount' => $amount,
            'description' => $description,
            'phone' => $user->phone ?? null,
            'email' => $user->email ?? null,
        ];

        Payment::query()
            ->where('id', '=', $payment->id)
            ->update([
                'request' => json_encode($requestPayment),
                'amount' => $amount,
                'description' => $description
            ]);

        DB::commit();

        if ($amount < 100) {
            return throw new \Exception('Произошла ошибка! Недосточно сумма для оплаты!');
        }

        $token = $this->getToken($invoiceId, $amount, $description);

        return [
            'token' => $token,
            'amount' => $amount,
            'invoiceId' => $invoiceId
        ];

    }

    public function getToken(string $invoiceId, int $amount, string $description)
    {
        $url = 'https://epay-oauth.homebank.kz/oauth2/token';

        if (app()->environment('local')) {
            $url = 'https://testoauth.homebank.kz/epay2/oauth2/token';
        }

        $request['grant_type'] = 'client_credentials';
        $request['scope'] = "webapi usermanagement email_send verification statement statistics payment";
        $request['client_id'] = self::CLIENT_ID;
        $request['client_secret'] = self::CLIENT_SECRET;
        $request['invoiceID'] = $invoiceId;
        $request['amount'] = $amount;
        $request['description'] = $description;
        $request['currency'] = 'KZT';
        $request['terminal'] = self::TERMINAL_ID;
        $request['postLink'] = '';
        $request['cardSave'] = true;
        $request['failurePostLink'] = '';

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $request
        ]);
        $response = curl_exec($curl);
        curl_close($curl);

        return json_decode($response);
    }


    public function paymentCard(int $amount, $ePayToken, $payment, $card)
    {
        $url = 'https://epay-api.homebank.kz/payments/cards/auth';

        if (app()->environment('local')) {
            $url = 'https://testepay.homebank.kz/api/payments/cards/auth';
        }

        $request['grant_type'] = 'client_credentials';
        $request['scope'] = "webapi usermanagement email_send verification statement statistics payment";
        $request['client_id'] = self::CLIENT_ID;
        $request['client_secret'] = self::CLIENT_SECRET;
        $request['invoiceID'] = $payment->invoice_id;
        $request['amount'] = $amount;
        $request['description'] = $payment->description;
        $request['currency'] = 'KZT';
        $request['terminal'] = self::TERMINAL_ID;
        $request['accountId'] = $card->account_id;
        $request['backLink'] = '';
        $request['failureBackLink'] = '';
        $request['postLink'] = config('EPAY_POST_LINK');
        $request['failurePostLink'] = config('EPAY_FAILED_POST_LINK');
        $request['language'] = 'rus';
        $request['cardSave'] = true;
        $request['paymentType'] = 'cardId';
        $request['cardId'] = [
            'id' => $card->card_id
        ];

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer " . $ePayToken->access_token
            ),
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $request
        ]);
        $response = curl_exec($curl);
        curl_close($curl);

        return json_decode($response);
    }

    /**
     * @param array $data
     * @return string
     * @throws Exception
     */
    public function result(array $data): string
    {
        $invoiceId = trim($data['invoiceId']);
        $payment = Payment::query()
            ->where('invoice_id', '=', $invoiceId)
            ->where('status', '=', 0)
            ->with('paymentItems')
            ->first();

        try {
            if ($payment) {
                Payment::query()->where('id', '=', $payment->id)
                    ->update([
                        'status' => $data['status'],
                        'response' => json_encode($data),
                    ]);

                if (count($payment->paymentItems) && $data['status'] == Payment::PAYED) {
                    foreach ($payment->paymentItems as $paymentItem) {
                        if ($paymentItem->type_name == 'course') {
                            $courseAccess = CourseAccess::query()
                                ->where('user_id', '=', $payment->user_id)
                                ->where('course_id', '=', $paymentItem->type_id)
                                ->first();

                            if (!$courseAccess) {
                                $courseAccess = CourseAccess::query()->create([
                                    'user_id' => $payment->user_id,
                                    'course_id' => $paymentItem->type_id
                                ]);

                                $paymentItem->update([
                                    'type_access_id' => $courseAccess->id
                                ]);
                            }
                        } elseif ($paymentItem->type_name == 'guide') {
                            $guideAccess = GuideAccess::query()
                                ->where('user_id', '=', $payment->user_id)
                                ->where('guide_id', '=', $paymentItem->type_id)
                                ->first();

                            if (!$guideAccess) {
                                $guideAccess = GuideAccess::query()->create([
                                    'user_id' => $payment->user_id,
                                    'guide_id' => $paymentItem->type_id
                                ]);

                                $paymentItem->update([
                                    'type_access_id' => $guideAccess->id
                                ]);
                            }
                        } elseif ($paymentItem->type_name == 'additional') {
                            $additionalAccess = AdditionalAccess::query()->create([
                                'user_id' => $payment->user_id,
                                'additional_id' => $paymentItem->type_id,
                                'type_value' => $paymentItem->type_value,
                            ]);

                            $paymentItem->update([
                                'type_access_id' => $additionalAccess->id
                            ]);
                        } else {
                            SubscriptionAccess::query()
                                ->where('user_id', '=', $payment->user_id)
                                ->where('status', '=', 1)
                                ->update(['status' => 0]);

                            $month = in_array($paymentItem->type_time, Subscription::MONTHS) ? $paymentItem->type_time : Subscription::DEFAULT_MONTH;

                            $startDate = now();
                            $endDate = $startDate->addMonths((int)$month);

                            $subscriptionAccess = SubscriptionAccess::query()->create([
                                'user_id' => $payment->user_id,
                                'subscription_id' => $paymentItem->type_id,
                                'start_date' => $startDate,
                                'end_date' => $endDate,
                            ]);

                            $paymentItem->update([
                                'type_access_id' => $subscriptionAccess->id
                            ]);

                        }

                    }
                }

//                if (isset($data['cardId'])) {
//                    $card = Card::query()
//                        ->where('user_id', '=', $payment->user_id)
//                        ->where('card_id', '=', $data['cardId'])
//                        ->first();
//
//                    if (!$card) {
//                        $ePaySavedCard = $this->getSavedCard($data['accountId']);
//                        info('$ePaySavedCard', ['$ePaySavedCard' => $ePaySavedCard]);
//
//                        Card::query()->create([
//                            'user_id' => $payment->user_id,
//                            'card_id' => $data['cardId'],
//                            'account_id' => $data['accountId'],
//                            'payer_name' => $ePaySavedCard['PayerName'] ?? null,
//                            'card_mask' => $ePaySavedCard['CardMask'] ?? null,
//                            'created_date' => $ePaySavedCard['CreatedDate'] ?? null,
//                        ]);
//                    }
//                }

            }

            return $data['status'] == 1 ? Payment::PAYMENT_SUCCESS : Payment::PAYMENT_FAILED;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    private function getSavedCard(mixed $accountId)
    {
        $url = 'https://testepay.homebank.kz/api/cards/' . $accountId;

        if (app()->environment('local')) {
            $url = 'https://epay-api.homebank.kz/cards/' . $accountId;
        }

        $request['grant_type'] = 'client_credentials';
        $request['client_id'] = self::CLIENT_ID;
        $request['client_secret'] = self::CLIENT_SECRET;

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer dGVzdGNsaWVudDpzZWNyZXQ="
            ),
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_POSTFIELDS => $request
        ]);
        $response = curl_exec($curl);
        curl_close($curl);

        return json_decode($response);
    }
}
