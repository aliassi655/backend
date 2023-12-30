{{-- show city --}}
@foreach($book as $cit)
        {{-- <td>{{ $cit['0']->ticket_id }}</td> --}}
        <br>
        <td>{{ $cit->customer->name}}</td>
        <br>
        <td>{{ $cit->hotel->name}}</td>
        <br>
        {{-- <td>{{ $cit->tickt->company_id}}</td> --}}
        <br>
        {{-- @foreach ($cit as $key  )
            <p>{{$key->Custmer->name}}</p>
            <p>{{$value->name}}</p>
        @endforeach --}}
        <a href="{{route('editbooking',['id'=>$cit->id])}}">edite</a>
        <br>
        <a href="{{route('deletbooking',['id'=>$cit->id])}}">delete</a>


            <br>
        <hr>
@endforeach
{{-- add booking --}}
<form method="get" action="{{route('addbooking')}}">
    {{csrf_field()}}
    <h1>customer</h1>
    <input type="text" name="name" ><br>
    <input type="text" name="mobile" ><br>
    <input type="text" name="gender" ><br>
    <input type="text" name="email" ><br>
<hr>
    <h1>hotel</h1>
    <input type="text" name="name" >
    <input type="text" name="city_id" >
<hr>
    <h1>ticket</h1>
    <input type="text" name="city_id" >
    <input type="text" name="company_id" >
{{--
    <input type="text" name="ticket_id" >
    <input type="text" name="customer_id" >
    <input type="text" name="hotel_id" > --}}
    <button type="submit">add booking</button>
</form>
