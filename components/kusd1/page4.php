<!-- <div style="page-break-before:always;"></div> -->

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
                ของเป้าหมายที่วางไว้ (จำนวน<span class="underline">&nbsp;&nbsp;&nbsp; <?= $rowPj["target_set"] ?>&nbsp;&nbsp;&nbsp;</span>คน)
            </td>
            <td style="font-size: 14pt">
                จำนวน<span class="underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>คน<br>
                ร้อยละ<span class="underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br>
                <input type="checkbox" /> บรรลุ<br>
                <input type="checkbox" /> ไม่บรรลุ
            </td>
            <td style="font-size: 14pt">
                จำนวน<span class="underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>คน<br>
                ร้อยละ<span class="underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br>
                <input type="checkbox" /> บรรลุ<br>
                <input type="checkbox" /> ไม่บรรลุ
            </td>
            <td style="font-size: 14pt">
                จำนวน<span class="underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>คน<br>
                ร้อยละ<span class="underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br>
                <input type="checkbox" /> บรรลุ<br>
                <input type="checkbox" /> ไม่บรรลุ
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
                <input type="checkbox" /> บรรลุ<br>
                <input type="checkbox" /> ไม่บรรลุ
            </td>
            <td style="font-size: 14pt">
                ค่าเฉลี่ย<span class="underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br>
                <input type="checkbox" /> บรรลุ<br>
                <input type="checkbox" /> ไม่บรรลุ
            </td>
            <td style="font-size: 14pt">
                ค่าเฉลี่ย<span class="underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br>
                <input type="checkbox" /> บรรลุ<br>
                <input type="checkbox" /> ไม่บรรลุ
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