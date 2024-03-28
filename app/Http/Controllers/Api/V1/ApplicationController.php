<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Application;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Resources\V1\ArticleResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ApplicationController extends Controller
{
    public function store(Request $request){
        //name, phone, dealer_id, brand, model
        $application = new Application();
        $application->name = $request->name;
        $application->phone = $request->phone;
        $application->dealer = $request->dealer;
        $application->model = $request->model;
        $application->city_id = $request->city;
        $application->type = $request->type;
        $application->save();
        if($application->contact_id = $this->submit($application)){
            $application->status = 1;
            $application->save();
            return new JsonResponse([
                'message' => 'success',
            ], Response::HTTP_OK);
        }
    }

    public function submit(Application $application){
        $contact_list_response = $this->send("crm.contact.list", [
            'filter' => [
                'PHONE' => "+7". $application->phone
            ]
        ]);
        if(!empty($contact_list_response)){
            $contactID = $contact_list_response[0]['ID'];
        }else{
            $contactID = null;
        }

        $contact_list_response = $this->send("crm.contact.list", [
            'filter' => [
                'PHONE' => "8". $application->phone
            ]
        ]);
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
        ]);
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
            ]);
            $contactID = $contact_response;
            if(!$contactID){
                return false;
            }
        }
        if($application->type === "model")
        {
            $type = 14476;
        }else{
            $type = 4064;
        }
        if ($contactID) {
            $deal_fields = [
                "UF_CRM_1604656131" => $application->dealer, //ДЦ
                "CONTACT_ID" => intval($contactID),
                "CATEGORY_ID" => 2,
                "SOURCE_ID" => "WEBFORM",
                "STAGE_ID" => "C2:NEW",
                "UF_CRM_1590070364" => 1238,
                "UF_CRM_1613979771" => $type,
                "COMMENTS" => "",
                "UF_CRM_1611565554" => $application->model,
                "UF_CRM_1634038284" => 'hongqi-auto.kz',
                "UF_CRM_1657876982" => 1210,
                "UF_CRM_1586840541" => 4140,
                "UF_CRM_1586841138" => 4006,
            ];
            $deal_response = $this->send("crm.deal.add", ["fields" => $deal_fields]);
            if($deal_response){
                return $contactID;
            }
        }
    }

    public static function send($method, $data)
    {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_POST => true,
            CURLOPT_HEADER => false,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_URL => "https://hongqi-allur.bitrix24.kz/rest/112/gr5gmglzcqo1n33e/" . $method,
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
