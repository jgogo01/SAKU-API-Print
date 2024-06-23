<div style="position: fixed; top: 38; left: 130; width: 560;">xxx</div>
<div style="position: fixed; top: 164; left: 80; width: 530;">xxx</div>
<div style="position: fixed; top: 186; left: 80; width: 610; height: 50;">xxx</div>
<div style="position: fixed; top: 236; left: 80; width: 610;">xxx</div>
<div style="position: fixed; top: 260; left: 20; width: 670;">xxx</div>
<div style="position: fixed; top: 284; left: 200; width: 220;">xxx</div>
<div style="position: fixed; top: 306; left: 270; width: 250;">xxx</div>
<div style="position: fixed; top: 331; left: 50; width: 150;">xxx</div>
<div style="position: fixed; top: 331; left: 435; width: 60;">xxx</div>

<!-- Head of Project (Sign) -->
<div style="position: fixed; width: 200; height:80; top:370; left:15;">xxx</div>
<div style="position: fixed; width: 200; top:453; left:15;">xxx</div>
<div style="position: fixed; width: 150; top:503; left:50;">xxx</div>

<!-- Head of Organization (Sign) -->
<div style="position: fixed; width: 200; height:80; top:370; left:250;">xxx</div>
<div style="position: fixed; width: 200; top:453; left:250;">xxx</div>
<div style="position: fixed; width: 160; top:503; left:285;">xxx</div>

<!-- Head of Project (Advisor) -->
<div style="position: fixed; width: 200; height:80; top:370; left:485;">xxx</div>
<div style="position: fixed; width: 200; top:453; left:485;">xxx</div>
<div style="position: fixed; width: 160; top:503; left:520;">xxx</div>

<!-- SAB Head (Sign) -->
<div style="position: fixed; width: 200; height:80; top:620; left:15;">xxx</div>
<div style="position: fixed; width: 200; top:708; left:15;">xxx</div>
<div style="position: fixed; width: 160; top:755; left:45;">xxx</div>

<!-- SD AT Staff (Sign) -->
<div style="position: fixed; width: 50; height:50; top:620; left:205;">xxx</div>
<div style="position: fixed; width: 50; font-size: 12px; top:655; left:205;">xxx</div>

<!-- SD AT Head (Sign) -->
<div style="position: fixed; width: 200; height:80; top:620; left:255;">xxx</div>
<div style="position: fixed; width: 200; top:708; left:255;">xxx</div>
<div style="position: fixed; width: 160; top:755; left:285;">xxx</div>

<!-- SD Financial (Sign) -->
<div style="position: fixed; width: 200; height:80; top:620; left:490;">xxx</div>
<div style="position: fixed; width: 200; top:708; left:490;">xxx</div>
<div style="position: fixed; width: 160; top:755; left:520;">xxx</div>

<!-- Auto Sign For SD Director -->
<div style="position: fixed; width: 200; height:80; top:792; left:15;">xxx</div>
<div style="position: fixed; width: 200; top:875; left:17;">xxx</div>
<div style="position: fixed; width: 160; top:922; left:47;">xxx</div>

<?php
$GETURL = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>

<!-- QR Code -->
<div style="position: fixed; width: 220; top:790; left:482;">
    <barcode code="<?= $GETURL ?>" type="QR" size="1" error="M" disableborder="1" /><br>
    <small style="font-size: 16px;"><?= $_GET["id"] ?></small><br>
    <small style="font-size: 14px;">IP: <?= getUserIP() ?></small><br>
    <small style="font-size: 14px;">TimeStamp: <?= $currDate . " " . $currTime ?></small>
</div>