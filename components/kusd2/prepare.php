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


// File Excel Participants
$rowFileProjectExcel = getDataByAttributes("file_path", ["projectExpReportParticipantsId" => $rowPjExp["id"]], "FileProjectExpReport", 1);

//Get Head of Project (From ESignature - READ ONLY)
$headOfPj = getDataByAttributes("*", ["projectid" => $rowPj['id'], "projectStatus" => "SA2_OG_PJ_Approved"], "ESignature", 1, "createdAt", "DESC");
$sign_headOfPj = null;
if ($headOfPj != null) {
    $sign_headOfPj = getObjectURLS3($headOfPj["image"], "saku-prod-signature");
    //Get Faculty & Phone From User Table
    $headOfPjUser = getDataByAttributes("*", ["id" => $headOfPj["userid"]], "User");
}
//Get Head of Organization (From ESignature - READ ONLY)
$headOfOg = getDataByAttributes("*", ["projectid" => $rowPj['id'], "projectStatus" => "SA2_OG_HD_Approved"], "ESignature", 1, "createdAt", "DESC");
$sign_headOfOg = null;
if ($headOfOg != null) {
    $sign_headOfOg = getObjectURLS3($headOfOg["image"], "saku-prod-signature");
}
//Get Advisor (From ESignature - READ ONLY)
$advisorOg = getDataByAttributes("*", ["projectid" => $rowPj['id'], "projectStatus" => "SA2_OG_AV_Approved"], "ESignature", 1, "createdAt", "DESC");
$sign_advisor = null;
if ($advisorOg != null) {
    $sign_advisor = getObjectURLS3($advisorOg["image"], "saku-prod-signature");
    //Get Phone From User Table
    $advisorOgUser = getDataByAttributes("PhoneNumber", ["id" => $advisorOg["userid"]], "User");
}
//Get SAB Head (From ESignature - READ ONLY)
$sabHead = getDataByAttributes("*", ["projectid" => $rowPj['id'], "projectStatus" => "SA2_SAB_HD_Approved"], "ESignature", 1, "createdAt", "DESC");
$sign_sabHead = null;
if ($sabHead != null) {
    $sign_sabHead = getObjectURLS3($sabHead["image"], "saku-prod-signature");
}
//Get SD Staff (From ESignature - READ ONLY)
$sdStaff = getDataByAttributes("*", ["projectid" => $rowPj['id'], "projectStatus" => "SA2_SD_CK_Approved"], "ESignature", 1, "createdAt", "DESC");
$sign_sdStaff = null;
if ($sdStaff != null) {
    $sign_sdStaff = getObjectURLS3($sdStaff["image"], "saku-prod-signature");
}
//Get SD Head (From ESignature - READ ONLY)
$sdHead = getDataByAttributes("*", ["projectid" => $rowPj['id'], "projectStatus" => "SA2_SD_AT_Approved"], "ESignature", 1, "createdAt", "DESC");
$sign_sdHead = null;
if ($sdHead != null) {
    $sign_sdHead = getObjectURLS3($sdHead["image"], "saku-prod-signature");
}
//Get SD Financial (From ESignature - READ ONLY)
$sdFinancial = getDataByAttributes("*", ["projectid" => $rowPj['id'], "projectStatus" => "ProjectSuccessful"], "ESignature", 1, "createdAt", "DESC");
$sign_sdFinancial = null;
if ($sdFinancial != null) {
    $sign_sdFinancial = getObjectURLS3($sdFinancial["image"], "saku-prod-signature");
}

//Get SD Director (From ESignature - READ ONLY)
$sign_sdDirector = getObjectURLS3("SIGN-DIR-SDKU67.png", "saku-prod-signature");

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