<?php
require 'vendor/autoload.php';
date_default_timezone_set('Asia/Bangkok');
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

//Get Value From ENV
$DB_HOST = $_ENV['DB_HOST'];
$DB_PORT = $_ENV['DB_PORT'];
$DB_NAME = $_ENV['DB_NAME'];
$DB_USER = $_ENV['DB_USER'];
$DB_PASS = $_ENV['DB_PASS'];
$S3_KEY = $_ENV['S3_KEY'];
$S3_SECRET = $_ENV['S3_SECRET'];
$S3_ENDPOINT = $_ENV['S3_ENDPOINT'];

$con = pg_connect("host=$DB_HOST port=$DB_PORT dbname=$DB_NAME user=$DB_USER password=$DB_PASS");
if (!$con) {
    die("Connection failed: " . pg_last_error());
}

$s3 = new Aws\S3\S3Client([
    'version' => 'latest',
    'region'  => 'us-east-1',
    'endpoint' => $S3_ENDPOINT,
    'use_path_style_endpoint' => true,
    'credentials' => [
        'key'    => $S3_KEY,
        'secret' => $S3_SECRET
    ],
]);