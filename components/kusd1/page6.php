<?php

if ($rowPj['project_bugdet_require'] > 0) {
?>
    <!-- 1. Head -->
    <div style="position: fixed; width: 400; top:92; left:70;">กองพัฒนานิสิต</div>
    <div style="position: fixed; width: 130; top:27; left:550;">16400300021</div>

    <!-- 2. Project -->
    <div style="position: fixed; width: 270; top:142; left:80;"><?= $borrower["name"] ?></div>
    <div style="position: fixed; width: 280; top:142; left:400;">ประธานโครงการ</div>
    <div style="position: fixed; width: 290; top:165; left:70;"><?= $rowOg['orgnameth'] ?></div>
    <div style="position: fixed; width: 270; top:165; left:410;">กรุงเทพมหานคร</div>
    <div style="position: fixed; width: 460; top:190; left:200;">กองพัฒนานิสิต</div>
    <div style="position: fixed; width: 350; height: 80; line-height: 1.1; top:216; left:160;">
        ค่าใช้จ่ายในการดำเนินโครงการ
        <?= $rowPj['project_name_th'] ?>
    </div>

    <!-- 3. Budget -->
    <div style="position: fixed; width: 320; top:310; left:90;"><?= baht_text($rowPj['project_bugdet_require']) ?></div>
    <div style="position: fixed; width: 165; top:310; left:520;"><?= number_format($rowPj['project_bugdet_require']) ?></div>
<?php
}
?>