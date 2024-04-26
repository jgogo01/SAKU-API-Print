<?php
if (checkDatainArrary($transportation_costs)) {
    $i = 0;
    $totalTransportation = 0;
?>
    <br>
    <h2 style="padding: 0; margin:0;">ค่ายานพาหนะ</h2>

    <table width="100%" border="1" style="border-collapse: collapse;">
        <thead>
            <tr style="background-color: #eaffd9;">
                <th width="5%"><b>ที่</b></th>
                <th width="65%"><b>รายการ</b></th>
                <th width="15%"><b>จำนวน</b></th>
            </tr>
        </thead>
        <tbody>
            <!-- KASET -->
            <?php if (isset($transportation_costs["kaset"])) {
                $i++;
                $totalKaset = 0;
                //Loop For Sum Budget Use
                if (isset($transportation_costs["kaset"]["bus_driver_compensation"])) {
                    $totalKaset += $transportation_costs["kaset"]["bus_driver_compensation"];
                }
                if (isset($transportation_costs["kaset"]["driver_overtime_compensation"])) {
                    $totalKaset += $transportation_costs["kaset"]["driver_overtime_compensation"];
                }
                if (isset($transportation_costs["kaset"]["bus_driver_compensation"])) {
                    $totalKaset += $transportation_costs["kaset"]["bus_driver_compensation"];
                }
                if (isset($transportation_costs["kaset"]["fuel_costs"]["amount"])) {
                    $totalKaset += $transportation_costs["kaset"]["fuel_costs"]["amount"];
                }
                if (isset($transportation_costs["kaset"]["other"])) {
                    foreach ($transportation_costs["kaset"]["other"] as $other) {
                        $totalKaset += $other["amount"];
                    }
                }
                $totalTransportation += $totalKaset;
            ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><b>ขอความอนุเคราะห์รถจากกองกายภาพฯ ประกาศ. มก เรื่อง กำหนด<br>
                            อัตราค่าตอบแทนสำหรับหนักงานขับรถและอัตราค่าบำรุงรถยนต์</b><br>
                        <ul>
                            <?= isset($transportation_costs["kaset"]["bus_driver_compensation"]) ? "<li>ค่าตอบแทนพนักงานขับรถยนต์ (จ-ศ หลัง 16.30 น.)" : "" ?>
                            <?= isset($transportation_costs["kaset"]["driver_overtime_compensation"]) ? "<li>ค่าตอบแทนพนักงานขับรถยนต์ (ส-อา-วันหยุดราชการ)" : "" ?>
                            <?= isset($transportation_costs["kaset"]["bus_driver_compensation"]) ? "<li>ค่าตอบแทนพนักงานขับรถบัสปรับอากาศ" : "" ?>
                            <?= isset($transportation_costs["kaset"]["fuel_costs"]["distance"]) ? "<li>ค่าน้ำมันเชื่อเพลิง (ประมาณ " . number_format($transportation_costs["kaset"]["fuel_costs"]["distance"]) . " กม.)" : "" ?>
                            <?php
                            if (isset($transportation_costs["kaset"]["other"])) {
                                foreach ($transportation_costs["kaset"]["other"] as $other) {
                                    echo "<li>" . $other["label"] . "</li>";
                                }
                            }
                            ?>
                        </ul>
                    </td>
                    <td style="vertical-align: top; text-align: right">
                        <br>
                        <?= isset($transportation_costs["kaset"]["bus_driver_compensation"])  ? number_format($transportation_costs["kaset"]["bus_driver_compensation"]) . "</li>" : "" ?>
                        <?= isset($transportation_costs["kaset"]["driver_overtime_compensation"]) ? number_format($transportation_costs["kaset"]["driver_overtime_compensation"]) . "</li>" : "" ?>
                        <?= isset($transportation_costs["kaset"]["bus_driver_compensation"]) ? number_format($transportation_costs["kaset"]["bus_driver_compensation"]) . "</li>" : "" ?>
                        <?= isset($transportation_costs["kaset"]["fuel_costs"]["amount"]) ? number_format($transportation_costs["kaset"]["fuel_costs"]["amount"]) . "</li>" : "" ?>
                        <?php
                        if (isset($transportation_costs["kaset"]["other"])) {
                            foreach ($transportation_costs["kaset"]["other"] as $other) {
                                echo number_format($other["amount"]) . "</li>";
                            }
                        }
                        ?>
                    </td>
                </tr>
            <?php } ?>
            <!-- PUBLIC -->
            <?php if (isset($transportation_costs["public_transport_costs"])) {
                $i++;
                $totalPublic = 0;
                //Loop For Sum Budget Use
                foreach ($transportation_costs["public_transport_costs"] as $public) {
                    //Handle One Way Trip
                    if (isset($public["outbound_trip"])) {
                        $totalPublic += $public["outbound_trip"]["amount"] * $public["outbound_trip"]["per_seat"];
                    }
                    if (isset($public["return_trip"])) {
                        $totalPublic += $public["return_trip"]["amount"] * $public["return_trip"]["per_seat"];
                    }
                }
                $totalTransportation += $totalPublic;
            ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><b>ค่าโดยสารปรับอากาศ บข.ส</b><br>
                        <?php
                        $j = 0;
                        foreach ($transportation_costs["public_transport_costs"] as $public) { ?>
                            <?= $j != 0 ? "<br>" : "" ?>
                            <?= isset($public["outbound_trip"]) ?
                                "ขาไป อัตราที่นั่งละ <span style='text-decoration:underline'>&nbsp;&nbsp;&nbsp;&nbsp;" .
                                number_format($public["outbound_trip"]["per_seat"]) .
                                "&nbsp;&nbsp;&nbsp;&nbsp;</span> บาท 
                                    จำนวน <span style='text-decoration:underline'>&nbsp;&nbsp;&nbsp;&nbsp;" .
                                number_format($public["outbound_trip"]["amount"]) .
                                "&nbsp;&nbsp;&nbsp;&nbsp;</span> ที่นั่ง" : ""
                            ?>
                            <?= isset($public["return_trip"]) ?
                                "<br>ขากลับ อัตราที่นั่งละ <span style='text-decoration:underline'>&nbsp;&nbsp;&nbsp;&nbsp;" .
                                number_format($public["return_trip"]["per_seat"]) .
                                "&nbsp;&nbsp;&nbsp;&nbsp;</span> บาท 
                                    จำนวน <span style='text-decoration:underline'>&nbsp;&nbsp;&nbsp;&nbsp;" .
                                number_format($public["return_trip"]["amount"]) .
                                "&nbsp;&nbsp;&nbsp;&nbsp;</span> ที่นั่ง" : ""
                            ?>
                        <?php
                            $j++;
                        } ?>
                    </td>
                    <td style="text-align: right">
                        <br>
                        <?php foreach ($transportation_costs["public_transport_costs"] as $public) { ?>
                            <?= isset($public["outbound_trip"]) ?
                                number_format($public["outbound_trip"]["per_seat"] * $public["outbound_trip"]["amount"]) : ""
                            ?>
                            <?= isset($public["return_trip"]) ?
                                "<br>" . number_format($public["return_trip"]["per_seat"] * $public["return_trip"]["amount"]) : ""
                            ?>
                        <?php } ?>
                    </td>
                    <td style="text-align: right">
                        <?= number_format($totalPublic) ?>
                    </td>
                <tr>
                <?php } ?>

                <!-- TRAIN -->
                <?php if (isset($transportation_costs["train_ticket_costs_3rd_class"])) {
                    $i++;
                    $totalTrain = 0;
                    //Loop For Sum Budget Use
                    foreach ($transportation_costs["train_ticket_costs_3rd_class"] as $train) {
                        //Handle One Way Trip
                        if (isset($train["outbound_trip"])) {
                            $totalTrain += $train["outbound_trip"]["amount"] * $train["outbound_trip"]["per_seat"];
                        }
                        if (isset($train["return_trip"])) {
                            $totalTrain += $train["return_trip"]["amount"] * $train["return_trip"]["per_seat"];
                        }
                    }
                    $totalTransportation += $totalTrain;
                ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><b>ค่าโดยสารรถไฟ ประเภท ชั้น 3</b><br>
                        <?php
                        $j = 0;
                        foreach ($transportation_costs["train_ticket_costs_3rd_class"] as $train) { ?>
                            <?= $j != 0 ? "<br>" : "" ?>
                            <?= isset($train["outbound_trip"]) ?
                                "ขาไป อัตราที่นั่งละ <span style='text-decoration:underline'>&nbsp;&nbsp;&nbsp;&nbsp;" .
                                number_format($train["outbound_trip"]["per_seat"]) .
                                "&nbsp;&nbsp;&nbsp;&nbsp;</span> บาท
                                        จำนวน <span style='text-decoration:underline'>&nbsp;&nbsp;&nbsp;&nbsp;" .
                                number_format($train["outbound_trip"]["amount"]) .
                                "&nbsp;&nbsp;&nbsp;&nbsp;</span> ที่นั่ง" : ""
                            ?>
                            <?= isset($train["return_trip"]) ?
                                "<br>ขากลับ อัตราที่นั่งละ <span style='text-decoration:underline'>&nbsp;&nbsp;&nbsp;&nbsp;" .
                                number_format($train["return_trip"]["per_seat"]) .
                                "&nbsp;&nbsp;&nbsp;&nbsp;</span> บาท 
                                        จำนวน <span style='text-decoration:underline'>&nbsp;&nbsp;&nbsp;&nbsp;" .
                                number_format($train["return_trip"]["amount"]) .
                                "&nbsp;&nbsp;&nbsp;&nbsp;</span> ที่นั่ง" : ""
                            ?>
                        <?php
                            $j++;
                        } ?>
                    </td>
                    <td style="text-align: right">
                        <br>
                        <?php foreach ($transportation_costs["train_ticket_costs_3rd_class"] as $public) { ?>
                            <?= isset($public["outbound_trip"]) ?
                                number_format($public["outbound_trip"]["per_seat"] * $public["outbound_trip"]["amount"]) : ""
                            ?>
                            <?= isset($public["return_trip"]) ?
                                "<br>" . number_format($public["return_trip"]["per_seat"] * $public["return_trip"]["amount"]) : ""
                            ?>
                        <?php } ?>
                    </td>
                <tr>
                <?php } ?>
        </tbody>
    </table>
    <h3 style="text-align: right">รวม <?= number_format($totalTransportation) ?> บาท</h3>
<?php
}
?>