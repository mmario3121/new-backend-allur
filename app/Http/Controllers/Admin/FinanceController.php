<?php

namespace App\Http\Controllers\Admin;

use App\Models\FinanceApplication;
use App\Models\FinanceCity;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
class FinanceController extends Controller
{
    //
    public function users(){
        $roles = ['admin_finance', 'manager_finance', 'regional_finance'];
        $users = User::role($roles)->get();
        return view('admin.finance-users.index', compact('users'));
    }

    //applications
    public function applications(){
        // dd(auth()->user()->city_ids());
        if(auth()->user()->hasRole('admin')){
            $applications = FinanceApplication::paginate(10);
        }else{
            $applications = FinanceApplication::whereIn('city_id', auth()->user()->city_ids())->paginate(10);
        }
        return view('admin.finance-applications.index', compact('applications'));
    }

    public function cities(){
        $cities = FinanceCity::select('id', 'name')->get();

        // Initialize an array with the empty entry
        $jsonResponse = [
            [
                'id' => '',
                'value' => '',
                'key' => 'Выберите город',
            ],
        ];

        // Add cities to the JSON response
        foreach ($cities as $city) {
            $jsonResponse[] = [
                'id' => $city->id,
                'value' => (string)$city->id,
                'key' => $city->name,
            ];
        }
        return new JsonResponse($jsonResponse, Response::HTTP_OK);
    }

}
