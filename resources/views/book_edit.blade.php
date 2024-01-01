{{-- <form method="post" action="{{route('updatebooking',['id'=>$book->id])}}">
    {{csrf_field()}}
    <input type="text" name="name" value="{{$book->ticket_id}}">
    <input type="text" name="customer" value="{{$customer->name}}">
    <input type="text" name="country" value="{{$book->hotel_id}}">
    <button type="submit">update city</button>
</form> --}}



<form method="post" action="{{route('updatebooking',['id'=>$book->id,'id'=>$book->customer->id,'id'=>$book->hotel->id ,'id'=>$book->ticket->id])}}">
    {{csrf_field()}}
    <h1>customer</h1>
    <input type="text" name="name" value="{{$book->customer->name}}"><br>
    <input type="text" name="mobile" value="{{$book->customer->mobile}}"><br>
    <input type="text" name="gender" value="{{$book->customer->gender}}"><br>
    <input type="text" name="email" value="{{$book->customer->email}}"><br>
<hr>
    <h1>hotel</h1>
    <input type="text" name="name" value="{{$book->hotel->name}}">
    <input type="text" name="city_id" value="{{$book->hotel->city_id}}">
<hr>
    <h1>ticket</h1>
    <input type="text" name="city_id" value="{{$book->ticket->city_id}}">
    <input type="text" name="company_id" value="{{$book->ticket->company_id}}">
{{--
    <input type="text" name="ticket_id" >
    <input type="text" name="customer_id" >
    <input type="text" name="hotel_id" > --}}
    <button type="submit">update booking</button>
