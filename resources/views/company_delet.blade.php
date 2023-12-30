{{-- delete company --}}

<form method="post" action="{{route('deletcompany' ,['id'=>$company->id])}}">
    {{csrf_field()}}
    <input type="text" name="title" >
    <input type="text" name="address" >
    <input type="text" name="phone" >
    <button type="submit">delete company</button>
</form>
