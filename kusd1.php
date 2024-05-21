<?php
//Allow CORS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header('Access-Contol-Allow-Credentials: true');
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    http_response_code(200);
    exit();
}

require("connection.php");
require("utils/function.php");
require("components/kusd1/prepare.php");
//Page 1
ob_start();
?>

<!DOCTYPE html>
<html>

<head>
    <base href="../../../">
    <?php
        require("components/header.php");
    ?>
</head>

<body>

    <?php
    require("components/kusd1/page1.php");
    require("components/kusd1/page2.php");
    require("components/kusd1/page3.php");
    require("components/kusd1/page4.php");
    require("components/kusd1/page5.php");
    require("components/kusd1/page6.php");
    require("components/kusd1/page7.php");
    $mpdf->Output("KUSD1_" . time() . ".pdf", 'I');
    ob_end_flush();
    ?>
</body>

</html>