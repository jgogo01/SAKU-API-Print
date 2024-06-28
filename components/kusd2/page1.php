<div style="position: fixed; top: 38; left: 130; width: 560;"><?= $rowOg["orgnameth"] ?></div>
<div style="position: fixed; top: 164; left: 80; width: 530;"><?= $rowOg["orgnameth"] ?></div>
<div style="position: fixed; top: 186; left: 80; width: 610; height: 50;"><?= $rowPj["project_name_th"] ?></div>
<div style="position: fixed; top: 236; left: 80; width: 610;"><?= dateThai($rowPj['date_start_the_project'], $rowPj['date_end_the_project'], "short") ?></div>
<div style="position: fixed; top: 260; left: 20; width: 670;"><?= $rowPj['project_location'] ?></div>
<div style="position: fixed; top: 284; left: 200; width: 220;"><?= number_format($rowPj['project_bugdet_require'], 2) ?></div>
<div style="position: fixed; top: 306; left: 270; width: 250;"><?= number_format($rowPjExp['total_expenses'], 2) ?></div>
<div style="position: fixed; top: 331; left: 50; width: 150;"><?= number_format($rowPjExp['remaining_budget_to_return'], 2) ?></div>
<div style="position: fixed; top: 331; left: 435; width: 60;"><?= $rowPjExp['payment_evidence_count'] ?></div>

<!-- Head of Project (Sign) -->
<div style="position: fixed; width: 200; height:80; top:370; left:15;"><?= isset($headOfPj) ? "<img src=\"$sign_headOfPj\">" : "" ?></div>
<div style="position: fixed; width: 200; top:453; left:15;"><?= isset($headOfPj["name"]) ? $headOfPj["name"] : "" ?></div>
<div style="position: fixed; width: 150; top:503; left:50;"><?= isset($headOfPj["createdAt"]) ? dateThai($headOfPj["createdAt"], $headOfPj["createdAt"], "full") : "" ?></div>

<!-- Head of Organization (Sign) -->
<div style="position: fixed; width: 200; height:80; top:370; left:250;"><?= isset($headOfOg) ? "<img src=\"$sign_headOfOg\">" : "" ?></div>
<div style="position: fixed; width: 200; top:453; left:250;"><?= isset($headOfOg["name"]) ? $headOfOg["name"] : "" ?></div>
<div style="position: fixed; width: 160; top:503; left:285;"><?= isset($headOfOg["createdAt"]) ? dateThai($headOfOg["createdAt"], $headOfOg["createdAt"], "full") : "" ?></div>

<!-- Head of Project (Advisor) -->
<div style="position: fixed; width: 200; height:80; top:370; left:485;"><?= isset($advisorOg) ? "<img src=\"$sign_advisor\">" : "" ?></div>
<div style="position: fixed; width: 200; top:453; left:485;"><?= isset($advisorOg["name"]) ? $advisorOg["name"] : "" ?></div>
<div style="position: fixed; width: 160; top:503; left:520;"><?= isset($advisorOg["createdAt"]) ? dateThai($advisorOg["createdAt"], $advisorOg["createdAt"], "full") : "" ?></div>

<!-- SAB Head (Sign) -->
<div style="position: fixed; width: 200; height:80; top:620; left:15;"><?= isset($sabHead) ? "<img src=\"$sign_sabHead\">" : "" ?></div>
<div style="position: fixed; width: 200; top:708; left:15;"><?= isset($sabHead["name"]) ? $sabHead["name"] : "" ?></div>
<div style="position: fixed; width: 160; top:755; left:45;"><?= isset($sabHead["createdAt"]) ? dateThai($sabHead["createdAt"], $sabHead["createdAt"], "full") : "" ?></div>

<!-- SD AT Staff (Sign) -->
<div style="position: fixed; width: 50; height:50; top:620; left:205;"><?= isset($sdStaff) ? "<img src=\"$sign_sdStaff\">" : "" ?></div>
<div style="position: fixed; width: 50; font-size: 12px; top:655; left:205;"><?= isset($sdStaff["createdAt"]) ? dateThai($sdStaff["createdAt"], $sdStaff["createdAt"], "short") : "" ?></div>

<!-- SD AT Head (Sign) -->
<div style="position: fixed; width: 200; height:80; top:620; left:255;"><?= isset($sdHead) ? "<img src=\"$sign_sdHead\">" : "" ?></div>
<div style="position: fixed; width: 200; top:708; left:255;"><?= isset($sdHead["name"]) ? $sdHead["name"] : "" ?></div>
<div style="position: fixed; width: 160; top:755; left:285;"><?= isset($sdHead["createdAt"]) ? dateThai($sdHead["createdAt"], $sdHead["createdAt"], "full") : "" ?></div>

<!-- SD Financial (Sign) -->
<div style="position: fixed; width: 200; height:80; top:620; left:490;"><?= isset($sdFinancial) ? "<img src=\"$sign_sdFinancial\">" : "" ?></div>
<div style="position: fixed; width: 200; top:708; left:490;"><?= isset($sdFinancial["name"]) ? $sdFinancial["name"] : "" ?></div>
<div style="position: fixed; width: 160; top:755; left:520;"><?= isset($sdFinancial["createdAt"]) ? dateThai($sdFinancial["createdAt"], $sdFinancial["createdAt"], "full") : "" ?></div>

<!-- Auto Sign For SD Director -->
<div style="position: fixed; width: 200; height:80; top:792; left:15;"><?= isset($sdFinancial) ? "<img src=\"$sign_sdDirector\">" : "" ?></div>
<div style="position: fixed; width: 200; top:875; left:17;">นายวิชาญ วงษ์สังข์</div>
<div style="position: fixed; width: 160; top:922; left:47;"><?= isset($sdFinancial["createdAt"]) ? dateThai($sdFinancial["createdAt"], $sdFinancial["createdAt"], "full") : "" ?></div>

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