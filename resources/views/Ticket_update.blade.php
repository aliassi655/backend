
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
   <center> <b><h1>Ticket_update </h1> </b></center>
@stop

@section('content')

<form method="post" action="{{ route('update-ticket',['id'=>$ticket->id]}}">

<input type="text" name= "company_id" value="{{ $company->Company}}" >
<input type="text" name= "city_id" >
<input type="text" name= "date_s" >
<input type="text" name= "date_e" >

<ul class="list-group">
<br/>
@foreach($ticket as $key =>$value)
<li class="list-group-item d-flex justify-content-between align-items-center">
city:{{$value->city->name}} DateStart: {{$value->date_s}}  


</li><br>
  </li>
  
</ul>

@endforeach
</ul>
</center>




</form>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
