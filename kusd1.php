<?php
require("connection.php");
require("utils/function.php");

// Get ID
if (!isset($_GET['id'])) {
    http_response_code(400);
    $stdClass = new stdClass();
    $stdClass->status = 400;
    $stdClass->msg = "ท่านเรียกใช้งานไม่ถูกต้อง [ERR-TAG-400]";
    $stdClass->data = null;
    header("Content-Type: application/json");
    exit(json_encode($stdClass));
}

// Project
$id = $_GET['id'];
$rowPj = getDataByAttributes("*", ["id" => $id], "Project", 1);
if (!isset($rowPj)) {
    http_response_code(404);
    $stdClass = new stdClass();
    $stdClass->status = 404;
    $stdClass->msg = "ไม่พบโครงการของท่าน [ERR-PJ-404]";
    $stdClass->data = null;
    echo json_encode($stdClass);
}

// Organization
$rowOg = getDataByAttributes("*", ["id" => $rowPj['organization_orgid']], "Organization", 1);
if (!isset($rowOg)) {
    http_response_code(400);
    $stdClass = new stdClass();
    $stdClass->status = 400;
    $stdClass->msg = "ไม่พบองค์กรของท่าน กรุณาติดต่อกองพัฒนานิสิต [ERR-OG-400]";
    $stdClass->data = null;
    echo json_encode($stdClass);
}

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
    $mpdf->SetSourceFile("assets/kusd1.pdf");
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

    //Page 4
    ob_start();
    require("components/kusd1/page5.php");
    //Page 4 Content
    $html = ob_get_contents();
    ob_end_clean();
    $html = mb_convert_encoding($html, 'UTF-8', 'UTF-8');
    $mpdf->WriteHTML($html);

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    $mpdf->Output("KUSD1_" . time() . ".pdf", 'I');
    ?>
</body>

</html>