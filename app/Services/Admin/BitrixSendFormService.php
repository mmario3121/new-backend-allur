<?php

namespace App\Services\Admin;

class BitrixSendFormService
{
    public static $dealerIds = [
        'al' => [
            'chevrolet' => 13,
            'kia' => 874,
            'jac' => 127,
            'lada' => 725,
            'jetour' => 893,
            'skoda' => 23,
        ],
        'as' => [
            'chevrolet' => 915,
            'kia' => 225,
            'jac' => 11,
            'lada' => 731,
            'jetour' => 894,
            'skoda' => 23,
        ],
    ];

    public static $cityIds = [
        'al' => 1742,
        'as' => 1758,
    ];

    public static $brandIds = [
        'chevrolet' => 2907,
        'kia' => 2909,
        'jac' => 2911,
        'lada' => 2913,
        'jetour' => 12434,
    ];

    public static $categoryIds = [
        'chevrolet' => 79,
        'kia' => 71,
        'jac' => 87,
        'lada' => 125,
        'jetour' => 148,
    ];

    public static $appealCategoryIds = [
        'chevrolet' => 0,
        'kia' => 0,
        'jac' => 0,
        'lada' => 0,
        'jetour' => 0,
    ];

    public static $stageIds = [
        'chevrolet' => 'C79:NEW',
        'kia' => 'C71:NEW',
        'jac' => 'C87:NEW',
        'lada' => 'C125:NEW',
        'jetour' => 'C148:NEW',
    ];

    public static $serviceCategoryIds = [
        'chevrolet' => 77,
        'kia' => 61,
        'jac' => 85,
        'lada' => 123,
        'jetour' => 148,
    ];

    public static $formNames = [
        'purchase' => 'Покупка',
        'service' => 'Сервис',
        'appeal' => 'Обращение',
        'purchaseDetail' => 'Получить консультацию'
    ];

    public static array $fieldCodes = [
        'kia' => 'UF_CRM_1611565554',
        'chevrolet' => 'UF_CRM_1592391634',
        'jac' => 'UF_CRM_1611036044',
        'lada' => 'UF_CRM_1623400893',
        'jetour' => 'UF_CRM_1680491934',
    ];

    public static function sendPurchase($request)
    {
        $brand = mb_strtolower($request['brand']);

        if ($request['cityCode'] === 'ns') {
            $request['cityCode'] = 'as';
        }
        if (isset(static::$dealerIds[$request['cityCode']][$brand])) {
            $dealerId = static::$dealerIds[$request['cityCode']][$brand];
            \Log::channel('dev')->info('dealerId :'. $dealerId);
            $stageId = static::$stageIds[$brand];
            $categoryId = static::$categoryIds[$brand];
            $contactId = static::getContact($request['name'], str_replace(['(', ')', '+', ' ', '-'], '', $request['phone']), static::$cityIds[$request['cityCode']]);

            $data = [
                'fields' => [
                    'UF_CRM_1604656131' => $dealerId,
                    'CATEGORY_ID' => $categoryId,
                    'STAGE_ID' => $stageId,
                    'UF_CRM_1612504156' => static::$brandIds[$brand],
                    'UF_CRM_1590070364' => 6207,
                    'SOURCE_ID' => 'WEBFORM',
                    'UF_CRM_1613979771' => 3051,
                    'UF_CRM_1634038284' => 'https://allur.kz/',
                    'UF_CRM_1586840541' => 5519,
                    'UF_CRM_1609922283' => static::$cityIds[$request['cityCode']],
                    'UF_CRM_1657876982' => 10438,
                    'COMMENTS' => $request['comment'] ?? '',
                    'CONTACT_ID' => $contactId,
                ],
                'params' => ['REGISTER_SONET_EVENT' => 'Y']
            ];
            \Log::channel('dev')->info('data :'. json_encode($data));

            if (isset(static::$fieldCodes[$brand])) {
                $data['fields'][static::$fieldCodes[$brand]] = $request['model'];
            }
            //if getContact returns false don't send
            if ($contactId === false) {
                \Log::channel('dev')->info('contact == false, didnt send');
                return [];
            }
            $result = static::send($data, 'crm.deal.add');

            if (!empty($result)) {
                return [
                    'client_id' => $contactId,
                    'deal_id' => $result
                ];
            }
            \Log::channel('dev')->info('sent');

            return [];
        }

        return [];
    }

    public static function sendService($request)
    {

        $brand = mb_strtolower($request['brand']);
        $dealerId = static::$dealerIds[$request['cityCode']][$brand];
        $contactId = static::getContact($request['name'], str_replace(['(', ')', '+', ' ', '-'], '', $request['phone']), static::$cityIds[$request['cityCode']]);
        $categoryId = static::$serviceCategoryIds[$brand];

        $data = [
            'fields' => [
                'CATEGORY_ID' => 135,
                'STAGE_ID' => 'C135:NEW',
                'UF_CRM_1612504156' => static::$brandIds[$brand],
                'UF_CRM_1590070364' => 6207,
                'SOURCE_ID' => 'WEBFORM',
                'UF_CRM_1613979771' => 9883,
                'UF_CRM_1634038284' => 'https://allur.kz/',
                'UF_CRM_1586840541' => 8861,
                'UF_CRM_1609922283' => static::$cityIds[$request['cityCode']],
                'UF_CRM_1657876982' => 10438,
                'COMMENTS' => ($request['comment'] ?? '') . ' Дата: ' . $request['date'],
                'CONTACT_ID' => $contactId,
            ],
            'params' => ['REGISTER_SONET_EVENT' => 'Y']
        ];

        if (isset(static::$fieldCodes[$brand])) {
            $data['fields'][static::$fieldCodes[$brand]] = $request['model'];
        }

        $result = static::send($data, 'crm.deal.add');

        if (!empty($result)) {
            return [
                'client_id' => $contactId,
                'deal_id' => $result
            ];
        }

        return [];
    }

    public static function getContact($name, $phone, $city)
    {
        $contact = [
            'filter' => [
                'PHONE' => $phone
            ],
            'select' => ['id', 'name', 'EMAIL', 'PHONE']
        ];
        $contacts = static::send($contact, 'crm.contact.list');
        if ($contacts) {
            if (count($contacts) > 0) {
                $contactId = current($contacts)['ID'];
            } 
        } else {
            $contact = [
                'fields' => [
                    'NAME' => $name,
                    "SECOND_NAME" => "",
                    "LAST_NAME" => '',
                    "OPENED" => "Y",
                    "UF_CRM_1588154130" => $city,
                    'PHONE' => [
                        [
                            'VALUE' => $phone,
                            "VALUE_TYPE" => "WORK"
                        ]
                    ],
                ],
                'params' => ['REGISTER_SONET_EVENT' => 'Y']
            ];

            $contactId = static::send($contact, 'crm.contact.add');
        }

        return $contactId;
    }

    public static function send($data, $method)
    {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_POST => true,
            CURLOPT_HEADER => false,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_URL => env('BITRIX_SEND_FORM') . $method,
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
}
