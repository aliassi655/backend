<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Hotel;
use App\Models\Customer;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
// $book=[Booking::all(),Ticket::all(),Hotel::all(),Customer::all()];
$book = Booking::all();
$customer = Customer::all();
$hotel= Hotel::all();
$tickt=Ticket::all();
        // $book = Booking::with(['Ticket', 'Hotel','Customer'])->get()->all();
        return view('book_index', compact('book'), compact('customer') , compact('hotel') , compact('tickt'));
        // return view('book_index', compact('book'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $book = Booking::all();
        $customer = Customer::all();
        $ticket = Ticket::all();
        $hotel=Hotel::all();
        return view('book_index',  compact('book'), compact('customer') , compact('hotel') , compact('ticket'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $book = Booking::all();
        // $customer = Customer::all();
        // $ticket = Ticket::all();
        // $hotel=Hotel::all();

        $customer = Customer::create([
            'name' => $request->input('name'),
            'mobile'=> $request->input('mobile'),
            'gender' => $request->input('gender'),
            'email'=> $request->input('email')
        ]);

        $hotel = Hotel::create([
            'name' => $request->input('name'),
            'city_id' => $request->input('city_id')
        ]);

        $ticket = Ticket::create([
            'city_id' => $request->input('city_id'),
            'company_id' => $request->input('company_id')
        ]);

        $book = Booking::create([
            'customer_id' => $customer->id,
            'hotel_id' => $hotel->id,
            'ticket_id' => $ticket->id,
        ]);

        // $book=Booking::create(['name'=>Customer::create($request->ticket_id),'customer_id'=>$request->customer_id,'hotel_id'=>$request->hotel_id]);
        // // return redirect()->back();
        // // $book= Booking::create($request->all());
        // $customer=Customer::create($request->all());
        // $hotel= Hotel::create($request->all());
        // $customer->save();
        // $hotel->save();
        // $book ->save();
    return redirect()->route('showbooking');
    // if (Ticket::exists() && Customer::exists() && Hotel::exists()) {
    //   $book =  Booking::create(['ticket_id'=>$request->ticket_id,'customer_id'=>$request->customer_id,'hotel_id'=>$request->hotel_id]);
    //     $book->save();
    //     return redirect()->back();
    // } else {
    //     return redirect()->route('adddata');
    // }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $book=Booking::find($id);
        return view("city_edit",["book"=>$book]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Booking::find($id);
        $book->delete();
        return redirect()->back();
    }

    public function adddata(Request $request)
    {
       $custmer= Customer::create(['name'=>$request->name,'mobile'=>$request->mobile,"gender"=>$request->gender]);
       $custmer->save();

       $hotel= Hotel::create(['name'=>$request->name,'city_id'=>$request->city_id]);
       $hotel->save();

       $tickt= Ticket::create(['city_id'=>$request->city_id,'company_id'=>$request->company_id]);
       $tickt->save();
       return redirect()->back();
    }
}
