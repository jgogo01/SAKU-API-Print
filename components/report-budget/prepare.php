<?php
require("connection.php");
require("utils/function.php");
require("vendor/autoload.php");

use \Firebase\JWT\JWT;
use Firebase\JWT\Key;

// Check Token
if (getBearerToken() == null) {
    http_response_code(401);
    $stdClass = new stdClass();
    $stdClass->status = 401;
    $stdClass->msg = "กรุณาเข้าสู่ระบบก่อนใช้งาน [ERR-TOKEN-401]";
    $stdClass->data = null;
    header("Content-Type: application/json");
    exit(json_encode($stdClass));
} else {
    $jwt = getBearerToken();
    $JWT_SECRET = $_ENV['JWT_SECRET'];
    try{
        JWT::decode($jwt, new Key($JWT_SECRET, 'HS256'));
    } catch (Exception $e) {
        http_response_code(401);
        $stdClass = new stdClass();
        $stdClass->status = 401;
        $stdClass->msg = "โทเคนของท่านไม่ถูกต้อง [ERR-TOKEN-401]";
        $stdClass->data = null;
        header("Content-Type: application/json");
        exit(json_encode($stdClass));
    }

    // Check Role
    if ($decoded->role != "SAB" && $decoded->role != "SC") {
        http_response_code(403);
        $stdClass = new stdClass();
        $stdClass->status = 403;
        $stdClass->msg = "ท่านไม่มีสิทธิ์ใช้งานในส่วนนี้ [ERR-ROLE-403]";
        $stdClass->data = null;
        header("Content-Type: application/json");
        exit(json_encode($stdClass));
    }
}

if (!isset($_POST['type'])) {
    http_response_code(400);
    $stdClass = new stdClass();
    $stdClass->status = 400;
    $stdClass->msg = "ท่านเรียกใช้งานไม่ถูกต้อง [ERR-TAG-400]";
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
    'default_font_size' => 14,
    'format' => 'A4-L',
    'orientation' => 'L',
    'tempDir' => $_SERVER['DOCUMENT_ROOT'] . "/temp",
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
]);
#Fix Table Width
$mpdf->shrink_tables_to_fit = 1;

$role = $decoded->role;
$tag = $_POST['tag'];

# Prepare Arrart to SQL IN Cause
$tag = "'" . implode("','", $tag) . "'";

#Get Name Tag (Include SQL Injection)
$sqlTag = 'SELECT name FROM "Tag" WHERE id IN (' . $tag . ')';
$resultTag = pg_query($con, $sqlTag);
$rowTag = pg_fetch_all($resultTag);

# Get DISTINCT Organization
$sqlTypeOg = 'SELECT DISTINCT orgType.name as org_type_name,
              orgType.id as org_type_id 
              FROM "Project" as pj

          JOIN "Organization" as org
          ON pj.organization_orgid = org.id

          JOIN "OrganizationType" as orgType
          ON org.org_typeid = orgType.id

          WHERE pj."tagId" IN (' . $tag . ')
          ORDER BY orgType.name ASC;
          ';
$resultTypeOg = pg_query($con, $sqlTypeOg);
$rowTypeOg = pg_fetch_all($resultTypeOg);
