<?php

require "connect.php";

$query = "SELECT pay_time, bin_issuer, payment_type, pay_status, ROUND(50 - charge) AS amount FROM m_transaction
	WHERE pay_time > '1499146533' 
	  AND pay_time < '1502981285'
		AND pay_status = 'Successful'
			LIMIT 10";

$stmt = $pdo->query($query);

$var = "";

$var = "{" . "\n";
$i = 1;

// Json Response

$var = $var . '"data"' . ":[" . "\n";
while ($row = $stmt->fetch()) {
    $var = $var . "[" . "\n";
    $var = $var . '"' . $i . '",' . "\n";
    $payTime = $row['pay_time'];
    $var = $var . '"' . $payTime . '",' . "\n";

    $binIssuer = $row['bin_issuer'];
    $binIssuer = ($binIssuer == null) ? 'NA' : $binIssuer;
    $var = $var . '"' . $binIssuer . '",' . "\n";

    $paymentType = $row['payment_type'];
    $paymentType = ($paymentType == null) ? 'NA' : $paymentType;
    $var = $var . '"' . $paymentType . '",' . "\n";

    $payStatus = $row['pay_status'];
    $payStatus = ($payStatus == null) ? 'NA' : $payStatus;
    $var = $var . '"' . $payStatus . '",' . "\n";

    $amount = $row['amount'];
    $var = $var . '"' . $amount . '"' . "\n";
    $var = $var . "]," . "\n";
    $i++;
}
$var = $var . "]" . "\n";
$var = $var . "}";


$var[strlen($var) - 5] = " ";
echo $var;