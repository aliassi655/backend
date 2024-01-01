<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use Illuminate\Support\Facades\Validator;

class HotelController extends Controller
{
    public function index()
    {
       $hotel= Hotel::get();
       return view("view_hotel",["hotel"=>$hotel]);
    }

    public function create()
    {
        return view("create_hotel");
    }
    public function store(Request $request)
    {
        
        if ($request->isMethod("post"))
        {
            $validate= Validator::make($request->all(),[
                "name"=>"required|string",
                "city_id"=>"required|string|exists:hotels,city_id",
            ]);
            if ($validate->fails())
            {
                dd($validate->errors());
            }
             else
              {
            $data=[
                "name"=>$request->name,
                "city_id"=>$request->city_id,
            ];
           
            $hotel= Hotel::create($data);
              }
        }
         else{
            return view("view_hotel");
         }
    }
    public function show($id)
    {
     $hotel=Hotel::find($id);
        return view("view_hotel",["hotel"=>$hotel]);
    }
    public function edit($id)
    {
        $hotel=Hotel::find($id);
        return view("update_hotel",["hotel"=>$hotel]);
    }
    public function update(Request $request,$id)
    {
        $hotel=Hotel::find($id);
        if ($request->isMethod("post"))
            {
                $validate= Validator::make($request->all(),[
                    "name"=>"required|string",
                    "city_id"=>"required|string|exists:hotels,city_id"
                ]);
                if ($validate->fails())
                {
                    dd($validate->errors());
                }
                 else
                  {
                $hotel->update($request->all());
                  }
            }
             else
             {
                return view("view_hotel",["hotel"=>$hotel]);
             }
    }
    public function destroy($id)
    {
        $hotel=Hotel::find($id);
        $hotel->delete();
    }

}
