<?php
if (checkDatainArrary($budgetCheck["speaker_honorarium"])) {
?>
    <br>
    <h2 style="padding: 0; margin:0;">ค่าสมนาคุณวิทยากร (อัตราไม่เกิน 1,000 บาท/คน/ชม.)</h2>
    <small>คำอธิบาย: ต้องมีหนังสือเชิญเป็นวิทยากรที่ออกโดยมหาวิทยาลัยเพื่อประกอบการเบิกจ่าย</small>
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
                    <td style="text-align: right"><?= number_format($speaker->hour, 2) ?></td>
                </tr>
            <?php $i++;
            } ?>
            <tr style="background-color:#f5fcf0;">
                <td colspan="2" style="text-align: center"><b>รวม</b></td>
                <td style="text-align: right"><?= number_format($totalSpeaker, 2) ?></td>
            </tr>
        </tbody>
    </table>
    <br>
<?php
}
?>