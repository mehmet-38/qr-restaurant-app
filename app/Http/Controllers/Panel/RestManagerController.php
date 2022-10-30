<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $restaurant['restaurant'] = Restaurant::query()->join("users", "users.rest_id", "=", "restaurants.rest_id")
            ->where("users.id", "=", Auth::user()->id)->get();

        $data['title'] = "Manager";
        $data['content'] = view('users.rest_manager.info_rest', $restaurant);
        $data['sidebar'] = view("users.rest_manager.side_bar");


        return view("users.rest_manager", $data);
    }
    public function updateRest(Request $request)
    {
        $rest_id = $request->input('rest_id');

        $response = Restaurant::where("rest_id", "=", $rest_id)->update([
            'rest_name' => $request->input('rest_name'),
            'qr_link' => $request->input('rest_qr'),
            'menus_id' => $request->input('menu_id'),
            //'rest_photo' => $request->file('rest_photo')->store('restPhoto')
        ]);
        if ($response) {
            return redirect()->route('info-rest');
        } else {
            echo "wrong";
        }
    }
    public function addMenuPage()
    {
        $menu['menu'] = User::query()->join("restaurants", "restaurants.rest_id", "=", "users.rest_id")
            ->join("menus", "menus.id", "=", "restaurants.menus_id")
            ->where("users.id", "=", Auth::user()->id)->get();

        $products['products'] = Restaurant::query()->join("menus", "menus.id", "=", "restaurants.menus_id")
            ->join("products", "products.menus_id", "=", "menus.id")
            ->where("restaurants.rest_id", "=", Auth::user()->rest_id)->get();

        $data['title'] = "Menü";
        $data['content'] = view("users.rest_manager.add_menu", $menu, $products);
        $data['sidebar'] = view("users.rest_manager.side_bar");
        return view("users.rest_manager", $data);
        //return response()->json($products);
    }
    public function addProductPage()
    {

        $data['title'] = "Product";
        $data['content'] = view("users.rest_manager.add_product");
        $data['sidebar'] = view("users.rest_manager.side_bar");
        return view("users.rest_manager", $data);
    }
}
