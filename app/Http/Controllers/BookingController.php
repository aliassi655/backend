<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Hotel;
use App\Models\Customer;
use Illuminate\Support\Facades\Validator;

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

        echo json_encode(['status'=>'add booking']);
        // return redirect()->route('showbooking')->with();
        // if (Ticket::exists() && Customer::exists() && Hotel::exists()) {
            //   $book =  Booking::create(['ticket_id'=>$request->ticket_id,'customer_id'=>$request->customer_id,'hotel_id'=>$request->hotel_id]);
            //     $book->save();
    //     return redirect()->back();
    // } else {
    //     return redirect()->route('adddata');
    // }

    // $book=Booking::create(['name'=>Customer::create($request->ticket_id),'customer_id'=>$request->customer_id,'hotel_id'=>$request->hotel_id]);
    // // return redirect()->back();
    // // $book= Booking::create($request->all());
    // $customer=Customer::create($request->all());
    // $hotel= Hotel::create($request->all());
    // $customer->save();
    // $hotel->save();
    // $book ->save();
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id , $request)
    {
        $book = Booking::all();
        $customer = Customer::find($id);
        $ticket = Ticket::find($id);
        $hotel=Hotel::find($id);
        $book=Booking::find($id);
        if($request->isMethod('post')){
        //     $message = ["customer,id.required"=>"entery name customer !!??"];
        // $validate= validator::make($request->all(),[
        //     'customer_id' => 'required|exists:Customer,id',
        //     'hotel_id' =>  'required|exists:Hotel,id' ,
        //     'ticket_id' =>  'required|exists:Ticket,id'],$message );

        //     if($validate->fails()){
        //     dd($validate->errors());
        // }else{
            $book->ubdate($request->all());
            $customer->ubdate($request->all());
            $customer->save();
            $ticket->ubdate($request->all());
            $ticket->save();
            $hotel->ubdate($request->all());
            $hotel->save();
            // $book = [compact('customer'),compact('ticket'),compact('hotel')];
            echo json_encode(['status'=>'ubdate data']);
        // }

        return redirect()->back();}
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Booking::all();
        $customer = Customer::all();
        $ticket = Ticket::all();
        $hotel=Hotel::all();
        $customer = Customer::find($id);
    $ticket = Ticket::find($id);
    $hotel = Hotel::find($id);
         $book=Booking::find($id);
        //  return view('book_edit', compact('book'), compact('customer') , compact('hotel') , compact('ticket'));
        return view("book_edit",["book"=>$book] , ["customer"=>$customer] ,["ticket"=>$ticket] ,["hotel"=>$hotel] );
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

    $customer = Customer::find($id);
    $ticket = Ticket::find($id);
    $hotel = Hotel::find($id);
    $book = Booking::find($id);
        // $customer->update([
        //     'name' => $request->input('name'),
        //     'mobile' => $request->input('mobile'),
        //     'gender' => $request->input('gender'),
        //     'email' => $request->input('email')
        // ]);

        // $hotel->update([
        //     'name' => $request->input('name'),
        //     'city_id' => $request->input('city_id')
        // ]);

        // $ticket->update([
        //     'city_id' => $request->input('city_id'),
        //     'company_id' => $request->input('company_id')
        // ]);

        $customer = Customer::find($id);
        $customer->name = $request->name;
        $customer->mobile =$request->mobile;
        $customer->gender = $request->gender;
        $customer->email = $request->email;
        $customer->save();

        $ticket = Ticket::find($id);
        $ticket->city_id = $request->city_id;
        $ticket->company_id =$request->company_id;
        $ticket->save();

        $hotel = Hotel::find($id);
        $hotel->name =$request->name;
        $hotel->city_id = $request->city_id;
        $hotel->save();
echo json_encode(['status'=>'update']);
        // $book = Booking::find($id);
        // $book->customer_id =$customer->id;
        // $book->hotel_id = $ticket->id;
        // $book->ticket_id = $hotel->id;
        // $book->save();

        // $book->update([
        //     'customer_id' => $customer->id,
        //     'hotel_id' => $hotel->id,
        //     'ticket_id' => $ticket->id,
        // ]);
        return redirect()->route('showbooking');

}

// }

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

    // public function adddata(Request $request)
    // {
    //    $custmer= Customer::create(['name'=>$request->name,'mobile'=>$request->mobile,"gender"=>$request->gender]);
    //    $custmer->save();

    //    $hotel= Hotel::create(['name'=>$request->name,'city_id'=>$request->city_id]);
    //    $hotel->save();

    //    $tickt= Ticket::create(['city_id'=>$request->city_id,'company_id'=>$request->company_id]);
    //    $tickt->save();
    //    return redirect()->back();
    // }
}
