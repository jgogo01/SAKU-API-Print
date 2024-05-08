<div style="page-break-before:always;"></div>
<div style="width:100%;">
    <img src="assets/ku_sd_online.png" width="200">
    <h3 style="line-height: 0; padding: 0; margin:0;">กำหนดการโครงการ <?= $rowPj['project_name_th'] ?></h3>
    <h4>วันที่ <?= dateThai($rowPj['date_start_the_project'], $rowPj['date_end_the_project'], "full") ?></h4>
    <h4>ณ <?= $rowPj['project_location'] ?></h4>
</div>

<?php
//Page 5
$schedule = json_decode($rowPj['schedule']);

$i = 0;
foreach ($schedule->each_day as $eachDay) {
?>
    <br>
    <h3 style="padding: 0; margin:0;">
        วันที่ <?= dateThai($eachDay->date, $eachDay->date, "full") ?>
        (<?= $eachDay->description ?>)
    </h3>
    <div style="width:100%; margin-top: 10px;">
        <table width="100%" border="1" style="border-collapse: collapse;">
            <thead>
                <tr style="background-color: #d5eaf7">
                    <th width="5%">ที่</th>
                    <th width="20%">เวลา</th>
                    <th width="75%">กิจกรรม</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $j = 0;
                foreach ($eachDay->time as $time) {
                ?>
                    <tr>
                        <td><?= $j +1  ?></td>
                        <td><?= format_time($time->time_start, $time->time_end, "short") ?></td>
                        <td><?= $time->description ?></td>
                    </tr>
                <?php $j++;
                } ?>
            </tbody>
        </table>
    </div>
<?php
}
?>