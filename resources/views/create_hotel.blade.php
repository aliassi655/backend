<html>
    <form action="{{ route('store.hotel') }}" method="post">
         {{ csrf_field() }} 
        name: <input type="name" name="name"/>
        city_id: <input type="city_id" name="city_id"/>
        <input type="submit" name="save" value="save"/>
    </form>
</html>