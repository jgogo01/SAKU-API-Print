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

// Project
$id = $_GET['id'];
$rowPj = getDataByAttributes("*", ["id" => $id], "Project", 1);
if (!isset($rowPj)) {
    http_response_code(404);
    $stdClass = new stdClass();
    $stdClass->status = 404;
    $stdClass->msg = "ไม่พบโครงการของท่าน [ERR-PJ-404]";
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

$stakeholderTreasurer = json_decode($rowPj['stakeholder_treasurer_json']);
//Get Stakeholder Leader
$stakeholderLeader = getDataByAttributes("*", ["id" => $rowPj['stakeholder_leader_uid']], "User");
//Get Stakeholder Advisor
$stakeholderAdvisor = getDataByAttributes("*", ["id" => $rowPj['stakeholder_advisor_uid']], "User");
$borrower = [
    "name" => "-",
    "idCode" => "-",
    "facultyId" => "-",
];
$facultyBorrower = [
    "name" => "-"
];
//Get Borrower (Optional)
if ($rowPj['borrowerid'] != null) {
    $borrower = getDataByAttributes("*", ["id" => $rowPj['borrowerid']], "User");
    if($borrower['facultyId'] != null){
        $facultyBorrower = getDataByAttributes("name", ["id" => $borrower['facultyId']], "Faculty");
        //Delete Left String "b"
        $borrower['idCode'] = substr($borrower['idCode'], 1);
    }
}

//Get Head of Project (From ESignature - READ ONLY)
$headOfPj = getDataByAttributes("*", ["projectid" => $rowPj['id'], "projectStatus" => "SA1_OG_PJ_Approved"], "ESignature", 1, "createdAt", "DESC");
$sign_headOfPj = null;
if ($headOfPj != null) {
    $sign_headOfPj = getObjectURLS3($headOfPj["image"], "saku-prod-signature");
    //Get Faculty & Phone From User Table
    $headOfPjUser = getDataByAttributes("*", ["id" => $headOfPj["userid"]], "User");
}
//Get Head of Organization (From ESignature - READ ONLY)
$headOfOg = getDataByAttributes("*", ["projectid" => $rowPj['id'], "projectStatus" => "SA1_OG_HD_Approved"], "ESignature", 1, "createdAt", "DESC");
$sign_headOfOg = null;
if ($headOfOg != null) {
    $sign_headOfOg = getObjectURLS3($headOfOg["image"], "saku-prod-signature");
}
//Get Advisor (From ESignature - READ ONLY)
$advisorOg = getDataByAttributes("*", ["projectid" => $rowPj['id'], "projectStatus" => "SA1_OG_AV_Approved"], "ESignature", 1, "createdAt", "DESC");
$sign_advisor = null;
if ($advisorOg != null) {
    $sign_advisor = getObjectURLS3($advisorOg["image"], "saku-prod-signature");
    //Get Phone From User Table
    $advisorOgUser = getDataByAttributes("PhoneNumber", ["id" => $advisorOg["userid"]], "User");
}
//Get SAB Head (From ESignature - READ ONLY)
$sabHead = getDataByAttributes("*", ["projectid" => $rowPj['id'], "projectStatus" => "SA1_SAB_HD_Approved"], "ESignature", 1, "createdAt", "DESC");
$sign_sabHead = null;
if ($sabHead != null) {
    $sign_sabHead = getObjectURLS3($sabHead["image"], "saku-prod-signature");
}
//Get SD Staff (From ESignature - READ ONLY)
$sdStaff = getDataByAttributes("*", ["projectid" => $rowPj['id'], "projectStatus" => "SA1_SD_CK_Approved"], "ESignature", 1, "createdAt", "DESC");
$sign_sdStaff = null;
if ($sdStaff != null) {
    $sign_sdStaff = getObjectURLS3($sdStaff["image"], "saku-prod-signature");
}
//Get SD Head (From ESignature - READ ONLY)
$sdHead = getDataByAttributes("*", ["projectid" => $rowPj['id'], "projectStatus" => "SA1_SD_AT_Approved"], "ESignature", 1, "createdAt", "DESC");
$sign_sdHead = null;
if ($sdHead != null) {
    $sign_sdHead = getObjectURLS3($sdHead["image"], "saku-prod-signature");
}
//Get SD Financial (From ESignature - READ ONLY)
$sdFinancial = getDataByAttributes("*", ["projectid" => $rowPj['id'], "projectStatus" => "SA1_SD_FC_Approved"], "ESignature", 1, "createdAt", "DESC");
$sign_sdFinancial = null;
if ($sdFinancial != null) {
    $sign_sdFinancial = getObjectURLS3($sdFinancial["image"], "saku-prod-signature");
}
//Get SD Director (From ESignature - READ ONLY)
$sign_sdDirector = getObjectURLS3("SIGN-DIR-SDKU67.png", "saku-prod-signature");
//Get KU Vice Director (From ESignature - READ ONLY)
$sign_kuViceDirector = getObjectURLS3("SIGN-CO-DIRKU67.png", "saku-prod-signature");

$currDate = date('Y-m-d');
$currTime = date('H:i:s');
?>