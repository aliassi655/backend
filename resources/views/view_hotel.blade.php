<?php
    foreach ($hotel as $key=>$value)
{  
 echo $value->name."        "."in   ". $value->city->name."        ";
    echo "<a href=".route("edit.hotel",['id'=>$value->id]).">edit     </a>";
    echo "/     ";
    echo "<a href=".route('delete.hotel', ['id'=>$value->id]).">delete</a>";
    echo "<br>";
    
    }

?>
