
<?php
if ($rowPj["outside_kaset"] != null) {
    $jsonOutSide = json_decode($rowPj["outside_kaset"]);
    ?>

    <div style="page-break-after:always;"></div>
    <div style="width:100%; text-align:center;">
        <img src="assets/ku_sd_online.png" width="200">
    </div>
    <h2 style="text-align:center;">แบบยืนยันร่วมเดินทางของอาจารย์ที่ปรึกษา</h2>
    <p>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <?= isset($advisorOg["createdAt"]) ? dateThai($advisorOg["createdAt"], $advisorOg["createdAt"], "full-be") : "" ?>
    </p>
    <p><b>เรื่อง</b> ขอยืนยันการร่วมเดินทางเป็นอาจารย์ที่ปรึกษาโครงการ</p>
    <p><b>เรียน</b> ผู้อำนวยการกองพัฒนานิสิต</p>
    <br>
    <p>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        ข้าพเจ้า <?= isset($advisorOg) ? $advisorOg["name"] : "......................................................" ?> ตำแหน่ง อาจารย์ที่ปรึกษา <?= $rowOg['orgnameth'] ?>
        ยินดีร่วมเดินทาง เพื่อควบคุมดูแลนิสิตออกปฏิบัติ <?= $rowPj['project_name_th'] ?> (<?= $rowPj['project_name_en'] ?>)
        ของ <?= $rowOg['orgnameth'] ?> ระหว่างวันที่ <?= dateThai($rowPj['date_start_the_project'], $rowPj['date_end_the_project'], "full-be") ?>
        ณ <?= $rowPj['project_location'] ?>
        <?= $jsonOutSide->address ?>
        ตำบล<?= $jsonOutSide->subdistrict ?>
        อำเภอ<?= $jsonOutSide->district ?>
        จังหวัด<?= $jsonOutSide->province ?>
        รหัสไปรษณีย์ <?= $jsonOutSide->postalCode ?>
    </p>
    <br>
    <p>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        จึงเรียนมาเพื่อโปรดพิจารณา
    </p>

    <div style="position:fixed; top:450; left:300; width:200; height:150;">
        <p style="text-align:center;">
            <?= isset($advisorOg) ? "<img width=\"100\" src=\"data:image/png;base64, " . base64_encode($sign_advisor["Body"]) . "\">" : "" ?><br>
            <?= isset($advisorOg["name"]) ? "(" . $advisorOg["name"] . ")" : "(......................................................)" ?> <br>
            อาจารย์ที่ปรึกษา
        </p>
    </div>

    <!-- QR Code -->
    <div style="position: fixed; width: 220; top:847; left:482;">
        <b>ตรวจสอบได้ที่</b><br>
        <barcode code="<?= $GETURL ?>" type="QR" size="1" error="M" disableborder="1" /><br>
        <small style="font-size: 16px;"><?= $_GET["id"] ?></small><br>
        <small style="font-size: 14px;">IP: <?= getUserIP() ?></small><br>
        <small style="font-size: 14px;">TimeStamp: <?= $currDate . " " . $currTime ?></small>
    </div>

<?php
}
?>