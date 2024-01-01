<h1> Delete Ticket </h1>
<form method="post" action="{{ route('delete-ticket',['id'=>$ticket->id]) }}">
{{ csrf_field() }}
@foreach($ticket as $t)
@if($ticket->company_id && city_id == $r->id)
<input type="text" name= "ticket" value="{{ $ticket->Ticket}}">
<input type="text" name= "company_id" value="{{ $c->Company}}">
<input type="text" name= "city_id" value="{{ $c->City}}">
@endif
@endforeach
<input type= "submit" value="delete" >
</form>

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
   <center> <b><h1>Ticket_create </h1> </b></center>
@stop

@section('content')

<form method="post" action= "{{ route('delete-ticket',['id'=>$ticket->id]) }}">
<input type="text" name= "company_id" value="{{ $company->Company}}" >
<input type="text" name= "city_id"value="{{ $city->City}}" >
<input type="text" name= "date_s" value="{{$date_s->date_s}}" >
<input type="text" name= "date_e" value="$date_e-date_e}}">

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
