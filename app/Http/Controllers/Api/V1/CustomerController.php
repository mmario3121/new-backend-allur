<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (! $token = auth('customer')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    public function register(Request $request)
    {
        //email, password, name, surname, phone, city_id, address, gender, birth_date, iin, is_active, is_subscribed, is_notified
        $customer = new Customer();
        $customer->email = $request->email;
        $customer->password = bcrypt($request->password);
        $customer->name = $request->name;
        $customer->surname = $request->surname;
        $customer->phone = $request->phone;
        $customer->city_id = $request->city_id;
        $customer->address = $request->address;
        $customer->gender = $request->gender;
        $customer->birth_date = $request->birth_date;
        $customer->iin = $request->iin;
        $customer->is_active = $request->is_active;
        $customer->is_subscribed = $request->is_subscribed;
        $customer->is_notified = $request->is_notified;

        $customer->save();

        return $this->login($request);
    }

    public function me()
    {
        return response()->json(auth('customer')->user());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => config('jwt.ttl') * 60
        ]);
    }
}
