<?php
if (checkDatainArrary($budgetCheck["materials_costs"])) {
?>
    <br>
    <h2 style="padding: 0; margin:0;">ค่าวัสดุ</h2>
    <small>คำอธิบาย: หากซื้อสินค้าจากร้านเดียวกันตั้งแต่ 10,000 บาท ขึ้นไป ต้องนำใบเสนอราคาจากร้านค้า ส่งให้งานกิจกรรมนิสิต ทำเรื่องขออนุมัติจัดซื้อต่อไป</small>
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
            $totalMaterial = 0;
            foreach ($budget_use->materials_costs as $material) {
                $totalMaterial += $material->amount;
            }
            //Loop For Show
            $i = 1;
            foreach ($budget_use->materials_costs as $material) {
            ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $material->label ?></td>
                    <td style="text-align: right"><?= number_format($material->amount, 2) ?></td>
                </tr>
            <?php $i++;
            } ?>
            <tr style="background-color:#f5fcf0;">
                <td colspan="2" style="text-align: center"><b>รวม</b></td>
                <td style="text-align: right"><?= number_format($totalMaterial, 2) ?></td>
            </tr>
        </tbody>
    </table>
    <br>
<?php
}
?>