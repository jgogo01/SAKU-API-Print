<!-- <div style="page-break-before:always;"></div> -->

<table width="100%" border="1" style="border-collapse: collapse;">
    <thead>
        <tr width="40%">
            <th rowspan="2" colspan="2">ดัชนีชี้วันความสำเร็จ การดำเนินงานภาพรวม</th>
            <th colspan="3">ผลการดำเนินงาน</th>
        </tr>
        <tr width="60%">
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
                ของเป้าหมายที่วางไว้
            </td>
            <td style="font-size: 14pt">
                <?php
                $jsonNumberParticipant = json_decode($rowPj['number_of_project_participants']);
                $jsonExpectedParticipant = json_decode($rowPjExp['number_of_participants']);
                $totalParticipant = 0;
                if (isset($jsonExpectedParticipant->S)) {
                    $totalParticipant += $jsonExpectedParticipant->S;
                }
                if (isset($jsonExpectedParticipant->P)) {
                    $totalParticipant += $jsonExpectedParticipant->P;
                }
                if (isset($jsonExpectedParticipant->G)) {
                    $totalParticipant += $jsonExpectedParticipant->G;
                }
                ?>
                จำนวน<span class="underline">&nbsp;&nbsp;&nbsp;<?= isset($jsonNumberParticipant->S) ? $jsonNumberParticipant->S : "0" ?>&nbsp;&nbsp;&nbsp;</span> คน<br>
                ร้อยละ<span class="underline">&nbsp;&nbsp;&nbsp;<?= calculate_percentage_for_display($jsonNumberParticipant->S ,$totalParticipant) ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br>
                <input type="checkbox" checked="checked" /> บรรลุ<br>
                <input type="checkbox" checked="checked" /> ไม่บรรลุ
            </td>
            <td style="font-size: 14pt">
                จำนวน<span class="underline">&nbsp;&nbsp;&nbsp;<?= isset($jsonNumberParticipant->P) ? $jsonNumberParticipant->P : "0" ?>&nbsp;&nbsp;&nbsp;</span> คน<br>
                ร้อยละ<span class="underline">&nbsp;&nbsp;&nbsp;<?= calculate_percentage_for_display($jsonNumberParticipant->P ,$totalParticipant) ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br>
                <input type="checkbox" checked="checked" /> บรรลุ<br>
                <input type="checkbox" checked="checked" /> ไม่บรรลุ
            </td>
            <td style="font-size: 14pt">
                จำนวน<span class="underline">&nbsp;&nbsp;&nbsp;<?= isset($jsonNumberParticipant->G) ? $jsonNumberParticipant->G : "0" ?>&nbsp;&nbsp;&nbsp;</span> คน<br>
                ร้อยละ<span class="underline">&nbsp;&nbsp;&nbsp;<?= calculate_percentage_for_display($jsonNumberParticipant->G ,$totalParticipant) ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br>
                <input type="checkbox" checked="checked" /> บรรลุ<br>
                <input type="checkbox" checked="checked" /> ไม่บรรลุ
            </td>
        </tr>
        <tr>
            <td>2.</td>
            <td>
                มีค่าเฉลี่ยความพึงพอใจ ไม่น้อยกว่า <span class="underline">4.00</span><br>
                จากคะแนนเต็ม 5
            </td>
            <td style="font-size: 14pt">
                ค่าเฉลี่ย<span class="underline">&nbsp;&nbsp;&nbsp;4.09&nbsp;&nbsp;&nbsp;&nbsp;</span><br>
                <input type="checkbox" checked="checked" /> บรรลุ<br>
                <input type="checkbox" checked="checked" /> ไม่บรรลุ
            </td>
            <td style="font-size: 14pt">
                ค่าเฉลี่ย<span class="underline">&nbsp;&nbsp;&nbsp;4.09&nbsp;&nbsp;&nbsp;&nbsp;</span><br>
                <input type="checkbox" checked="checked" /> บรรลุ<br>
                <input type="checkbox" checked="checked" /> ไม่บรรลุ
            </td>
            <td style="font-size: 14pt">
                ค่าเฉลี่ย<span class="underline">&nbsp;&nbsp;&nbsp;4.09&nbsp;&nbsp;&nbsp;&nbsp;</span><br>
                <input type="checkbox" checked="checked" /> บรรลุ<br>
                <input type="checkbox" checked="checked" /> ไม่บรรลุ
            </td>
        </tr>
    </tbody>
</table>

<br>
<h2>ปัญหาและอุปสรรคในการดำเนินงาน</h2>
<p>
    xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
</p>

<br>
<h2>ข้อเสนอแนะในการพัฒนาจัดทำโครงการครั้งต่อไป</h2>
<p>
    xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
</p>