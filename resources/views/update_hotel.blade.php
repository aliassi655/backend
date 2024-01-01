<form method="post" action="{{ route('update.hotel',['id'=>$hotel->id]) }}">
    {{ csrf_field() }}
    name:<input type="text" name="name" value="{{$hotel->name}}"/>
   city_id:<input type="text" name="city_id" value="{{$hotel->city_id}}"/>
    
    <input type="submit" value="update"/>
</form> 