<?php

function checkDatainArrary($array)
{
    return isset($array) && !empty($array) && count(array_filter($array)) > 0;
}

function format_time($time_start, $time_end)
{
    // แปลงเวลาเริ่มต้นและสิ้นสุดเป็น timestamp
    $start_timestamp = strtotime($time_start);
    $end_timestamp = strtotime($time_end);

    // กำหนดรูปแบบการแสดงเวลา
    $time_format = "H.i";

    // แปลงเวลาเริ่มต้นและสิ้นสุดเป็นข้อความ
    $start_time = date($time_format, $start_timestamp);
    $end_time = date($time_format, $end_timestamp);

    // สร้างข้อความสำหรับการแสดงผล
    $result = "$start_time - $end_time น.";

    return $result;
}

function getUserIP()
{
    // Get real visitor IP behind CloudFlare network
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
        $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if (filter_var($client, FILTER_VALIDATE_IP)) {
        $ip = $client;
    } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
        $ip = $forward;
    } else {
        $ip = $remote;
    }

    return $ip;
}


function dateThai($start, $end, $type)
{
    // ชื่อเดือนภาษาไทย
    $thai_months = array(
        'มกราคม',
        'กุมภาพันธ์',
        'มีนาคม',
        'เมษายน',
        'พฤษภาคม',
        'มิถุนายน',
        'กรกฎาคม',
        'สิงหาคม',
        'กันยายน',
        'ตุลาคม',
        'พฤศจิกายน',
        'ธันวาคม'
    );

    $thai_months_short = array(
        'ม.ค.',
        'ก.พ.',
        'มี.ค.',
        'เม.ย.',
        'พ.ค.',
        'มิ.ย.',
        'ก.ค.',
        'ส.ค.',
        'ก.ย.',
        'ต.ค.',
        'พ.ย.',
        'ธ.ค.'
    );

    //Timestamp to date format
    $startDate = date("Y-m-d", strtotime($start));
    $endDate = date("Y-m-d", strtotime($end));

    // แยกวัน เดือน ปี ของวันเริ่มต้น
    $startYear = date("Y", strtotime($start)) + 543;
    $startMonth = date("n", strtotime($start));
    $startDay = date("j", strtotime($start));

    // แยกวัน เดือน ปี ของวันสิ้นสุด
    $endYear = date("Y", strtotime($end)) + 543;
    $endMonth = date("n", strtotime($end));
    $endDay = date("j", strtotime($end));

    switch ($type) {
        case 'day':
            return $startDay;
            break;
        case 'month':
            return $thai_months[$startMonth - 1];
            break;
        case 'year':
            return $startYear;
            break;
        case 'short':
            $output = "";
            if ($startDate == $endDate) {
                return $startDay . " " . $thai_months_short[$startMonth - 1] . " " . $startYear;
            } else {
                return $startDay . " " . $thai_months_short[$startMonth - 1] . " " . $startYear . " - " . $endDay . " " . $thai_months_short[$endMonth - 1] . " " . $endYear;
            }
            return $output;
            break;
        case 'full':
            // แสดงรายละเอียดทั้งหมด
            $output = "";
            if ($startDate == $endDate) {
                return $startDay . " " . $thai_months[$startMonth - 1] . " " . $startYear;
            } else {
                return $startDay . " " . $thai_months[$startMonth - 1] . " " . $startYear . " - " . $endDay . " " . $thai_months[$endMonth - 1] . " " . $endYear;
            }
            return $output;
            break;
        default:
            break;
    }
}


const BAHT_TEXT_NUMBERS = array('ศูนย์', 'หนึ่ง', 'สอง', 'สาม', 'สี่', 'ห้า', 'หก', 'เจ็ด', 'แปด', 'เก้า');
const BAHT_TEXT_UNITS = array('', 'สิบ', 'ร้อย', 'พัน', 'หมื่น', 'แสน', 'ล้าน');
const BAHT_TEXT_ONE_IN_TENTH = 'เอ็ด';
const BAHT_TEXT_TWENTY = 'ยี่';
const BAHT_TEXT_INTEGER = 'ถ้วน';
const BAHT_TEXT_BAHT = 'บาท';
const BAHT_TEXT_SATANG = 'สตางค์';
const BAHT_TEXT_POINT = 'จุด';

