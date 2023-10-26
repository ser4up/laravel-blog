<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserStoreRequest;
use App\Http\Requests\Admin\UserUpdateRequest;
use App\Models\User;
use App\Repository\UserRepository;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        return view('admin.user.index', [
            'users' => UserRepository::getListWithPagination()
        ]);
    }

    public function create()
    {
        $roles = User::roles();

        return view('admin.user.add', [
            'roles' => $roles,
        ]);
    }

    public function store(UserStoreRequest $userRequest)
    {
        $data = $userRequest->validated();
        $data['password'] = bcrypt($data['password']);

        User::firstOrCreate($data);

        return redirect()->route('admin.users.index');
    }

    public function show(User $user)
    {
        // skip this method
    }

    public function edit(User $user)
    {
        $roles = User::roles();

        return view('admin.user.edit', [
            'user' => $user,
            'roles' => $roles,
        ]);
    }

    public function update(UserUpdateRequest $userRequest, User $user)
    {
        $data = array_filter($userRequest->validated());
        if (isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }

        $user->update($data);

        return redirect()->route('admin.users.edit', $user->id)
            ->with('alert', 'User updated!');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index');
    }
}
