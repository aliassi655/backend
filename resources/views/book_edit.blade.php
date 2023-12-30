<form method="post" action="{{route('updatebooking',['id'=>$book[0]->id])}}">
    {{csrf_field()}}
    <input type="text" name="name" value="{{$book->ticket_id}}">
    <input type="text" name="country" value="{{$book->customer_id}}">
    <input type="text" name="country" value="{{$book->hotel_id}}">
    <button type="submit">update city</button>
</form>
