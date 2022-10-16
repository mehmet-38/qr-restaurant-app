<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function home(){
        $data['title'] = "Admin";
        $data['content']=view("users.admin.user_control");
        $data['sidebar']=view("users.admin.side_bar");
        return view("users.admin",$data);
    }
}
