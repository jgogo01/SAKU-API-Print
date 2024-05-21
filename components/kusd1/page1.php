    <!-- Head Number Page -->
    <div style="position: fixed; width: 550; top:30; left:150;"><?= $rowOg['orgnameth'] ?></div>
    <div style="position: fixed; width: 290; top:52; left:95;"><?= $rowPj['book_issue'] ?></div>
    <div style="position: fixed; width: 50; top:52; left:412;"><?= dateThai($rowPj['date_issuing_books'], $rowPj['date_issuing_books'], "day") ?></div>
    <div style="position: fixed; width: 100; top:52; left:495;"><?= dateThai($rowPj['date_issuing_books'], $rowPj['date_issuing_books'], "month") ?></div>
    <div style="position: fixed; width: 80; top:52; left:620;"><?= dateThai($rowPj['date_issuing_books'], $rowPj['date_issuing_books'], "year") ?></div>

    <!-- Detail Project -->
    <div style="position: fixed; width: 450; top:158; left:130;"><?= $rowOg['orgnameth'] ?></div>
    <div style="line-height: 1.1; position: fixed; width: 620; height: 50; top:182; left:70;"><?= $rowPj['project_name_th'] ?></div>
    <div style="position: fixed; width: 250; top:225; left:60;"><?= dateThai($rowPj['date_start_the_project'], $rowPj['date_end_the_project'], "short") ?></div>
    <div style="position: fixed; width: 350; top:225; left:335;">ณ <?= $rowPj['project_location'] ?></div>
    <div style="position: fixed; width: 150; top:248; left:105;"><?= number_format($rowPj['project_bugdet_require']) ?></div>
    <div style="position: fixed; width: 390; top:248; left:300;"><?= baht_text($rowPj['project_bugdet_require']) ?></div>

    <div style="position: fixed; width: 315; top:298; left:85;"><?= $stakeholderTreasurer->name ?></div>
    <div style="position: fixed; width: 315; top:320; left:85;"><?= isset($headOfOg) ? $headOfOg["name"] : "" ?></div>
    <div style="position: fixed; width: 315; top:343; left:85;"><?= isset($advisorOg) ? $advisorOg["name"] : "" ?></div>

    <!-- Borrower -->
    <div style="position: fixed; width: 270; top:396; left:70;"><?= $borrower["name"] ?></div>
    <div style="position: fixed; width: 120; top:396; left:397;"><?= $borrower["idCode"] ?></div>
    <div style="position: fixed; width: 140; top:396; left:550;"><?= $facultyBorrower["name"] ?></div>
    <div style="position: fixed; width: 150; top:416; left:120;">ประธานโครงการ</div>

    <!-- Head of Organization (Sign) -->
    <div style="position: fixed; width: 200; height:50; top:500; left:28;"><?= isset($headOfOg) ? "<img src=\"data:image/png;base64, " . base64_encode($sign_headOfOg["Body"]) . "\">" : "" ?></div>
    <div style="position: fixed; width: 200; top:558; left:28;"><?= isset($headOfOg["name"]) ? $headOfOg["name"] : "" ?></div>
    <div style="position: fixed; width: 140; top:603; left:70;"><?= isset($headOfOg["createdAt"]) ? dateThai($headOfOg["createdAt"], $headOfOg["createdAt"], "full") : "" ?></div>

    <!-- Head of Project (Sign) -->
    <div style="position: fixed; width: 200; height:50; top:500; left:260;"><?= isset($headOfPj) ? "<img src=\"data:image/png;base64, " . base64_encode($sign_headOfPj["Body"]) . "\">" : "" ?></div>
    <div style="position: fixed; width: 200; top:558; left:260;"><?= isset($headOfPj["name"]) ? $headOfPj["name"] : "" ?></div>
    <div style="position: fixed; width: 150; top:603; left:300;"><?= isset($headOfPj["createdAt"]) ? dateThai($headOfPj["createdAt"], $headOfPj["createdAt"], "full") : "" ?></div>

    <!-- Head of Project (Advisor) -->
    <div style="position: fixed; width: 190; height:50; top:500; left:500;"><?= isset($advisorOg) ? "<img src=\"data:image/png;base64, " . base64_encode($sign_advisor["Body"]) . "\">" : "" ?></div>
    <div style="position: fixed; width: 190; top:558; left:500;"><?= isset($advisorOg["name"]) ? $advisorOg["name"] : "" ?></div>
    <div style="position: fixed; width: 150; top:603; left:530;"><?= isset($advisorOg["createdAt"]) ? dateThai($advisorOg["createdAt"], $advisorOg["createdAt"], "full") : "" ?></div>

    <!-- SAB Head (Sign) -->
    <div style="position: fixed; width: 175; height:60; top:705; left:40;"><?= isset($sabHead) ? "<img src=\"data:image/png;base64, " . base64_encode($sign_sabHead["Body"]) . "\">" : "" ?></div>
    <div style="position: fixed; width: 175; top:767; left:40;"><?= isset($sabHead["name"]) ? $sabHead["name"] : "" ?></div>
    <div style="position: fixed; width: 160; top:813; left:60;"><?= isset($sabHead["createdAt"]) ? dateThai($sabHead["createdAt"], $sabHead["createdAt"], "full") : "" ?></div>

    <!-- SD AT Staff (Sign) -->
    <div style="position: fixed; width: 50; height:50; top:705; left:220;"><?= isset($sdStaff) ? "<img src=\"data:image/png;base64, " . base64_encode($sign_sdStaff["Body"]) . "\">" : "" ?></div>
    <div style="position: fixed; width: 50; font-size: 12px; top:740; left:218;"><?= isset($sdStaff["createdAt"]) ? dateThai($sdStaff["createdAt"], $sdStaff["createdAt"], "short") : "" ?></div>

    <!-- SD AT Head (Sign) -->
    <div style="position: fixed; width: 175; height:60; top:705; left:270;"><?= isset($sdHead) ? "<img src=\"data:image/png;base64, " . base64_encode($sign_sdHead["Body"]) . "\">" : "" ?></div>
    <div style="position: fixed; width: 175; top:767; left:270;"><?= isset($sdHead["name"]) ? $sdHead["name"] : "" ?></div>
    <div style="position: fixed; width: 160; top:813; left:290;"><?= isset($sdHead["createdAt"]) ? dateThai($sdHead["createdAt"], $sdHead["createdAt"], "full") : "" ?></div>

    <!-- SD Financial (Sign) -->
    <div style="position: fixed; width: 180; height:60; top:705; left:500;"><?= isset($sdFinancial) ? "<img src=\"data:image/png;base64, " . base64_encode($sign_sdFinancial["Body"]) . "\">" : "" ?></div>
    <div style="position: fixed; width: 180; top:767; left:500;"><?= isset($sdFinancial["name"]) ? $sdFinancial["name"] : "" ?></div>
    <div style="position: fixed; width: 160; top:813; left:520;"><?= isset($sdFinancial["createdAt"]) ? dateThai($sdFinancial["createdAt"], $sdFinancial["createdAt"], "full") : "" ?></div>

    <!-- Auto Sign For SD Director -->
    <div style="position: fixed; width: 175; height:50; top:910; left:40;"><?= isset($sdFinancial) ? "<img src=\"data:image/png;base64, " . base64_encode($sign_sdDirector["Body"]) . "\">" : "" ?></div>
    <div style="position: fixed; width: 175; top:966; left:40;">นายวิชาญ วงษ์สังข์</div>
    <div style="position: fixed; width: 160; top:1011; left:60;"><?= isset($sdFinancial["createdAt"]) ? dateThai($sdFinancial["createdAt"], $sdFinancial["createdAt"], "full") : "" ?></div>

    <!-- Auto Sign For KU Vice Director -->
    <div style="position: fixed; width: 175; height:90; top:870; left:270;"><?= isset($sdFinancial) ? "<img src=\"data:image/png;base64, " . base64_encode($sign_kuViceDirector["Body"]) . "\">" : "" ?></div>
    <div style="position: fixed; width: 175; top:966; left:270;">ผศ.รัชด ชมภูนิช</div>
    <div style="position: fixed; width: 160; top:1005; left:290;"><?= isset($sdFinancial["createdAt"]) ? dateThai($sdFinancial["createdAt"], $sdFinancial["createdAt"], "full") : "" ?></div>


    <?php
    $GETURL = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    ?>

    <!-- QR Code -->
    <div style="position: fixed; width: 220; top:847; left:482;">
        <b>ตรวจสอบได้ที่</b><br>
        <barcode code="<?= $GETURL ?>" type="QR" size="1" error="M" disableborder="1" /><br>
        <small style="font-size: 16px;"><?= $_GET["id"] ?></small><br>
        <small style="font-size: 14px;">IP: <?= getUserIP() ?></small><br>
        <small style="font-size: 14px;">TimeStamp: <?= date('Y-m-d H:i:s') ?></small>
    </div>