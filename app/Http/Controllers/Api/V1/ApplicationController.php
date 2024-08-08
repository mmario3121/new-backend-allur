<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Application;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Resources\V1\ArticleResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use DateTime;
use DateTimeZone;
use PHPMailer\PHPMailer\PHPMailer;

class ApplicationController extends Controller
{
    public function store(Request $request){
        //name, phone, dealer_id, brand, model
        
    
        try {
            $validated = $request->validate([
                'name' => 'required|string',
                'phone' => 'required|string',
                'dealer' => 'nullable',
                'model' => 'required',
                'city' => 'required|string|in:al,as',
                'type' => 'nullable|string',
                'brand' => 'required|string|in:kia,hongqi,jac,skoda',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return new JsonResponse([
                'message' => 'Validation Error',
                'errors' => $e->errors(),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $application = new Application();
        $application->name = $validated['name'];
        $application->phone = $validated['phone'];
        $application->dealer = $validated['dealer'];
        $application->model = $validated['model'];
        $application->city = $validated['city'];
        $application->type = $request->type;
        $application->brand = $validated['brand'];
        $application->comment = $request->comment;
        $application->save();
        if($application->contact_id = $this->submit($application)){
            $application->status = 1;
            $application->save();
            return new JsonResponse([
                'message' => 'success',
            ], Response::HTTP_CREATED);
        }
        else{
            return new JsonResponse([
                'message' => 'error',
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function submit(Application $application){
        $contact_list_response = $this->send("crm.contact.list", [
            'filter' => [
                'PHONE' => "+7". $application->phone
            ]
            ], $application->brand);
        if(!empty($contact_list_response)){
            $contactID = $contact_list_response[0]['ID'];
        }else{
            $contactID = null;
        }

        $contact_list_response = $this->send("crm.contact.list", [
            'filter' => [
                'PHONE' => "8". $application->phone
            ]
            ], $application->brand);
        if(!empty($contact_list_response)){
            if($contactID !== null){
                if($contactID > $contact_list_response[0]['ID']){
                    $contactID = $contact_list_response[0]['ID'];
                }
            }else{
                $contactID = $contact_list_response[0]['ID'];
            }
        }
        $contact_list_response = $this->send("crm.contact.list", [
            'filter' => [
                'PHONE' => "7". $application->phone
            ]
            ], $application->brand);
        if(!empty($contact_list_response)){
            if($contactID !== null){
                if($contactID > $contact_list_response[0]['ID']){
                    $contactID = $contact_list_response[0]['ID'];
                }
            }
            else{
                $contactID = $contact_list_response[0]['ID'];
            }
        }
        if($contactID === null){
            $contact_response = $this->send("crm.contact.add", [
                "fields" => [
                    "NAME" => $application->name,
                    "PHONE" => [[
                        "VALUE" => $application->phone,
                        "VALUE_TYPE" => "WORK"]],
                    "EMAIL" => [[
                        "VALUE" => ''
                        ]]
                ],
            ], $application->brand);
            $contactID = $contact_response;
            if(!$contactID){
                return false;
            }
        }
        if ($contactID) {
            $deal_fields = $this->arrayBuilder($application, $contactID);
            $deal_response = $this->send("crm.deal.add", ["fields" => $deal_fields], $application->brand);
            if($deal_response){
                return $contactID;
            }
        }
    }

    public static function send($method, $data, $brand)
    {
        if ($brand === 'kia'){
            $url = "https://kia-allur.bitrix24.kz/rest/432/cqxd4kj8iw9zxbw0/";
        }elseif ($brand === 'hongqi'){
            $url = "https://hongqi-allur.bitrix24.kz/rest/1/volowfdbjo6g04s0/";
        }elseif ($brand === 'jac'){
            $url = "https://jac-allur.bitrix24.kz/rest/1/kepzqllbooctqmky/";
        }elseif ($brand === 'skoda'){
            $url = "https://skoda.allur.kz/rest/1/rrj7jbal1s58vgf5/";
        }else {
            return false;
        }
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_POST => true,
            CURLOPT_HEADER => false,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_URL => $url . $method,
            CURLOPT_POSTFIELDS => http_build_query($data),
        ]);
        $result = curl_exec($curl);
        curl_close($curl);
        $result = json_decode($result, true);

        if (!isset($result['result'])) {
            return false;
        }

        return $result['result'];
    }

    public static function arrayBuilder(Application $application, $contactID){
        $timezone = new DateTimeZone('Asia/Almaty');
        $currentDateTime = new DateTime('now', $timezone);
        $formattedTime = $currentDateTime->format('Y-m-d\TH:i:sP');
        if ($application->brand == 'kia'){
            if ($application->city == 'al'){
                $cityId = 110;
            }elseif ($application->city == 'as'){
                $cityId = 116;
            }
            $deal_fields = [
                "UF_CRM_1686750597" => $cityId,  
                "CATEGORY_ID" => 2,               
                "STAGE_ID" => "C2:NEW",           
                "UF_CRM_1686845874" => 304,       
                "SOURCE_ID" => "WEBFORM",
                "UF_CRM_1686843703" => 212,       
                "UF_CRM_1687071392" => "allur.kz",
                "UF_CRM_1686842116" => 196,          
                "UF_CRM_1686814065" => intval($application->model), 
                "CONTACT_ID" => $contactID,    
                "COMMENTS" => isset($application->comment) ? $application->comment : '',
                "UF_CRM_1687511544" => $formattedTime,
            ];
        }elseif ($application->brand == 'hongqi'){
            if ($application->city == 'al'){
                $cityId = 16;
            }elseif ($application->city == 'as'){
                $cityId = 14;
            }
            $deal_fields = [
                "UF_CRM_1604656131" => $cityId,
                "CATEGORY_ID" => 2,
                "STAGE_ID" => "C2:NEW",
                "UF_CRM_1590070364" => 1238,
                "SOURCE_ID" => "WEBFORM",
                "UF_CRM_1613979771" => 4074,
                "UF_CRM_1634038284" => "allur.kz",
                "UF_CRM_1586840541" => 4144,             
                "UF_CRM_1657876982" => 1212,             
                "UF_CRM_1611565554" => intval($application->model),
                "CONTACT_ID" => $contactID,                           
                "COMMENTS" => isset($application->comment) ? $application->comment : '',
            ];
        }elseif ($application->brand == 'jac'){
            if ($application->city == 'al'){
                $cityId = 8;
            }elseif ($application->city == 'as'){
                $cityId = 12;
            }
            $deal_fields = [
                "UF_CRM_1686750597" => $cityId,
                "CATEGORY_ID" => 4,
                "STAGE_ID" => "C4:NEW",
                "UF_CRM_1686845874" => 376,     
                "SOURCE_ID" => "WEBFORM",
                "UF_CRM_1686843703" => 274,     
                "UF_CRM_1687071392" => "allur.kz",
                "UF_CRM_1686842116" => 265,          
                "UF_CRM_1686814065" => intval($application->model),
                "CONTACT_ID" => $contactID,                           
                "COMMENTS" => isset($application->comment) ? $application->comment : '',
            ];
        }elseif ($application->brand == 'skoda'){
            if ($application->city == 'al'){
                $cityId = 23;
            }elseif ($application->city == 'as'){
                $cityId = 26;
            }
            $deal_fields = [
                "UF_CRM_1686750597" => $cityId,
                "CATEGORY_ID" => 7,         
                "STAGE_ID" => "C7:NEW",     
                "UF_CRM_1686845874" => 783, 
                "SOURCE_ID" => "WEBFORM",
                "UF_CRM_1686843703" => 732, 
                "UF_CRM_1687071392" => "allur.kz",
                "UF_CRM_1686842116" => 729,      
                "UF_CRM_1686814065" => intval($application->model),
                "CONTACT_ID" => $contactID,                           
                "COMMENTS" => isset($application->comment) ? $application->comment : '',
            ];
        }
        return $deal_fields;
    }


    public static function sendFinance(Request $request){
        try{
            $validated = $request->validate([
                'name' => 'required|string',
                'phone' => 'required|string',
                'city' => 'required|string|in:al,as',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return new JsonResponse([
                'message' => 'Validation Error',
                'errors' => $e->errors(),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

            if($validated['city'] == 'al'){
                $validated['city'] = 'Алматы';
            }else{
                $validated['city'] = 'Астана';
            }
            $tableHtml = '<table>';
            foreach ($validated as $key => $value) {
                    $tableHtml .= '<tr>';
                    $tableHtml .= '<td>' . htmlspecialchars($key) . '</td>';
                    $tableHtml .= '<td>' . htmlspecialchars($value) . '</td>';
                    $tableHtml .= '</tr>';
            }
            $tableHtml .= '</table>';
        
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->CharSet = "UTF-8";
            $mail->Host = 'smtp.yandex.ru';
            $mail->SMTPAuth = true;
            $mail->Username = 'babylonmailer@yandex.by';
            $mail->Password = 'egqvtsowfmksdwpq';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('babylonmailer@yandex.by', 'allur.kz');
            $mail->isHTML(true);
            if($validated['city'] == 'Алматы'){
                $mail->addAddress('a.utargalieva@allur.kz');
                $mail->addAddress('m.mukhamedkhafizov@allur.kz');
                $mail->addAddress('se.andreev@allur.kz');
                $mail->addAddress('m.boshe@allur.kz');
                $mail->addAddress('b.aytenova@allur.kz');
            }else{
                $mail->addAddress('l.hamze@allur.kz');
                $mail->addAddress('m.mustafina@allur.kz');
                $mail->addAddress('a.shildibaeva@allur.kz');
            }
            $mail->Subject = 'Заявка с сайта Allur';
            $mail->Body = $tableHtml;
    
            if($mail->send()){
                return new JsonResponse([
                    'message' => 'success',
                ], Response::HTTP_CREATED);
            }
        }

        public static function sendTradeIn(Request $request){
            try{
                $validated = $request->validate([
                    'name' => 'required|string',
                    'phone' => 'required|string',
                    'city' => 'required|string|in:al,as',
                ]);
            } catch (\Illuminate\Validation\ValidationException $e) {
                return new JsonResponse([
                    'message' => 'Validation Error',
                    'errors' => $e->errors(),
                ], Response::HTTP_UNPROCESSABLE_ENTITY);
            }
    
                if($validated['city'] == 'al'){
                    $validated['city'] = 'Алматы';
                }else{
                    $validated['city'] = 'Астана';
                }
                $tableHtml = '<table>';
                foreach ($validated as $key => $value) {
                        $tableHtml .= '<tr>';
                        $tableHtml .= '<td>' . htmlspecialchars($key) . '</td>';
                        $tableHtml .= '<td>' . htmlspecialchars($value) . '</td>';
                        $tableHtml .= '</tr>';
                }
                $tableHtml .= '</table>';
            
                $mail = new PHPMailer();
                $mail->isSMTP();
                $mail->CharSet = "UTF-8";
                $mail->Host = 'smtp.yandex.ru';
                $mail->SMTPAuth = true;
                $mail->Username = 'babylonmailer@yandex.by';
                $mail->Password = 'egqvtsowfmksdwpq';
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;
                $mail->setFrom('babylonmailer@yandex.by', 'allur.kz');
                $mail->isHTML(true);
                if($validated['city'] == 'Алматы'){
                    $mail->addAddress('g.gimadov@allur.kz');
                }else{
                    $mail->addAddress('allurtrade-in@allur.kz');
                }
                $mail->Subject = 'Заявка с сайта Allur';
                $mail->Body = $tableHtml;
        
                if($mail->send()){
                    return new JsonResponse([
                        'message' => 'success',
                    ], Response::HTTP_CREATED);
                }
            }
}
