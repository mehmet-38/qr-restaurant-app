<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function home()
    {
        $data['title'] = "Admin";
        $data['content'] = view("users.admin.dashboard");
        $data['sidebar'] = view("users.admin.side_bar");
        return view("users.admin", $data);
    }

    public function users()
    {
        $users['users'] = User::all();
        $data['title'] = "Admin";
        $data['content'] = view("users.admin.users_page", $users);
        $data['sidebar'] = view("users.admin.side_bar");
        return view("users.admin", $data);
    }
    public function edit($id)
    {
        $user = User::find($id);
        return response()->json([
            'status' => 200,
            'user' => $user
        ]);
    }
    public function deleteUser(Request $request)
    {
        $user_id = $request->input("deleteId");
        $user = User::find($user_id);
        $response = $user->delete();
        if ($response) {
            return redirect()->route('a-users');
        } else {
            echo "wrong";
        }
    }
    public function updateUser(Request $request)
    {
        $user_id = $request->input('id');
        $user = User::find($user_id);
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->email = $request->input('email');
        $user->role = $request->input('role');
        $response = $user->save();
        if ($response) {
            return redirect()->route('a-users');
        } else {
            echo "wrong";
        }
    }
    public function addUsersPage()
    {
        $data['title'] = "Admin";
        $data['content'] = view("users.admin.add_users",);
        $data['sidebar'] = view("users.admin.side_bar");
        return view("users.admin", $data);
    }
    public function addUsers(Request $request)
    {
        $userData = new User();
        $userData->name = $request->input('name');
        $userData->surname = $request->input('surname');
        $userData->email = $request->input('email');
        $userData->password = Hash::make($request->input('password'));
        $userData->role = $request->input('role');
        $response = $userData->save();
        if ($response) {
            return redirect()->route("add-users-page");
        } else {
            echo "wrong";
        }
    }
    public function restaurants()
    {
        $restaurants['restaurants'] = Restaurant::all();
        $data['title'] = "Admin";
        $data['content'] = view("users.admin.restaurants_page", $restaurants);
        $data['sidebar'] = view("users.admin.side_bar");
        return view("users.admin", $data);
    }
}
