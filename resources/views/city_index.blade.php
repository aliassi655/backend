{{-- show city --}}
@foreach($city as $cit)
        <td>{{ $cit->name }}</td>
        <br>
        <td>{{ $cit->country }}</td>
        <br>
        <a href="{{route('editcity',['id'=>$cit->id])}}">edite</a>
        <br>
        <a href="{{route('deletcity',['id'=>$cit->id])}}">delete</a>


            <br>
        <hr>
@endforeach
{{-- add city --}}
<form method="get" action="{{route('addcity')}}">
    {{csrf_field()}}
    <input type="text" name="name" >
    <input type="text" name="country" >
    <button type="submit">add city</button>
</form>
