<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Customer_Hotel;
use App\Models\Customer;
use App\Models\Hotel;
class Customer_HotelController extends Controller
{
    public function index()
    {
        $customer_hotel= Customer_Hotel::get();
        return view("view_customer_hotel",["customer_hotel"=>$customer_hotel]);
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
