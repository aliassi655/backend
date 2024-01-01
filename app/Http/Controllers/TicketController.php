<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\company;
use App\Models\city;

use Illuminate\Support\Facades\Validator;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ticket= Tickit::all();
        $company = Company::all();
        $city = City::all();
        return view('Ticket_index',[ 'company'=>$company,'city'=>$city,'date_s'=>$date_s,'date_e'=>$date_e]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       $city=City::all();
       $company=Company::all();
       return view('Ticket_create',['company'=>$company,'city'=>$city]);
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
                'date_s'=>'date|required|after_or_equal:now',
                'date_e'=>'date|required|after_or_equal:date_s'
            ]);
            if($validate->fails()){
                dd($validate->errors());
            }
            else{
                Ticket::create(
                    [
                        'company_id'=>$request->company,
                        'city_id'=>$request->city,
                        'date_s'=>$request->date_s,
                        'date_e'=>$request->date_e,
                    ]
                    );
                    echo json_encode(['staus'=>'Ticket_create']);
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
        'date'=>'required|date|after_or_equal:now|nullable',
        'city'=>'exists:cities,id'
      ]) ;
      if($validate->fails()) {
        dd($validate->errors());
      }else{
        $date_s=$request->date;
        $city_id=$request->city;
        $ticket=Ticket::where('city_id',$city_id)->where('date_s',$date_s)->get();
        $city=City::all();
        return view('Ticket_show',['ticket'=>$ticket,'city'=>$city]);
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
        $ticket = Ticket::find($id);
        return view('Ticket_edit',['ticket' => $ticket,'company'=>$company,'city'=>$city]);
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
        
    $ticket = Ticket::find($id);
    if( $request->isMethod('post') ) { 
        $validate = Validator::make($request->all(),[
                'company_id' =>'required|exists:companys,id',
                'city_id' =>'required|exists:citys,id',
            ]);

            if($validate->fails()) {
                dd($validate->errors());
            }else{
                $ticket->update($request->all());
        }
    
}else{
    return view('Ticket_update',['company'=>$company,'city'=>$city,'date_s'=>$date_s,'date_e'=>$date_e]);
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
        $ticket = Ticket::find($id);
       $ticket->delete($id);
       return redirect()->route('ticket_index');
    }
}
