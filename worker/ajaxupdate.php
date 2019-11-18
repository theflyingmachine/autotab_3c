<?php 

include("../config/config.php");


$position = $_POST['position'];


$i=1;
foreach($position as $k=>$v){
    echo  $sql = "UPDATE linklist SET display_order=".$i." WHERE linkid=".$v;
    $conn->query($sql);


	$i++;
}


?>