<?php
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

//Project Exp
$id = $_GET['id'];
//Project
$rowPj = getDataByAttributes("*", ["id" => $id], "Project", 1);
if (!isset($rowPj)) {
    http_response_code(400);
    $stdClass = new stdClass();
    $stdClass->status = 400;
    $stdClass->msg = "ไม่พบโครงการของท่าน กรุณาติดต่อกองพัฒนานิสิต [ERR-PJ-400]";
    $stdClass->data = null;
    header("Content-Type: application/json");
    exit(json_encode($stdClass));
}

$rowPjExp = getDataByAttributes("*", ["projectid" => $rowPj["id"]], "ProjectExpReport", 1);
if (!isset($rowPjExp)) {
    http_response_code(404);
    $stdClass = new stdClass();
    $stdClass->status = 404;
    $stdClass->msg = "ไม่พบรายงานโครงการของท่าน [ERR-PJEXP-404]";
    $stdClass->data = null;
    header("Content-Type: application/json");
    exit(json_encode($stdClass));
}

// Organization
$rowOg = getDataByAttributes("*", ["id" => $rowPj['organization_orgid']], "Organization", 1);
if (!isset($rowOg)) {
    http_response_code(400);
    $stdClass = new stdClass();
    $stdClass->status = 400;
    $stdClass->msg = "ไม่พบองค์กรของท่าน กรุณาติดต่อกองพัฒนานิสิต [ERR-OG-400]";
    $stdClass->data = null;
    header("Content-Type: application/json");
    exit(json_encode($stdClass));
}

// Mpdf
$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];
$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];
$mpdf = new \Mpdf\Mpdf([
    'mode' => 'utf-8',
    'format' => 'A4',
    'orientation' => 'P',
    'tempDir' => $_SERVER['DOCUMENT_ROOT']."/temp",
    'fontDir' => array_merge($fontDirs, [
        $_SERVER['DOCUMENT_ROOT'] . "/fonts",
    ]),
    'fontdata' => $fontData + [
        'sarabun' => [
            'R' => 'THSarabunNew.ttf',
            'I' => 'THSarabunNew Italic.ttf',
            'B' =>  'THSarabunNew Bold.ttf',
            'BI' => 'THSarabunNew BoldItalic.ttf'
        ]
    ],
    'margin_bottom' => 0,
]);
$mpdf->shrink_tables_to_fit = 1;

$currDate = date('Y-m-d');
$currTime = date('H:i:s');
?>