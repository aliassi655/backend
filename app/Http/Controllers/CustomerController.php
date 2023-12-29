<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
class CustomerController extends Controller
{
    public function index()
    {
        $customer= Costomer::get();
        return view("view_customer",["customer"=>$customer]);
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
