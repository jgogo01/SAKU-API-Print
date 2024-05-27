<div style="page-break-after:always;"></div>

<?php
$objPj = str_replace("{", "", $rowPj['project_objectives']);
$objPj = str_replace("}", "", $objPj);
$objPj = str_replace("\"", "", $objPj);
$objPj = explode(",", $objPj);

$activity_format = str_replace("{", "", $rowPj['activity_format']);
$activity_format = str_replace("}", "", $activity_format);
$activity_format = str_replace("\"", "", $activity_format);
$activity_format = explode(",", $activity_format);

$expected_outcome = str_replace("{", "", $rowPj['expected_project_outcome']);
$expected_outcome = str_replace("}", "", $expected_outcome);
$expected_outcome = str_replace("\"", "", $expected_outcome);
$expected_outcome = explode(",", $expected_outcome);
?>
<div style="text-align:start;"><b>หลักการและเหตุผล</b></div>
<p style="text-align:start;">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <?= str_replace("\\", "\"", $rowPj['principles_and_reasoning']) ?>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</p>

<br>

<div style="text-align:start;"><b>วัตถุประสงค์ของโครงการ</b></div>
<p style="text-align:start;">
<ol>
    <?php foreach ($objPj as $obj) { ?>
        <li><?= str_replace("\\", "\"", $obj) ?></li>
    <?php } ?>
</ol>
</p>
<?php
$number_of_project_participants = json_decode($rowPj['number_of_project_participants'], true);
?>
<div style="text-align:start;">
    <b>จำนวนผู้เข้าร่วมโครงการ</b>&nbsp;&nbsp;
    <b>คณะทำงาน</b>
    &nbsp;&nbsp;<span class="underline">&nbsp;&nbsp; <?= isset($number_of_project_participants["coreteam"]) ? $number_of_project_participants["coreteam"] : "&nbsp;&nbsp;" ?> &nbsp;&nbsp;</span>
    <b>ผู้เข้าร่วม(นิสิต)</b>
    &nbsp;&nbsp;<span class="underline">&nbsp;&nbsp; <?= isset($number_of_project_participants["student"]) ? $number_of_project_participants["student"] : "&nbsp;&nbsp;" ?> &nbsp;&nbsp;</span>
    <b>บุคคลทั่วไป(ถ้ามี)</b>
    &nbsp;&nbsp;<span class="underline">&nbsp;&nbsp; <?= isset($number_of_project_participants["guest"]) ? $number_of_project_participants["guest"] : "&nbsp;&nbsp;" ?> &nbsp;&nbsp;</span>
</div>

<div style="text-align:start;">
    <b>วันที่ปฏิบัติงาน</b>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <span class="underline">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <?= dateThai($rowPj['date_start_the_project'], $rowPj['date_end_the_project'], "full") ?>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </span>
</div>

<div style="text-align:start;">
    <b>สถานที่ปฏิบัติงาน</b>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <span class="underline">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <?= $rowPj["project_location"] ?>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </span>
</div>

<div style="text-align:start;"><b>ลักษณะและรูปแบบกิจกรรม</b></div>
<p style="text-align:start;">
<ol>
    <?php foreach ($activity_format as $act) { ?>
        <li><?= str_replace("\\", "\"", $act) ?></li>
    <?php } ?>
</ol>
</p>