<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Validator;
class CustomerController extends Controller
{
    public function index()
    {
        $customer= Costomer::get();
        return view("view_customer",["customer"=>$customer]);
    }

    public function create()
    {
        return view("view_customer");
    }

    public function store(Request $request)
    {
        if($request->isMethod("post"))
        {
            $validate= Validator::make($request->all(),[
                "name"=>"required|string",
                "mobile"=>"required|string|regex:/(0)[0-9]/|not_regex:/[a-z]/max:10",
                "gender"=>"required|string",
                "email"=> "required|unique:customers,email|max:20|ends_with:hotmail.com,gmail.com",

              
            ]);
            if($validate->fails())
            {
               dd($validate->errors());
            }
            else
            {
                $data=[
                   "name"=>$request->name,
                   "mobile"=>$request->mobile,
                   "gender"=>$request->gender,
                   "email"=>$request->email,

                ];
                Customer::create($data);
            }
            return view("view_customer");

        }


    }

    public function show($id)
    {
        $customer=Customer::find($id);
        return view("view_customer",["customer"=>$customer]);
    }

    public function edit($id)
    {
    $customer=Customer::find($id);
    return view("update_customer",["customer"=>$customer]);
    }
    
    public function update(Request $request,$id)
    {
        $customer=Customer::find($id);
        if ($request->isMethod("post"))
            {
                $validate= Validator::make($request->all(),[
                    "name"=>"required|string",
                    "mobile"=>"required|string|regex:/(0)[0-9]/|not_regex:/[a-z]/max:10",
                    "gender"=>"required|string",
                    "email"=> "required|unique:customers,email|max:20|ends_with:hotmail.com,gmail.com",
    
                ]);
                if ($validate->fails())
                {
                    dd($validate->errors());
                }
                 else
                  {
                $customer->update($request->all());
                  }
            }
             else
             {
                return view("view_customer",["customer"=>$customer]);
             }
    }
    public function destroy($id)
    {
        
        $customer=Customer::find($id);
        $customer->delete();
    }
}
