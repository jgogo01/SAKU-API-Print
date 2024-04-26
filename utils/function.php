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
            if (!is_string($attribute) || !is_string($value)) {
                throw new InvalidArgumentException('Invalid condition: attribute and value must be strings.');
            }
            $whereClause .= "\"$attribute\" = $" . $conditionIndex;
            $params[] = $value;
            if ($conditionIndex < $conditionCount) {
                $whereClause .= " AND ";
            }
            $conditionIndex++;
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
        return pg_fetch_assoc($result);
    }

    return null;
}
