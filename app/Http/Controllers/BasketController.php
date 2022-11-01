<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class BasketController extends Controller
{

    public function addBasket(Request $req)
    {
        $auth_user_id = Auth::user()->id;
        $basket = new Basket();
        $basket->user_id = $auth_user_id;
        $basket->product_id = $req->product_id;
        $basket->product_name = $req->product_name;
        $result = $basket->save();
        if ($result)
            return response()->json("success");
        else
            return response()->json("wrong");
        //return response()->json(["deneem" => Auth::user()->id]);
    }
    public function getBasket()
    {
        $auth_user_id = Auth::user()->id;
        $basket = Basket::query()->join("products", "products.product_id", "=", "baskets.product_id")
            ->where("baskets.user_id", "=", $auth_user_id)->get();
        return json_encode($basket);
    }
}
