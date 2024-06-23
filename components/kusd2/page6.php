<div style="width:100%;">
    <img src="assets/ku_sd_online.png" width="200">
    <h3 style="line-height: 0; padding: 0; margin:0;">ภาพภ่ายโครงการ <?= $rowPj['project_name_th'] ?></h3>
    <h4>วันที่ <?= dateThai($rowPj['date_start_the_project'], $rowPj['date_end_the_project'], "full") ?></h4>
    <h4>ณ <?= $rowPj['project_location'] ?></h4>
</div>

<?php
//Picture Report Posgres
$sqlPicture = "SELECT file_path FROM \"FileProjectExpReport\" WHERE \"projectExpReportPhotoId\" = $1";
$prepare = pg_prepare($con, "sqlPicture", $sqlPicture);
$resultPicture = pg_execute($con, "sqlPicture", [$rowPjExp['id']]);
$pictureAll = pg_fetch_all($resultPicture);

//Change to Array
$pictureAll = array_column($pictureAll, 'file_path');

?>

<table width="100%">
    <?php
    $i = 0;
    foreach ($pictureAll as $picture) {
        if ($i % 2 == 0) {
            echo "<tr>"; // Start a new row if $i is a multiple of 3
        }
    ?>
        <td>
            <img src="<?=getObjectURLS3($picture, $_ENV["S3_IMAGE_BUCKET"])?>" width="100%">
        </td>
    <?php
        if ($i % 2 == 2 || $i == count($pictureAll) - 1) {
            echo "</tr>"; // End the row if $i is the last element or a multiple of 3
        }
        $i++;
    }
    ?>
</table>