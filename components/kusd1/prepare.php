<?php
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
//Get Borrower (Optional)
if ($rowPj['borrowerid'] != null) {
    $borrower = getDataByAttributes("*", ["id" => $rowPj['borrowerid']], "User");
    //Get Borrower Faculty
    $facultyBorrower = getDataByAttributes("name", ["id" => $borrower['facultyId']], "Faculty");
}
$borrower = [
    "name" => "-",
    "idCode" => "-",
    "facultyId" => "-"
];
$facultyBorrower = [
    "name" => "-"
];

//Get Head of Project (From ESignature - READ ONLY)
$headOfPj = getDataByAttributes("*", ["projectid" => $rowPj['id'], "projectStatus" => "SA1_OG_PJ_Approved"], "ESignature", 1, "createdAt", "DESC");
$sign_headOfPj = null;
if ($headOfPj != null) {
    $sign_headOfPj = getObjectFromS3($headOfPj["image"], "saku-prod-signature");
}
//Get Head of Organization (From ESignature - READ ONLY)
$headOfOg = getDataByAttributes("*", ["projectid" => $rowPj['id'], "projectStatus" => "SA1_OG_HD_Approved"], "ESignature", 1, "createdAt", "DESC");
$sign_headOfOg = null;
if ($headOfOg != null) {
    $sign_headOfOg = getObjectFromS3($headOfOg["image"], "saku-prod-signature");
}
//Get Advisor (From ESignature - READ ONLY)
$advisorOg = getDataByAttributes("*", ["projectid" => $rowPj['id'], "projectStatus" => "SA1_OG_AV_Approved"], "ESignature", 1, "createdAt", "DESC");
$sign_advisor = null;
if ($advisorOg != null) {
    $sign_advisor = getObjectFromS3($advisorOg["image"], "saku-prod-signature");
}
//Get SAB Head (From ESignature - READ ONLY)
$sabHead = getDataByAttributes("*", ["projectid" => $rowPj['id'], "projectStatus" => "SA1_SAB_HD_Approved"], "ESignature", 1, "createdAt", "DESC");
$sign_sabHead = null;
if ($sabHead != null) {
    $sign_sabHead = getObjectFromS3($sabHead["image"], "saku-prod-signature");
}
//Get SD Staff (From ESignature - READ ONLY)
$sdStaff = getDataByAttributes("*", ["projectid" => $rowPj['id'], "projectStatus" => "SA1_SD_CK_Approved"], "ESignature", 1, "createdAt", "DESC");
$sign_sdStaff = null;
if ($sdStaff != null) {
    $sign_sdStaff = getObjectFromS3($sdStaff["image"], "saku-prod-signature");
}
//Get SD Head (From ESignature - READ ONLY)
$sdHead = getDataByAttributes("*", ["projectid" => $rowPj['id'], "projectStatus" => "SA1_SD_AT_Approved"], "ESignature", 1, "createdAt", "DESC");
$sign_sdHead = null;
if ($sdHead != null) {
    $sign_sdHead = getObjectFromS3($sdHead["image"], "saku-prod-signature");
}
//Get SD Financial (From ESignature - READ ONLY)
$sdFinancial = getDataByAttributes("*", ["projectid" => $rowPj['id'], "projectStatus" => "SA1_SD_FC_Approved"], "ESignature", 1, "createdAt", "DESC");
$sign_sdFinancial = null;
if ($sdFinancial != null) {
    $sign_sdFinancial = getObjectFromS3($sdFinancial["image"], "saku-prod-signature");
}
//Get SD Director (From ESignature - READ ONLY)
$sign_sdDirector = getObjectFromS3("SIGN-DIR-SDKU67.png", "saku-prod-signature");
//Get KU Vice Director (From ESignature - READ ONLY)
$sign_kuViceDirector = getObjectFromS3("SIGN-CO-DIRKU67.png", "saku-prod-signature");
?>