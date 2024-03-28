<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreUserRequest;
use App\Http\Requests\Admin\User\UpdateUserRequest;
use App\Models\City;
use App\Models\User;
use App\Services\Admin\User\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public UserService $service;

    public function __construct(UserService $userService)
    {
        $this->service = $userService;
    }

    public function index(Request $request): View
    {
        if (auth()->user()->hasRole(['developer'])) {
            $roles = ['developer', 'admin', 'manager', 'dealer'];
        } else {
            $roles = ['admin', 'manager', 'dealer'];
        }

        $users = User::query()
            ->when($request->filled('search'), function ($query) use ($request) {
                $query->where('id', 'like', "%$request->search%")
                    ->orWhere('name', 'like', "%$request->search%")
                    ->orWhere('email', 'like', "%$request->search%")
                    ->orWhere('phone', 'like', "%$request->search%");
            })
            ->role($roles)
            ->paginate(20);

        return view('admin.users.index', ['users' => $users]);
    }

    public function create()
    {
        $data['roles'] = User::ROLES;
        $data['cities'] = City::query()->get();
        return view('admin.users.create', $data);
    }

    public function store(StoreUserRequest $request): RedirectResponse
    {
        try {
            DB::transaction(function () use ($request) {
                return $this->service->createUser($request->validated());
            });
        } catch (\Exception $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }

        return redirect()->route('admin.users.index')->with('success', 'Успешно добавлена');
    }

    public function show(User $user)
    {
        return view('admin.users.show', ['user' => $user]);
    }

    public function edit(User $user)
    {
        $data['roles'] = User::ROLES;
        $data['user'] = $user;
        $data['cities'] = City::query()->get();
        return view('admin.users.edit', $data);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        try {
            DB::transaction(function () use ($request, $user) {
                return $this->service->updateUser($request->validated(), $user);
            });
        } catch (\Exception $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }

        return redirect()->route('admin.users.index')->with('success', 'Успешно обновлено');
    }

    public function destroy(User $user)
    {
        if ($user->id == auth()->id()) {
            return back()->with('error', 'Произошло ошибка!');
        }

        if ($user->hasRole(['developer'])) {
            return back()->with('error', 'Вы не можете удалить разработчика!');
        }

        try {
            $user->delete();
        } catch (\Exception $exception) {
            return back()->withErrors($exception->getMessage());
        }

        return redirect()->route('admin.users.index')->with('success', 'Успешно удалена');
    }
}
