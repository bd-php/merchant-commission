<?php
session_start();
include_once 'connect.php';

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
}

$user = $_SESSION['user'];

$sql = "select * from mcommission where username = '$user'";

$stmt = $pdo->query($sql);
$row = $stmt->fetchObject();

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Welcome - <?php echo $row->username; ?></title>
</head>
<body style="background: rgba(125, 123, 125, 0.85);">


<div style="padding-left: 100px; alignment: right; width: 84%">
    <nav style="alignment: right">
        <ul>
            <li>
                <div >
                    <?php echo $row->username; ?>&nbsp;<a href="logout.php?logout">Sign Out</a>
                </div>
            </li>
        </ul>
    </nav>
</div>



<div align="center" style="margin-top: 40">
    Start Date : <input name="startDate" id="startDate" type="text" placeholder="Start Date"/>
    End Date : <input name="endDate" id="endDate" type="text" placeholder="End Date">
    <input type="submit" value="Search" onclick="doSearch()">
</div>



<div style="padding-top: 20px; padding-left: 100px; width: 80%">
    <table id="merchantCommission" class="display" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>NO.</th>
            <th>Pay Time</th>
            <th>Bin Issuer</th>
            <th>Payment Type</th>
            <th>Payment Status</th>
            <th>Amount</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>NO.</th>
            <th>Pay Time</th>
            <th>Bin Issuer</th>
            <th>Payment Type</th>
            <th>Payment Status</th>
            <th>Amount</th>
        </tr>
        </tfoot>
    </table>
</div>


<script src="js/jquery-1.12.3.js" type="text/javascript"></script>
<script src="js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="js/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="js/buttons.flash.min.js" type="text/javascript"></script>
<script src="js/jszip.min.js" type="text/javascript"></script>
<script src="js/buttons.html5.min.js" type="text/javascript"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


<link rel="stylesheet" href="css/Style.css" type="text/css"/>
<link href="css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
<link href="css/test.css" rel="stylesheet" type="text/css"/>
<link href="css/buttons.dataTables.min.css" rel="stylesheet" type="text/css"/>

<script>

    $(function () {
        $("#startDate, #endDate").datepicker();
    });

    function doSearch() {
        var table = $('#merchantCommission').DataTable({
            "ajax": {
                url: "jsonMerchantCommission.php", // json datasource
                type: "post",  // method  , by default get
                error: function () {  // error handling
                    alert("Error Happen");
                }
            },
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excelHtml5',
                    title: 'Science Rocks SMS Report ' + Date()
                },
                {
                    extend: 'csvHtml5',
                    title: 'Science Rocks SMS Report ' + Date()
                },
                {
                    extend: 'pdfFlash',
                    filename: 'Science Rocks SMS Report ' + Date()
                }
            ]
        });
    }

    $(document).ready(function () {

        var table = $('#merchantCommission').DataTable({
            "ajax": {
                url: "jsonMerchantCommission.php", // json datasource
                type: "post",  // method  , by default get
                error: function () {  // error handling
                    alert("Error Happen");
                }
            },
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excelHtml5',
                    title: 'Science Rocks SMS Report ' + Date()
                },
                {
                    extend: 'csvHtml5',
                    title: 'Science Rocks SMS Report ' + Date()
                },
                {
                    extend: 'pdfFlash',
                    filename: 'Science Rocks SMS Report ' + Date()
                }
            ]
        });
    });
</script>

</body>
</html>