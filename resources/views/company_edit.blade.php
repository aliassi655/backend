<form method="post" action="{{route('updatecompany',['id'=>$company->id])}}">
    {{csrf_field()}}
    <input type="text" name="title" value="{{$company->title}}">
    <input type="text" name="address" value="{{$company->address}}">
    <input type="text" name="phone" value="{{$company->phone}}">
    <button type="submit">update compny</button>
</form>
