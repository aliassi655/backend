<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer_Hotel;
class Customer_HotelController extends Controller
{
    public function index()
    {
        $costomer_hotel= Costomer_Hotel::get();
        return view("view_costomer_hotel",["costomer_hotel"=>$costomer_hotel]);
    }

    public function create()
    {

    }
    public function store(Request $request)
    {
    }
    public function show(Country $country)
    {
     
    }
    public function edit()
    {
    }
    public function update(Request $request,$id)
    {
    }
    public function destroy(Country $country)
    {
        
    }
}
