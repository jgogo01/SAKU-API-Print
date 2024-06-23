<h3>งบประมาณในการดำเนินโครงการ
    <span class="underline">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </span>
</h3>

<p>๑. จำนวนเงินที่ได้รับอนุมัติ
    <span class="underline">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </span>
    บาท
</p>
<p>๒. จำนวนที่ใช้จ่ายไปทั้งสิ้น
    <span class="underline">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </span>
    บาท
</p>
<p>๓. จำนวนเงินเหลือจ่ายเพื่อส่งคืน
    <span class="underline">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </span>
    บาท
</p>
<p>๔. หลักฐานการจ่ายเงินจำนวน
    <span class="underline">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </span>
    บาท
</p>

<br>
<small>
    หมายเหตุ : - ค่าตอบแทน ได้แก่ ค่าตอบแทนวิทยากร ค่าตอบแทนพนักงานขับรถ<br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    - ค่าวัสดุ ได้แก่ ค่าอาหาร ค่าน้ำมันเชื้อเพลิง ค่าวัสดุสำนักงาน ค่าวัสดุก่อสร้าง ค่าโฆษณาและเผยแพร่<br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    - ค่าใช้สอย ได้แก่ ค่าซ่อมแซม ค่าบำรุงต่าง ๆ ค่าเช่าต่าง ๆ ค่าเบี้ยเลี้ยง ค่าที่พัก ค่ายานพาหนะ และค่าจ้างเหมาจ่าย
</small>

<h2>มีรายละเอียดค่าใช้จ่าย ดังนี้</h2>
<table width="100%" border="1" style="border-collapse: collapse;">
    <thead style="text-align: center;">
        <tr>
            <td width="10%">ลำดับ</td>
            <td width="50%">รายการ</td>
            <td width="10%">ค่าตอบแทน</td>
            <td width="10%">ค่าใช้สอย</td>
            <td width="10%">ค่าวัสดุ</td>
            <td width="10%">ค่าครุภัณฑ์</td>
        </tr>
    </thead>
    <tbody>
        <?php
        $totalCompensation = 0; // ค่าตอบแทน
        $totalExpense = 0; // ค่าใช้จ่าย
        $totalMaterial = 0; // ค่าวัสดุ
        $totalEquipment = 0; // ค่าครุภัณฑ์
        $jsonExpense = json_decode($rowPjExp['expense_details']);
        for ($i = 0; $i < count($jsonExpense); $i++) {
        ?>
            <tr>
                <td style="text-align: center;"><?php echo $i + 1; ?></td>
                <td><?= $jsonExpense[$i]->name ?></td>
                <?php
                switch ($jsonExpense[$i]->expense_type) {
                    case "compensation":
                        $totalCompensation += $jsonExpense[$i]->amount;
                        echo "<td style='text-align: right;'>" . number_format($jsonExpense[$i]->amount, 2) . "</td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        break;
                    case "operating_expenses":
                        $totalExpense += $jsonExpense[$i]->amount;
                        echo "<td></td>";
                        echo "<td style='text-align: right;'>" . number_format($jsonExpense[$i]->amount, 2) . "</td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        break;
                    case "material_costs":
                        $totalMaterial += $jsonExpense[$i]->amount;
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td style='text-align: right;'>" . number_format($jsonExpense[$i]->amount, 2) . "</td>";
                        echo "<td></td>";
                        break;
                    case "equipment_costs":
                        $totalEquipment += $jsonExpense[$i]->amount;
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td style='text-align: right;'>" . number_format($jsonExpense[$i]->amount, 2) . "</td>";
                        break;
                }
                ?>
            </tr>
        <?php } ?>
        <tr>
            <td colspan="2" style="text-align: center;">รวม</td>
            <td style="text-align: right;"><?= number_format($totalCompensation, 2) ?></td>
            <td style="text-align: right;"><?= number_format($totalExpense, 2) ?></td>
            <td style="text-align: right;"><?= number_format($totalMaterial, 2) ?></td>
            <td style="text-align: right;"><?= number_format($totalEquipment, 2) ?></td>
        </tr>
    </tbody>
</table>

<br>
<p>
    รวมเป็นเงินทั้งสิ้น
    <span class="underline">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </span>
    บาท
    (
    <span class="underline">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </span>
    )
</p>

<p>
    ขอเบิกจ่ายเพียง
    <span class="underline">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;
    </span>
    บาท
    (
    <span class="underline">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </span>
    )
</p>