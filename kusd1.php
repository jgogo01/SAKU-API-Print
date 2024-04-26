<?php
require("connection.php");
require("utils/function.php");

// Get ID
if (!isset($_GET['id'])) {
    header("Location: https://saku.sa.ku.ac.th");
}

// Project
$id = $_GET['id'];
$rowPj = getDataByAttributes("*", ["id" => $id], "Project", 1);
if (!isset($rowPj)) {
    header("Location: https://saku.sa.ku.ac.th/404?msg=ERR-PJ-404");
}

// Organization
$rowOg = getDataByAttributes("*", ["id" => $rowPj['organization_orgid']], "Organization", 1);
if (!isset($rowOg)) {
    header("Location: https://saku.sa.ku.ac.th/404?msg=ERR-OG-404");
}

require("components/kusd1/prepare.php");
//Page 1
ob_start();
?>

<!DOCTYPE html>
<html>

<head>
    <base href="../../../">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>ระบบอนุมัติโครงการออนไลน์ - กองพัฒนานิสิต</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="core/main/images/fav.ico" type="image/x-icon" />
    <link href="css/kusd1.css" rel="stylesheet" type="text/css" />
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