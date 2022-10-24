<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestManagerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function home()
    {
        $data['title'] = "Manager";
        $data['content'] = view("users.rest_manager.dashboard");
        $data['sidebar'] = view("users.rest_manager.side_bar");
        return view("users.rest_manager", $data);
    }
    public function infoRestPage()
    {
        //$restaurant['restaurant'] = Restaurant::query()->where("rest_id", "=", $id)->first();

        $data['title'] = "Manager";
        $data['content'] = view('users.rest_manager.info_rest');
        $data['sidebar'] = view("users.rest_manager.side_bar");
        return view("users.rest_manager", $data);
    }
}
