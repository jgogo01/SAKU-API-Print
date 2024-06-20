<?php
//Allow CORS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header('Access-Contol-Allow-Credentials: true');
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

//Allow Memory Limit
ini_set('memory_limit', '-1');

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
    //Template Page 2
    $pagecount = $mpdf->SetSourceFile("assets/kusd2.pdf");
    for ($i = 1; $i <= ($pagecount); $i++) {
        $mpdf->AddPage();
        $import_page = $mpdf->ImportPage($i);
        $mpdf->UseTemplate($import_page);
    }

    //Page 2 Content
    $html = ob_get_contents();
    ob_end_clean();
    $html = mb_convert_encoding($html, 'UTF-8', 'UTF-8');
    $mpdf->WriteHTML($html);


    $mpdf->Output("KUSD2_" . time() . ".pdf", 'I');
    ?>
</body>

</html>