    <!-- Head Number Page -->
    <div style="position: fixed; width: 550; top:20; left:150;"><?= $rowOg['orgnameth'] ?></div>
    <div style="position: fixed; width: 200; top:45; left:95;"><?= $rowPj['book_issue'] ?></div>
    <div style="position: fixed; width: 50; top:45; left:320;"><?= dateThai($rowPj['date_issuing_books'], $rowPj['date_issuing_books'], "day") ?></div>
    <div style="position: fixed; width: 150; top:45; left:410;"><?= dateThai($rowPj['date_issuing_books'], $rowPj['date_issuing_books'], "month") ?></div>
    <div style="position: fixed; width: 120; top:45; left:580;"><?= dateThai($rowPj['date_issuing_books'], $rowPj['date_issuing_books'], "year") ?></div>

    <!-- Detail Project -->
    <div style="position: fixed; width: 380; top:155; left:200;"><?= $rowOg['orgnameth'] ?></div>
    <div style="position: fixed; width: 620; top:180; left:70;"><?= $rowPj['project_name_th'] ?></div>
    <div style="position: fixed; width: 250; top:203; left:60;"><?= dateThai($rowPj['date_start_the_project'], $rowPj['date_end_the_project'], "short") ?></div>
    <div style="position: fixed; width: 360; top:203; left:330;">ณ <?= $rowPj['project_location'] ?></div>
    <div style="position: fixed; width: 170; top:228; left:105;"><?= number_format($rowPj['project_bugdet_require']) ?></div>
    <div style="position: fixed; width: 350; top:228; left:310;"><?= baht_text($rowPj['project_bugdet_require']) ?></div>

    <div style="position: fixed; width: 275; top:275; left:80;"><?= $stakeholderTreasurer->name ?></div>
    <div style="position: fixed; width: 275; top:300; left:80;"><?= isset($headOfOg) ? $headOfOg["name"] : "" ?></div>
    <div style="position: fixed; width: 275; top:325; left:80;"><?= isset($advisorOg) ? $advisorOg["name"] : "" ?></div>

    <!-- Borrower -->
    <div style="position: fixed; width: 190; top:385; left:90;"><?= $borrower["name"] ?></div>
    <div style="position: fixed; width: 150; top:385; left:330;"><?= $borrower["idCode"] ?></div>
    <div style="position: fixed; width: 180; top:385; left:510;"><?= $facultyBorrower["name"] ?></div>
    <div style="position: fixed; width: 170; top:407; left:120;">ประธานโครงการ</div>

    <!-- Head of Organization (Sign) -->
    <div style="position: fixed; width: 190; height:70; top:480; left:30;"><?= isset($headOfOg) ? "<img src=\"data:image/png;base64, " . base64_encode($sign_headOfOg["Body"]) . "\">" : "" ?></div>
    <div style="position: fixed; width: 190; top:552; left:30;"><?= isset($headOfOg["name"]) ? $headOfOg["name"] : "" ?></div>
    <div style="position: fixed; width: 140; top:600; left:70;"><?= isset($headOfOg["createdAt"]) ? dateThai($headOfOg["createdAt"], $headOfOg["createdAt"], "full") : "" ?></div>

    <!-- Head of Project (Sign) -->
    <div style="position: fixed; width: 200; height:70; top:480; left:260;"><?= isset($headOfPj) ? "<img src=\"data:image/png;base64, " . base64_encode($sign_headOfPj["Body"]) . "\">" : "" ?></div>
    <div style="position: fixed; width: 200; top:552; left:260;"><?= isset($headOfPj["name"]) ? $headOfPj["name"] : "" ?></div>
    <div style="position: fixed; width: 150; top:600; left:300;"><?= isset($headOfPj["createdAt"]) ? dateThai($headOfPj["createdAt"], $headOfPj["createdAt"], "full") : "" ?></div>

    <!-- Head of Project (Advisor) -->
    <div style="position: fixed; width: 190; height:70; top:480; left:500;"><?= isset($advisorOg) ? "<img src=\"data:image/png;base64, " . base64_encode($sign_advisor["Body"]) . "\">" : "" ?></div>
    <div style="position: fixed; width: 190; top:552; left:500;"><?= isset($advisorOg["name"]) ? $advisorOg["name"] : "" ?></div>
    <div style="position: fixed; width: 150; top:600; left:530;"><?= isset($advisorOg["createdAt"]) ? dateThai($advisorOg["createdAt"], $advisorOg["createdAt"], "full") : "" ?></div>

    <!-- SAB Head (Sign) -->
    <div style="position: fixed; width: 175; height:50; top:705; left:40;"><?= isset($sabHead) ? "<img src=\"data:image/png;base64, " . base64_encode($sign_sabHead["Body"]) . "\">" : "" ?></div>
    <div style="position: fixed; width: 175; top:752; left:40;"><?= isset($sabHead["name"]) ? $sabHead["name"] : "" ?></div>
    <div style="position: fixed; width: 160; top:800; left:60;"><?= isset($sabHead["createdAt"]) ? dateThai($sabHead["createdAt"], $sabHead["createdAt"], "full") : "" ?></div>

    <!-- SD AT Staff (Sign) -->
    <div style="position: fixed; width: 50; height:50; top:705; left:220;"><?= isset($sdStaff) ? "<img src=\"data:image/png;base64, " . base64_encode($sign_sdStaff["Body"]) . "\">" : "" ?></div>
    <div style="position: fixed; width: 50; font-size: 12px; top:740; left:218;"><?= isset($sdStaff["createdAt"]) ? dateThai($sdStaff["createdAt"], $sdStaff["createdAt"], "short") : "" ?></div>

    <!-- SD AT Head (Sign) -->
    <div style="position: fixed; width: 175; height:50; top:705; left:270;"><?= isset($sdHead) ? "<img src=\"data:image/png;base64, " . base64_encode($sign_sdHead["Body"]) . "\">" : "" ?></div>
    <div style="position: fixed; width: 160; top:800; left:290;"><?= isset($sdHead["createdAt"]) ? dateThai($sdHead["createdAt"], $sdHead["createdAt"], "full") : "" ?></div>

    <!-- SD Financial (Sign) -->
    <div style="position: fixed; width: 175; height:50; top:705; left:500;"><?= isset($sdFinancial) ? "<img src=\"data:image/png;base64, " . base64_encode($sign_sdFinancial["Body"]) . "\">" : "" ?></div>
    <div style="position: fixed; width: 160; top:800; left:520;"><?= isset($sdFinancial["createdAt"]) ? dateThai($sdFinancial["createdAt"], $sdFinancial["createdAt"], "full") : "" ?></div>

    <!-- Auto Sign For SD Director & KU Vice Director -->
    <div style="position: fixed; width: 175; height:50; top:910; left:40;"><?= isset($sdFinancial) ? "<img src=\"data:image/png;base64, " . base64_encode($sign_sdDirector["Body"]) . "\">" : "" ?></div>
    <div style="position: fixed; width: 160; top:1005; left:60;"><?= isset($sdFinancial["createdAt"]) ? dateThai($sdFinancial["createdAt"], $sdFinancial["createdAt"], "full") : "" ?></div>
    <div style="position: fixed; width: 175; height:90; top:870; left:270;"><?= isset($sdFinancial) ? "<img src=\"data:image/png;base64, " . base64_encode($sign_kuViceDirector["Body"]) . "\">" : "" ?></div>
    <div style="position: fixed; width: 160; top:1005; left:290;"><?= isset($sdFinancial["createdAt"]) ? dateThai($sdFinancial["createdAt"], $sdFinancial["createdAt"], "full") : "" ?></div>

    <?php 
    $GETURL = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    ?>

    <!-- QR Code -->
    <div style="position: fixed; width: 220; top:840; left:482;">
        <b>ตรวจสอบได้ที่</b><br>
        <barcode code="<?= $GETURL ?>" type="QR" size="1" error="M" disableborder = "1"/><br>
        <small style="font-size: 16px;"><?= $_GET["id"] ?></small><br>
        <small style="font-size: 14px;">IP: <?= getUserIP() ?></small><br>
        <small style="font-size: 14px;">TimeStamp: <?= date('Y-m-d H:i:s') ?></small>
    </div>