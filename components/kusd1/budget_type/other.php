<?php
if (checkDatainArrary($budgetCheck["other_expenses"])) {
?>
    <h2 style="padding: 0; margin:0;">ค่าใช้สอยและค่าใช้จ่ายอื่น ๆ</h2>
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
            $totalOther = 0;
            foreach ($budget_use->other_expenses as $other) {
                $totalOther += $other->amount;
            }
            //Loop For Show
            $i = 1;
            foreach ($budget_use->other_expenses as $other) {
            ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $other->label ?></td>
                    <td style="text-align: right"><?= number_format($other->amount, 2) ?></td>
                </tr>
            <?php $i++;
            } ?>
            <tr style="background-color:#f5fcf0;">
                <td colspan="2" style="text-align: center"><b>รวม</b></td>
                <td style="text-align: right"><?= number_format($totalOther, 2) ?></td>
            </tr>
        </tbody>
    </table>
    <br>
<?php
}
?>