<div style="width:100%;">
    <img src="assets/ku_sd_online.png" width="200">
    <h3 style="line-height: 0; padding: 0; margin:0;">รายชื่อผู้เข้าร่วมโครงการ <?= $rowPj['project_name_th'] ?></h3>
    <h4>วันที่ <?= dateThai($rowPj['date_start_the_project'], $rowPj['date_end_the_project'], "full") ?></h4>
    <h4>ณ <?= $rowPj['project_location'] ?></h4>
</div>
<?php
$i = 0;
$rowURLExcel = getObjectURLS3($rowFileProjectExcel['file_path'], $_ENV["S3_IMAGE_BUCKET"]);
if (($open = fopen($rowURLExcel, "r")) !== false) {
?>
    <table width="100%" border="1" style="border-collapse: collapse;">
        <thead>
            <tr style="background-color: #FFEAD9;">
                <th width="10%">ลำดับที่</th>
                <th width="20%">รหัสนิสิต</th>
                <th width="30%">ชื่อ-นามสกุล</th>
                <th width="20%">ภาควิชา/ชั้นปี</th>
                <th width="20%">ตำแหน่ง</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while (($data = fgetcsv($open, 10000, ",")) !== false) {
                if ($i != 0) {
            ?>
                    <tr>
                        <td style="text-align: center;"><?= $i ?></td>
                        <td style="text-align: center;"><?= $data[4] != null ? $data[4] : "-" ?></td>
                        <td><?= $data[5] != null ? $data[5] . $data[6] : "" ?></td>
                        <td style="text-align: center;"><?= $data[7] && $data[8] != null ?  $data[7] . "/" . $data[9] : "-" ?></td>
                        <td style="text-align: center;"><?= match ($data[10]) {
                                "S" => "คณะทำงาน",
                                "P" => "ผู้เข้าร่วม",
                                "G" => "บุคคลทั่วไป",
                                default => ""
                            } ?>
                        </td>
                    </tr>
            <?php
                }
                $i++;
            }
            fclose($open);
            ?>
            </tr>
        </tbody>
    </table>

<?php
} else {
    $stdClass = new stdClass();
    $stdClass->status = 400;
    $stdClass->msg = "ไม่สามารถเปิดไฟล์ Excel ได้ [ERR-EXCEL-400]";
    $stdClass->data = null;
    header("Content-Type: application/json");
    exit(json_encode($stdClass));
}
?>