<?php
if (checkDatainArrary($budgetCheck["accommodation_costs"])) {
?>
    <h2 style="padding: 0; margin:0;">ค่าที่พัก (จำนวนเงินไม่เกิน 300 บาท/คน/คืน)</h2>
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
            $totalAccommodation = 0;
            foreach ($budget_use->accommodation_costs as $accommodation) {
                $totalAccommodation += $accommodation->cost_per_night * $accommodation->number_of_nights * $accommodation->number_of_people;
            }
            //Loop For Show
            $i = 1;
            foreach ($budget_use->accommodation_costs as $accommodation) {
            ?>
                <tr>
                    <td><?= $i ?></td>
                    <td>สถานที่พัก @ <?= $accommodation->at ?> จำนวน <?= $accommodation->number_of_nights ?> คืน
                        <br>(คืนละ <?= $accommodation->cost_per_night ?> บาท) ทั้งหมด <?= $accommodation->number_of_people ?> คน
                    </td>
                    <td style="text-align: right"><?= number_format($accommodation->cost_per_night * $accommodation->number_of_nights * $accommodation->number_of_people, 2) ?></td>
                </tr>
            <?php $i++;
            } ?>
            <tr style="background-color:#f5fcf0;">
                <td colspan="2" style="text-align: center"><b>รวม</b></td>
                <td style="text-align: right"><?= number_format($totalAccommodation, 2) ?></td>
            </tr>
        </tbody>
    </table>
    <br>
<?php
}
?>