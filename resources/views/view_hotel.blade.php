<?php
    foreach ($hotel as $key=>$value)
{  
    echo $value->name."<a href=".route("edit.hotel",['id'=>$value->id]).">edit</a>";
    echo "<br>";
    

}
?>
