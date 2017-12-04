<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Restaurant\CreateRequest;
use App\Restaurant;

class RestaurantController extends Controller
{
    public function create(CreateRequest $request) {
        return Restaurant::create($request->input());
    }

    public function index(Request $request)
    {
        return Restaurant::get();
    }

    public function find(Request $request, Restaurant $restaurant)
    {
        return $restaurant;
    }
}
