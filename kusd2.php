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
require("components/kusd2/prepare.php");
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
    // require("components/kusd2/page1.php");

    // //Page 1 Content
    // $html = ob_get_contents();
    // ob_end_clean();
    // $html = mb_convert_encoding($html, 'UTF-8', 'UTF-8');
    // $mpdf->WriteHTML($html);

    // //Template Page 1
    // $mpdf->SetSourceFile("assets/kusd2_online.pdf");
    // $import_page = $mpdf->ImportPage(1);
    // $mpdf->UseTemplate($import_page);

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    // //Page 2
    // ob_start();
    $mpdf->addPage();
    require("components/kusd2/page2.php");

    //Page 2 Content
    $html = ob_get_contents();
    ob_end_clean();
    $html = mb_convert_encoding($html, 'UTF-8', 'UTF-8');
    $mpdf->WriteHTML($html);


    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    // //Page 3
    // ob_start();
    // $mpdf->addPage();
    // require("components/kusd2/page3.php");

    // //Page 3 Content
    // $html = ob_get_contents();
    // ob_end_clean();
    // $html = mb_convert_encoding($html, 'UTF-8', 'UTF-8');
    // $mpdf->WriteHTML($html);

    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //Page 4
    // require("components/kusd2/page4.php");

    // //Page 4 Content
    // $html = ob_get_contents();
    // ob_end_clean();
    // $html = mb_convert_encoding($html, 'UTF-8', 'UTF-8');
    // $mpdf->WriteHTML($html);

    // $mpdf->SetSourceFile("assets/kusd2_online.pdf");
    // $import_page = $mpdf->ImportPage(4);
    // $mpdf->UseTemplate($import_page);

    // //Page 5
    // require("components/kusd2/page5.php");

    // //Page 5 Content
    // $html = ob_get_contents();
    // ob_end_clean();
    // $html = mb_convert_encoding($html, 'UTF-8', 'UTF-8');
    // $mpdf->WriteHTML($html);

    // $mpdf->SetSourceFile("assets/kusd2_online.pdf");
    // $import_page = $mpdf->ImportPage(5);
    // $mpdf->UseTemplate($import_page);

    // //Page 6
    // require("components/kusd2/page6.php");

    // //Page 6 Content
    // $html = ob_get_contents();
    // ob_end_clean();
    // $html = mb_convert_encoding($html, 'UTF-8', 'UTF-8');
    // $mpdf->WriteHTML($html);

    // //Page 7
    // require("components/kusd2/page7.php");

    // //Page 7 Content
    // $html = ob_get_contents();
    // ob_end_clean();
    // $html = mb_convert_encoding($html, 'UTF-8', 'UTF-8');
    // $mpdf->WriteHTML($html);

    $mpdf->Output("KUSD2_" . time() . ".pdf", 'I');
    ?>
</body>

</html>