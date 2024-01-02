<?php
foreach($customer_hotel as $key=>$value)
{
    echo $value . "<a href=".route("edit.customer",["id"=>$value->id]).">edit       </a>";
    echo "/     ";
    echo "<a href=".route('delete.customer', ['id'=>$value->id]).">delete</a>";

    echo "<br>";
}
?>