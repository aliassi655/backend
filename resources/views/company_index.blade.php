{{-- show company --}}
@foreach($companies as $company)
        <td>{{ $company->title }}</td>
        <br>
        <td>{{ $company->address }}</td>
        <br>
        <td>{{ $company->phone }}</td>
        <br>
        <a href="{{route('editcompany',['id'=>$company->id])}}">edite</a>
        <br>
        <a href="{{route('deletcompany',['id'=>$company->id])}}">delete</a>


            <br>
        <hr>
@endforeach
{{-- edit company --}}
<form method="get" action="{{route('addcompany')}}">
    {{csrf_field()}}
    <input type="text" name="title" >
    <input type="text" name="address" >
    <input type="text" name="phone" >
    <button type="submit">add company</button>
</form>


