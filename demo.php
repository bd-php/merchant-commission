<?php
include_once 'connect.php';

$username = 'dozeinternetradius';
$pass = 'dozeinternetradius';

$sql = "select * from mcommission where username='$username'";

$stmt = $pdo->query($sql);
$row = $stmt->fetchObject();

if ($row != null) {
    echo $row->password."\n";
    if ($row->password == md5($pass)) {
        echo "OK";
    } else {
        echo "Not OK";
    }
} else {
    echo "Incorrect Username";
}

