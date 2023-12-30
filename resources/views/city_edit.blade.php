<form method="post" action="{{route('updatecity',['id'=>$city->id])}}">
    {{csrf_field()}}
    <input type="text" name="name" value="{{$city->name}}">
    <input type="text" name="country" value="{{$city->country}}">
    <button type="submit">update city</button>
</form>
