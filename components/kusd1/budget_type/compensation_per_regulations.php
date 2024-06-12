<?php
if (checkDatainArrary($compensation_per_regulations)) {
?>
    <br>
    <h2 style="padding: 0; margin:0;">ค่าตอบแทน (ตามระเบียบเบิกจ่าย)</h2>
    <small>เช่น ค่าสนับสนุนชมรมกิจกรรมนิสิต ค่าตอบแทนกรรมการตัดสิน ค่าตอบแทน/ค่าสมนาคุณการปฏิบัติงาน ฯลฯ<br>
        คำอธิบาย:<br>
        กรณีที่ 1 ค่าสนับสนุนชมรมกิจกรรมนิสิต,ค่าตอบแทนกรรมการตัดสิน<br>
        &nbsp;&nbsp;&nbsp;&nbsp;- ต้องมีหนังสือเชิญ<br>
        &nbsp;&nbsp;&nbsp;&nbsp;- ต้องมีหนังสือขออนุมัติหลักการจ่ายเงินสด<br>
        กรณีที่ 2 ค่าตอบแทน/ค่าสมนาคุณการปฏิบัติงาน<br>
        &nbsp;&nbsp;&nbsp;&nbsp;- ต้องมีหนังสือขอความอนุเคราะห์ ส่งถึงหน่วยงานที่ขอใช้สถานที่/ขอใช้บริการ แล้วให้หน่วยงานตอบรับกลับ
    </small>

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
            $totalCPR = 0;
            $i = 0;
            foreach ($compensation_per_regulations as $CPR) {
                $totalCPR += $compensation_per_regulations[$i]["amount"];
                $i++;
            }
            //Loop For Show
            $j = 0;
            foreach ($compensation_per_regulations as $CPR) {
            ?>
                <tr>
                    <td><?= $j + 1 ?></td>
                    <td><?= $compensation_per_regulations[$j]["label"] ?></td>
                    <td style="text-align: right"><?= number_format($compensation_per_regulations[$j]["amount"], 2) ?></td>
                </tr>
            <?php $j++;
            } ?>
            <tr style="background-color:#f5fcf0;">
                <td colspan="2" style="text-align: center"><b>รวม</b></td>
                <td style="text-align: right"><?= number_format($totalCPR, 2) ?></td>
            </tr>
        </tbody>
    </table>
    <br>
<?php
}
?>