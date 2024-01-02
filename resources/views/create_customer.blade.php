<html>
    <form action="{{ route('store.customer') }}" method="post">
         {{ csrf_field() }} 
        name: <input type="name" name="name"/>
        mobile: <input type="mobile" name="mobile"/>
        email: <input type="email" name="email"/>
        gender:<input type="gender" name="gender"/> 
        <input type="submit" name="save" value="save"/>
    </form>
</html>