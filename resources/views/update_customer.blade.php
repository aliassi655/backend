<form method="post" action="{{ route('update.customer',['id'=>$customer->id]) }}">
    {{ csrf_field() }}
    name:<input type="text" name="name" value="{{$customer->name}}"/>
    mobile:<input type="text" name="mobile" value="{{$customer->mobile}}"/>
    gender:<input type="text" name="gender" value="{{$customer->gender}}"/>
    email:<input type="text" name="email" value="{{$customer->email}}"/>
    <input type="submit" value="update"/>
</form> 