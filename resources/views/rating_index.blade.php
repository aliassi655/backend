
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
   <center> <b><h1> Rating_index</h1> </b></center>
@stop

@section('content')

<form method="post">


<ul class="list-group">
<br/>
@foreach($rating as $key =>$value)
<li class="list-group-item d-flex justify-content-between align-items-center">
hotel:{{$value->hotel->name}} rate: {{$value->rate}}  


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

