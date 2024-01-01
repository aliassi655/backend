<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\Hotel;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rating = Rating::all();
        $customer = Customer::all();
        $hotel = Hotel::all();
        return view('rating_index',['customer'=>$customer,'hotel'=>$hotel,'rate'=>$rate,'comment'=>$comment]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hotel=Hotel::all();
        $customer=Customer::all();
        return view('Rating_create',['hotel'=>$hotel,'customer'=>$customer]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->IsMethod("post")){
            $validate=Validator::make($request->all,[
                'hotel'=>'exists:hotels,id',
                'customer'=>'exists:customers,id',
                'rate'=>'required|integer',
                'comment'=>'required|stringe',
              ]) ;
            if($validate->fails()){
                dd($validate->errors());
            }
            else{
                Rating::create(
                    [
                        'hotel_id'=>$request->hotel,
                        'customer_id'=>$request->customer,
                        'rate'=>$request->rate,
                        'comment'=>$request->comment,
                    ]
                    );
                    echo json_encode(['staus'=>'Rating_create']);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $validate=Validator::make($request->all(),[
            'hotel'=>'exists:hotels,id',
            'customer'=>'exists:customers,id',
            'rate'=>'required|integer',
            'comment'=>'required|stringe',
          ]) ;
          if($validate->fails()) {
            dd($validate->errors());
          }else{
            $hotel_id=$request->hotel;
            $customer_id=$request->customer;
            $rate=$request->rate;
            $comment=$request->comment;
            $rating=Rating::where('hotel_id',$hotel_id)->where('customer_id',$customer_id)->where('rate',$rate)->get();
            $hotel=Hotel::all();
            $customer=Customer::all();
            return view('Rating_show',['hotel'=>$hotel,'customer'=>$customer]);
          }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $raiting = Raiting::find($id);
        return view('Rating_edit',['hotel'=>$hotel,'customer'=>$customer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $raiting = Raiting::find($id);
        if( $request->isMethod('post') ) { 
            $validate = Validator::make($request->all(),[
                    'hotel_id' =>'required|exists:hotels,id',
                    'customer_id' =>'required|exists:customers,id',
                    'rate' =>'required|string',
                    'comment' =>'required|string'
                ]);
    
                if($validate->fails()) {
                    dd($validate->errors());
                }else{
                    $raiting->update($request->all());
            }
            }
            else{
            return view('rating_update',['hotel'=>$hotel,'customer'=>$customer]);
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rating = Rating::find($id);
        $rating->delete($id);
        return redirect()->route('rating_index'); 
        
    }
}