/**
 * Convert baht number to Thai text
 * @param double|int $number
 * @param bool $include_unit
 * @param bool $display_zero
 * @return string|null
 */
function baht_text($number, $include_unit = true, $display_zero = true)
{
    if (!is_numeric($number)) {
        return null;
    }

    $log = floor(log($number, 10));
    if ($log > 5) {
        $millions = floor($log / 6);
        $million_value = pow(1000000, $millions);
        $normalised_million = floor($number / $million_value);
        $rest = $number - ($normalised_million * $million_value);
        $millions_text = '';
        for ($i = 0; $i < $millions; $i++) {
            $millions_text .= BAHT_TEXT_UNITS[6];
        }
        return baht_text($normalised_million, false) . $millions_text . baht_text($rest, true, false);
    }

    $number_str = (string)floor($number);
    $text = '';
    $unit = 0;

    if ($display_zero && $number_str == '0') {
        $text = BAHT_TEXT_NUMBERS[0];
    } else for ($i = strlen($number_str) - 1; $i > -1; $i--) {
        $current_number = (int)$number_str[$i];

        $unit_text = '';
        if ($unit == 0 && $i > 0) {
            $previous_number = isset($number_str[$i - 1]) ? (int)$number_str[$i - 1] : 0;
            if ($current_number == 1 && $previous_number > 0) {
                $unit_text .= BAHT_TEXT_ONE_IN_TENTH;
            } else if ($current_number > 0) {
                $unit_text .= BAHT_TEXT_NUMBERS[$current_number];
            }
        } else if ($unit == 1 && $current_number == 2) {
            $unit_text .= BAHT_TEXT_TWENTY;
        } else if ($current_number > 0 && ($unit != 1 || $current_number != 1)) {
            $unit_text .= BAHT_TEXT_NUMBERS[$current_number];
        }

        if ($current_number > 0) {
            $unit_text .= BAHT_TEXT_UNITS[$unit];
        }

        $text = $unit_text . $text;
        $unit++;
    }

    if ($include_unit) {
        $text .= BAHT_TEXT_BAHT;

        $satang = explode('.', number_format($number, 2, '.', ''))[1];
        $text .= $satang == 0
            ? BAHT_TEXT_INTEGER
            : baht_text($satang, false) . BAHT_TEXT_SATANG;
    } else {
        $exploded = explode('.', $number);
        if (isset($exploded[1])) {
            $text .= BAHT_TEXT_POINT;
            $decimal = (string)$exploded[1];
            for ($i = 0; $i < strlen($decimal); $i++) {
                $text .= BAHT_TEXT_NUMBERS[$decimal[$i]];
            }
        }
    }

    return $text;
}

function getObjectFromS3($key, $bucket)
{
    global $s3;
    try {
        $result = $s3->getObject([
            'Bucket' => $bucket,
            'Key' => $key
        ]);
        return $result;
    } catch (Aws\S3\Exception\S3Exception $e) {
        return null;
    }
}

function sumJson($json)
{
    $sum = 0;
    foreach ($json as $key => $value) {
        $sum += $value;
    }
    return $sum;
}

