<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\FinanceCity;
use App\Http\Controllers\Controller;

class FinanceCityController extends Controller
{
    //
    public function index()
    {
        $finance_cities = FinanceCity::all();
        return view('admin.finance-cities.index', compact('finance_cities'));
    }

    public function create()
    {
        return view('admin.finance-cities.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:finance_cities',
            'email' => 'required|email'
        ]);
        FinanceCity::create([
            'name' => $request['name'],
            'email' => $request['email']
        ]
        );
        return redirect()->route('admin.finance-cities.index')->with('success', 'Город успешно добавлен');
    }
    public function edit($id)
    {
        $finance_city = FinanceCity::find($id);
        return view('admin.finance-cities.edit', compact('finance_city'));
    }

    public function update(Request $request, $id)
    {
        $financeCity = FinanceCity::find($id);
        $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);
        $financeCity->update([
            'name' => $request['name'],
            'email' => $request['email'],
        ]);
        return redirect()->route('admin.finance-cities.index')->with('success', 'Город успешно обновлен');
    }

    public function destroy($id)
    {
        $financeCity = FinanceCity::find($id);
        $financeCity->delete();
        return redirect()->route('admin.finance-cities.index')->with('success', 'Город успешно удален');
    }
}
