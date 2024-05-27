<div style="page-break-after:always;"></div>

<!-- 1. Head -->
<div style="position: fixed; width: 380; top:75; left:70;">กองพัฒนานิสิต มหาวิทยาลัยเกษตรศาสตร์</div>
<div style="position: fixed; width: 180; top:9; left:500;"><?= $rowPj["activity_code"] ?></div>

<!-- 2. Project -->
<div style="position: fixed; width: 350; top:125; left:80;"><?= $borrower["name"] ?></div>
<div style="position: fixed; width: 210; top:125; left:480;">ประธานโครงการ</div>
<div style="position: fixed; width: 390; top:148; left:70;"><?= $rowOg['orgnameth'] ?></div>
<div style="position: fixed; width: 190; top:148; left:500;">กรุงเทพมหานคร</div>
<div style="position: fixed; width: 460; top:173; left:200;">กองพัฒนานิสิต มหาวิทยาลัยเกษตรศาสตร์</div>
<div style="position: fixed; width: 650; height: 50; line-height: 1.1; top:200; left:35;">
    เพื่อเป็นค่าใช้จ่ายในการ ดำเนินโครงการ
    <?= $rowPj['project_name_th'] ?>
    ดังรายละเอียดต่อไปนี้
</div>

<div style="position: fixed; width: 470; height: 80; line-height: 1.1; top:250; left:35;">
    <?= $rowPj['project_name_th'] ?>
</div>

<!-- 3. Budget -->
<div style="position: fixed; width: 335; top:342; left:90;"><?= baht_text($rowPj['project_bugdet_require']) ?></div>
<div style="position: fixed; width: 160; top:342; left:530;"><?= number_format($rowPj['project_bugdet_require'], 2) ?></div>

<!-- 4. SD -->
<div style="position: fixed; width: 350; top:535; left:70;">รองอธิการบดีฝ่ายกิจการนิสิตและพัฒนาอย่างยั่งยืน</div>
<div style="position: fixed; width: 185; top:560; left:470;"><?= number_format($rowPj['project_bugdet_require'], 2) ?></div>
<div style="position: fixed; width: 380; top:583; left:35;"><?= baht_text($rowPj['project_bugdet_require']) ?></div>

<!-- 5. DIR -->
<div style="position: fixed; width: 200; top:714; left:330;"><?= number_format($rowPj['project_bugdet_require'], 2) ?></div>
<div style="position: fixed; width: 380; top:739; left:35;"><?= baht_text($rowPj['project_bugdet_require']) ?></div>

<!-- 6. RECP -->
<div style="position: fixed; width: 150; top:898; left:200;"><?= number_format($rowPj['project_bugdet_require'], 2) ?></div>
<div style="position: fixed; width: 270; top:898; left:400;"><?= baht_text($rowPj['project_bugdet_require']) ?></div>

