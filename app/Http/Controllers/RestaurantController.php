<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function getRestaurantData(){
        $restaurant = Restaurant::all();
        //$products = Restaurant::query()->join("menus","menus.id","=","restaurants.menus_id")->get();
        if(request()->id){
            $rest = Restaurant::query()->join("menus","menus.id","=","restaurants.menus_id")
            ->where("restaurants.id",request()->id)->get();
            return json_encode($rest);
        }
        else{
            $products = Restaurant::query()->join("menus","menus.id","=","restaurants.menus_id")->get();
            return json_encode($products);
        }

        
    }

    public function addResturantData(Request $request){
        $resturant = new Restaurant();
        $resturant->rest_name=$request->rest_name;
        $resturant->menus_id=$request->menus_id;
        $resturant->qr_link = $request->qr_link;
        $resturant->save();
        return json_encode("success for saved restaurant");


    }
}
