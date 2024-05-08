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
        <?= $rowPj['principles_and_reasoning'] ?>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </p>

    <br>

    <div style="text-align:start;"><b>วัตถุประสงค์ของโครงการ</b></div>
    <p style="text-align:start;">
    <ol>
        <?php foreach ($objPj as $obj) { ?>
            <li><?= $obj ?></li>
        <?php } ?>
    </ol>
    </p>
    <?php
    $number_of_project_participants = json_decode($rowPj['number_of_project_participants'], true);
    ?>
    <div style="text-align:start;">
        <b>จำนวนผู้เข้าร่วมโครงการ</b>&nbsp;&nbsp;
        <b>คณะทำงาน</b>
        &nbsp;&nbsp;<span class="underline">&nbsp;&nbsp; <?= isset($number_of_project_participants["coreteam"]) ? $number_of_project_participants["coreteam"] : "" ?> &nbsp;&nbsp;</span>
        <b>ผู้เข้าร่วม(นิสิต)</b>
        &nbsp;&nbsp;<span class="underline">&nbsp;&nbsp; <?= isset($number_of_project_participants["student"]) ? $number_of_project_participants["student"] : "" ?> &nbsp;&nbsp;</span>
        <b>บุคคลทั่วไป(ถ้ามี)</b>
        &nbsp;&nbsp;<span class="underline">&nbsp;&nbsp; <?= isset($number_of_project_participants["guest"]) ? $number_of_project_participants["guest"] : "" ?> &nbsp;&nbsp;</span>
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
            <li><?= $act ?></li>
        <?php } ?>
    </ol>
    </p>
    <div style="page-break-before:always;"></div>
    <div style="text-align:start;"><b>ดัชนีชี้วันความสำเร็จของโครงการ</b></div>
    <table width="100%" border="1" style="border-collapse: collapse;">
        <thead>
            <tr>
                <th rowspan="2" colspan="2">ดัชนีชี้วันความสำเร็จ การดำเนินงานภาพรวม</th>
                <th colspan="3">ผลการดำเนินงาน</th>
            </tr>
            <tr>
                <th>คณะทำงาน</th>
                <th>ผู้เข้าร่วม<br>(นิสิต)</th>
                <th>บุคคลทั่วไป<br>(ถ้ามี)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1.</td>
                <td>
                    จำนวนผู้เข้าร่วมโครงการไม่น้อยกว่า ร้อยละ
                    <span class="underline">&nbsp;&nbsp;<?= $rowPj['percentage_of_project_participants'] ?>&nbsp;&nbsp;</span><br>
                    ของเป้าหมายที่วางไว้ (จำนวน<span class="underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>คน)
                </td>
                <td style="font-size: 14pt">
                    จำนวน<span class="underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>คน<br>
                    ร้อยละ<span class="underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br>
                    [ ] บรรลุ<br>
                    [ ] ไม่บรรลุ
                </td>
                <td style="font-size: 14pt">
                    จำนวน<span class="underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>คน<br>
                    ร้อยละ<span class="underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br>
                    [ ] บรรลุ<br>
                    [ ] ไม่บรรลุ
                </td>
                <td style="font-size: 14pt">
                    จำนวน<span class="underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>คน<br>
                    ร้อยละ<span class="underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br>
                    [ ] บรรลุ<br>
                    [ ] ไม่บรรลุ
                </td>
            </tr>
            <tr>
                <td>2.</td>
                <td>
                    มีค่าเฉลี่ยความพึงพอใจ ไม่น้อยกว่า <span class="underline">4.00</span><br>
                    จากคะแนนเต็ม 5
                </td>
                <td style="font-size: 14pt">
                    ค่าเฉลี่ย<span class="underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br>
                    [ ] บรรลุ<br>
                    [ ] ไม่บรรลุ
                </td>
                <td style="font-size: 14pt">
                    ค่าเฉลี่ย<span class="underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br>
                    [ ] บรรลุ<br>
                    [ ] ไม่บรรลุ
                </td>
                <td style="font-size: 14pt">
                    ค่าเฉลี่ย<span class="underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br>
                    [ ] บรรลุ<br>
                    [ ] ไม่บรรลุ
                </td>
            </tr>
        </tbody>
    </table>

    <div style="text-align:start;"><b>เป้าความสำเร็จของโครงการ (Expected Outcome)</b></div>
    <p style="text-align:start;">
    <ol>
        <?php foreach ($expected_outcome as $epc) { ?>
            <li><?= $epc ?></li>
        <?php } ?>
    </ol>
    </p>