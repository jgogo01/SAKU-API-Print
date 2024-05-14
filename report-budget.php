<?php
require("components/report-budget/prepare.php");

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
    require("components/report-budget/page1.php");
    $html = ob_get_contents();
    ob_end_clean();
    $html = mb_convert_encoding($html, 'UTF-8', 'UTF-8');
    $mpdf->WriteHTML($html);
    $mpdf->AddPage();

    //Page 2
    ob_start();
    require("components/report-budget/page2.php");
    $html = ob_get_contents();
    ob_end_clean();
    $html = mb_convert_encoding($html, 'UTF-8', 'UTF-8');
    $mpdf->WriteHTML($html);

    /////////////////////////////////////////////////

    // Output a PDF file directly to the browser
    $data = $mpdf->OutputBinaryData();
    header('Content-type: application/pdf');
    header('Content-Transfer-Encoding: binary');
    header('Accept-Ranges: bytes');
    header('Cache-Control: max-age=0');
    echo $data;
    ?>
</body>

</html>