function getDataByAttributes($select, $conditions, $table, $limit = null, $orderColumn = null, $orderDirection = 'ASC')
{
    global $con;

    // Input validation (enhanced)
    if (!is_string($select) || !is_string($table) || !is_array($conditions)) {
        throw new InvalidArgumentException('Invalid arguments: $select and $table must be strings, and $conditions must be an array.');
    }

    // Prepared statement for security (using parameterized queries)
    $sql = "SELECT $select FROM \"$table\"";

    $whereClause = "";
    $params = array();

    if (!empty($conditions)) {
        $whereClause .= " WHERE ";
        $conditionCount = count($conditions);
        $conditionIndex = 1;
        foreach ($conditions as $attribute => $value) {
            if (!is_string($attribute)) {
                throw new InvalidArgumentException('Invalid condition: attribute must be a string.');
            }

            if (is_array($value)) {
                // Handle IN case
                $whereClause .= "\"$attribute\" IN (";
                $inParams = array();
                foreach ($value as $val) {
                    $inParams[] = '$' . $conditionIndex;
                    $params[] = $val;
                    $conditionIndex++;
                }
                $whereClause .= implode(', ', $inParams) . ")";
            } else {
                // Handle single value case
                if (!is_string($value)) {
                    throw new InvalidArgumentException('Invalid condition: value must be a string or an array of strings.');
                }
                $whereClause .= "\"$attribute\" = $" . $conditionIndex;
                $params[] = $value;
                $conditionIndex++;
            }

            if ($conditionIndex <= $conditionCount) {
                $whereClause .= " AND ";
            }
        }
    }

    $sql .= $whereClause;

    if ($orderColumn !== null) {
        $sql .= " ORDER BY \"$orderColumn\" $orderDirection";
    }
    if ($limit !== null) {
        $sql .= " LIMIT $" . (count($params) + 1); // Remove "::bigint" from LIMIT parameter
        $params[] = (int)$limit; // Cast $limit to integer
    }

    $result = pg_query_params($con, $sql, $params);

    // Error handling (improved)
    if (!$result) {
        $error = pg_last_error($con);
        throw new Exception("Error fetching data: $error");
    }

    $num = pg_num_rows($result);
    if ($num > 0) {
        return pg_fetch_assoc($result); // Fetch all rows
    }

    return null;
}
/** 
 * Get header Authorization
 * */
function getAuthorizationHeader(){
    $headers = null;
    if (isset($_SERVER['Authorization'])) {
        $headers = trim($_SERVER["Authorization"]);
    }
    else if (isset($_SERVER['HTTP_AUTHORIZATION'])) { //Nginx or fast CGI
        $headers = trim($_SERVER["HTTP_AUTHORIZATION"]);
    } elseif (function_exists('apache_request_headers')) {
        $requestHeaders = apache_request_headers();
        // Server-side fix for bug in old Android versions (a nice side-effect of this fix means we don't care about capitalization for Authorization)
        $requestHeaders = array_combine(array_map('ucwords', array_keys($requestHeaders)), array_values($requestHeaders));
        //print_r($requestHeaders);
        if (isset($requestHeaders['Authorization'])) {
            $headers = trim($requestHeaders['Authorization']);
        }
    }
    return $headers;
}

/**
 * get access token from header
 * */
function getBearerToken() {
    $headers = getAuthorizationHeader();
    // HEADER: Get the access token from the header
    if (!empty($headers)) {
        if (preg_match('/Bearer\s(\S+)/', $headers, $matches)) {
            return $matches[1];
        }
    }
    return null;
}

$arraySDG = [
    'SDG1' => '1',
    'SDG2' => '2',
    'SDG3' => '3',
    'SDG4' => '4',
    'SDG5' => '5',
    'SDG6' => '6',
    'SDG7' => '7',
    'SDG8' => '8',
    'SDG9' => '9',
    'SDG10' => '10',
    'SDG11' => '11',
    'SDG12' => '12',
    'SDG13' => '13',
    'SDG14' => '14',
    'SDG15' => '15',
    'SDG16' => '16',
    'SDG17' => '17'
];

function jwt_decode($secretKey, $jwt){
    // แยก JWT ออกเป็น Header, Payload และ Signature
    list($header, $payload, $signature) = explode('.', $jwt);
    // decode header และ payload จาก base64
    $decodedHeader = base64_decode($header);
    $decodedPayload = base64_decode($payload);
    // คำนวณ HMAC-SHA256 Signature ของ Header และ Payload จาก secret key
    $expectedSignature = hash_hmac('sha256', $header.'.'.$payload, $secretKey, true);
    // decode Signature จาก base64
    $decodedSignature = base64_decode($signature);
    // เปรียบเทียบ Signature ที่คำนวณได้กับ Signature ที่อยู่ใน JWT
    if (hash_equals($decodedSignature, $expectedSignature)) {
        // Signature ถูกต้อง แปลง payload ให้อยู่ในรูปแบบ array
        $decodedPayload = json_decode($decodedPayload, true);
        // คืนค่า payload
        return $decodedPayload;
    } else {
        // Signature ไม่ถูกต้อง
        return false;
    }
}