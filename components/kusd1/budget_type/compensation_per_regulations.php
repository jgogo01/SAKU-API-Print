<?php
if (checkDatainArrary($compensation_per_regulations)) {
?>
    <h2 style="padding: 0; margin:0;">ค่าตอบแทน (ตามระเบียบเบิกจ่าย)</h2>

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
            }
            //Loop For Show
            $i = 0;
            foreach ($compensation_per_regulations as $CPR) {
            ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= $compensation_per_regulations[$i]["label"] ?></td>
                    <td style="text-align: right"><?= number_format($compensation_per_regulations[$i]["amount"], 2) ?></td>
                </tr>
            <?php $i++;
            } ?>
        </tbody>
    </table>
    <h3 style="text-align: right">รวม <?= number_format($totalCPR, 2) ?> บาท</h3>
<?php
}
?>