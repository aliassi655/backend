<?php
foreach($customer as $key=>$value)
{
    echo $value->name. "<a href=".route("edit.customer",["id"=>$value->id]).">edit       </a>";
    echo "/     ";
    echo "<a href=".route('delete.customer', ['id'=>$value->id]).">delete</a>";

    echo "<br>";
}
?>