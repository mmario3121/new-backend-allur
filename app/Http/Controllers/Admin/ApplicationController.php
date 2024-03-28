<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Application\UpdateApplicationRequest;
use App\Models\Application;
use App\Models\City;
use App\Services\Admin\ApplicationService;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    protected ApplicationService $service;

    public function __construct(ApplicationService $applicationService)
    {
        $this->service = $applicationService;
    }

    public function index(Request $request)
    {
        $applications = Application::query()
            ->withTranslations()
            ->when($request->filled('search'), function ($query) use ($request) {
                $keywords = explode(' ', $request->input('search'));

                $query->where(function ($query) use ($keywords) {
                    foreach ($keywords as $keyword) {
                        $query->whereHas('city.titleTranslate', function ($query) use ($keyword) {
                            $query->where('ru', 'like', "%$keyword%")
                                ->orWhere('kz', 'like', "%$keyword%");
                        })->where('id', 'like', "%$keyword%")
                            ->orWhere('name', 'like', "%$keyword%")
                            ->orWhere('email', 'like', "%$keyword%")
                            ->orWhere('phone', 'like', "%$keyword%");
                    }
                });
            })
            ->latest()
            ->paginate(30);
        return view('admin.applications.index', ['applications' => $applications]);
    }

    public function show(Application $application)
    {
        return view('admin.applications.show', ['application' => $application]);
    }

    public function edit(Application $application)
    {
        $data['statuses'] = Application::STATUSES;
        $data['cities'] = City::query()->withTranslations()->get();
        $data['application'] = $application;
        return view('admin.applications.edit', $data);
    }

    public function update(UpdateApplicationRequest $request, Application $application)
    {
        try {
            $this->service->update($application, $request->validated());
        } catch (\Exception $exception) {
            return back()->withInput()
                ->withErrors($exception->getMessage());
        }

        return redirect()->route('admin.applications.index')
            ->with('success', trans('messages.success_updated'));
    }

    public function destroy(Application $application)
    {
        try {
            $this->service->delete($application);
        } catch (\Exception $exception) {
            return back()->withErrors($exception->getMessage());
        }

        return redirect()->route('admin.applications.index')
            ->with('success', trans('messages.success_deleted'));
    }

    //mark all status as read

    public function markAsRead(){
        $applications = Application::query()->where('status', 1)->get();
        foreach ($applications as $application){
            $application->status = 2;
            $application->save();
        }
        return redirect()->route('admin.applications.index')
        ->with('success', trans('messages.success_updated'));
    }

    //resend
    public function submit(Request $request){
        $application = Application::query()->find($request->application);
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
        if ($contactID) {
            $deal_fields = [
                "UF_CRM_1604656131" => $application->dealer, //ДЦ
                "CONTACT_ID" => $contactID,
                "CATEGORY_ID" => 2,
                "SOURCE_ID" => "WEBFORM",
                "STAGE_ID" => "C2:NEW",
                "UF_CRM_1590070364" => 1238,
                "UF_CRM_1613979771" => 4074,
                "COMMENTS" => "",
                "UF_CRM_1611565554" => $application->model,
                "UF_CRM_1634038284" => 'hongqi-auto.kz',
                "UF_CRM_1657876982" => 1210,
                "UF_CRM_1586840541" => 4140,
                "UF_CRM_1586841138" => 4006,
            ];

            $deal_response = $this->send("crm.deal.add", ["fields" => $deal_fields]);
            if($deal_response){
                $application->status = 1;
                $application->save();
                return redirect()->route('admin.applications.index')
                ->with('success', trans('messages.success_updated'));
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
