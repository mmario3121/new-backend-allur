<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
class RoleController extends Controller
{
    //
    public function index(){
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    public function create(){
        return view('admin.roles.create');
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required|unique:roles'
        ]);
        Role::create([
            'name' => $request['name'],
        ]
        );
        return redirect()->route('admin.roles.index')->with('success', 'Роль успешно добавлена');
    }

    // public function assignRoleGenerate(){
    //     // Role::create(['name' => 'asda']);
    //     // Role::create(['name' => 'manager']);
    //     // Role::create(['name' => 'manager_finance']);
    //     // Role::create(['name' => 'regional_finance']);
    //     $admin = User::where('email', 'admin@allur.kz')->first();
    //     $admin->assignRole(['admin']);

    //     //query with 200 user chunks
    //     User::whereNot('email', 'admin@allur.kz')->chunk(200, function ($users) {
    //         foreach ($users as $user) {
    //             $user->assignRole(['user']);
    //         }
    //     });
    //     dd('success');
    // }
}
