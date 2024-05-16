<div style="width:100%;">
    <br><br><br><br><br><br>
    <img src="assets/ku_sd_online.png" width="200">
    <h1 style="line-height: 0; padding: 0; margin:0;">รายงานการจัดสรรงบประมาณเงินบำรุงกิจกรรมนิสิต</h1>
    <h1 style="line-height: 0; padding: 0; margin:0;">
        <?php
        $i = 0;
        foreach ($rowTag as $row) {
            if ($i == 0) {
                echo $row['name'];
            } else {
                echo ", " . $row['name'];
            }
            $i++;
        }
        ?>
    </h1>
</div>

<p style="position:fixed; text-align:center; top:680px; color: #8C8C8C;">
    หน้าที่ {PAGENO} / {nbpg} |
    รายงานโดย <?= $decoded->name ?>
    ตำแหน่ง <?= $decoded->role == "SAB" ? "องค์การบริหาร องค์การนิสิต" : "สภาผู้แทนนิสิต" ?>
    วันที่ <?= date("d/m/Y") ?>
    เวลา <?= date("H:i:s") ?>
    IP Address <?= getUserIP() ?>
</p>