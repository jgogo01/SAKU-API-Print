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

    //Page 1 Content
    $html = ob_get_contents();
    ob_end_clean();
    $html = mb_convert_encoding($html, 'UTF-8', 'UTF-8');
    $mpdf->WriteHTML($html);

    //Template Page 1
    $mpdf->SetSourceFile("assets/kusd1-v2.pdf");
    $import_page = $mpdf->ImportPage(1);
    $mpdf->UseTemplate($import_page);
    $mpdf->AddPage();

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    ob_start();
    require("components/kusd1/page2.php");

    //Page 2 Content
    $html = ob_get_contents();
    ob_end_clean();
    $html = mb_convert_encoding($html, 'UTF-8', 'UTF-8');
    $mpdf->WriteHTML($html);

    //Template Page 2
    $mpdf->SetSourceFile("assets/kusd1.pdf");
    $import_page = $mpdf->ImportPage(2);
    $mpdf->UseTemplate($import_page);
    $mpdf->AddPage();

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //Page 3
    ob_start();
    require("components/kusd1/page3.php");
    //Page 3 Content
    $html = ob_get_contents();
    ob_end_clean();
    $html = mb_convert_encoding($html, 'UTF-8', 'UTF-8');
    $mpdf->WriteHTML($html);

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //Page 4
    ob_start();
    require("components/kusd1/page4.php");
    //Page 4 Content
    $html = ob_get_contents();
    ob_end_clean();
    $html = mb_convert_encoding($html, 'UTF-8', 'UTF-8');
    $mpdf->WriteHTML($html);

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //Page 5
    ob_start();
    require("components/kusd1/page5.php");
    //Page 5 Content
    $html = ob_get_contents();
    ob_end_clean();
    $html = mb_convert_encoding($html, 'UTF-8', 'UTF-8');
    $mpdf->WriteHTML($html);

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //Page 6
    ob_start();
    require("components/kusd1/page6.php");
    //Page 6 Content
    $html = ob_get_contents();
    ob_end_clean();
    $html = mb_convert_encoding($html, 'UTF-8', 'UTF-8');
    $mpdf->WriteHTML($html);

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //Page 7
    ob_start();
    require("components/kusd1/page7.php");
    //Page 7 Content
    $html = ob_get_contents();
    ob_end_clean();
    $html = mb_convert_encoding($html, 'UTF-8', 'UTF-8');
    $mpdf->WriteHTML($html);

    $mpdf->Output("KUSD1_" . time() . ".pdf", 'I');
    ?>
</body>

</html>