<div style="width:100%;">
    <h2>สรุปภาพรวมแต่ละด้าน มีรายละเอียดดังต่อไปนี้</h2>
    <?php
    foreach ($arrBudgetByTypeOg as $key => $value) {
        echo "<p>" . $key . " รวมทั้งสิ้น " . "<b>" . number_format($value) . " บาท</b>" .  "</p>";
    }
    ?>
</div>

<div style="position: fixed; top:350; width:100%;">
    <p>ข้าพเจ้าได้ตรวจสอบรายงานการจัดสรรงบประมาณข้างต้นแล้ว ขอรับรองว่าถูกต้องทุกประการ</p>
    <br>
    <div style="text-align: center;">
        <div style="float: left; padding:0; margin:0; width:50%">
            <img style="opacity: 0.1;" src="assets/kusab.png" width="100"><br>
            (...............................................................)<br>
            ตำแหน่ง..........................................................<br>
            ในนาม องค์การบริหาร องค์การนิสิต<br>
            มหาวิทยาลัยเกษตรศาสตร์
        </div>
        <div style="float: right; padding:0; margin:0; width:50%">
            <img style="opacity: 0.1;" src="assets/kusc.png" width="100"><br>
            (...............................................................)<br>
            ตำแหน่ง..........................................................<br>
            ในนาม สภาผู้แทนนิสิต<br>
            มหาวิทยาลัยเกษตรศาสตร์
        </div>
    </div>
</div>

<p style="position:fixed; top:680px; color: #8C8C8C;">
    หน้าที่ {PAGENO} / {nbpg} |
    รายงานโดย <?= $decoded->name ?>
    ตำแหน่ง <?= $decoded->role == "SAB" ? "องค์การบริหาร องค์การนิสิต" : "สภาผู้แทนนิสิต" ?>
    วันที่ <?= date("d/m/Y") ?>
    เวลา <?= date("H:i:s") ?>
    IP Address <?= getUserIP() ?>
</p>