<?php
foreach($customer as $key=>$value)
{
    echo $value . "<a href=".route("edit.customer",["id"=>$value->id]).">edit</a>";
    echo "<br>";
}
?>