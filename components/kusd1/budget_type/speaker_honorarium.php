<?php
if (checkDatainArrary($budgetCheck["speaker_honorarium"])) {
?>
    <h2 style="padding: 0; margin:0;">ค่าสมนาคุณวิทยากร (อัตราไม่เกิน 1,000 บาท/คน/ชม.)</h2>

    <table width="100%" border="1" style="border-collapse: collapse;">
        <thead>
            <tr style="background-color: #eaffd9;">
                <th width="5%"><b>ที่</b></th>
                <th width="65%"><b>รายการ</b></th>
                <th width="15%"><b>จำนวน</b></th>
            </tr>
        </thead>
        <tbody>
        <?php
            //Loop For Sum Budget Use
            $totalSpeaker = 0;
            foreach ($budget_use->speaker_honorarium as $speaker) {
                $totalSpeaker += $speaker->hour;
            }
            //Loop For Show
            $i = 1;
            foreach ($budget_use->speaker_honorarium as $speaker) {
            ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $speaker->detail ?> จำนวน <?= $speaker->perhour ?> ชั่วโมง</td>
                    <td style="text-align: right"><?= number_format($speaker->hour) ?></td>
                </tr>
            <?php $i++;
            } ?>
        </tbody>
    </table>
    <h3 style="text-align: right">รวม <?= number_format($totalSpeaker) ?> บาท</h3>
<?php
}
?>