<?php

$cn = new mysqli("localhost", "root", "nopass", "mydb");

$query = "SELECT id, name FROM demo";
$result = $cn->query($query);

$i = 0;

do{
    set_time_limit(0);
    $rs = $cn->query($query);
    if(FALSE == $rs->fetch_array(MYSQLI_NUM))
    {
        sleep(3);
        echo $i++;
    }
    else{
        break;
    }
}while (FALSE == $rs->fetch_array(MYSQLI_NUM));

echo "done";