<?php
foreach ($rowTypeOg as $row) {
?>
    <h2><?php echo $row['org_type_name']; ?></h2>
    <?php
    $sqlOg = "SELECT DISTINCT 
            org.orgnameth as org_name, 
            org.id as org_id
            FROM \"Project\" as pj
            JOIN \"Organization\" as org
            ON pj.organization_orgid = org.id
            WHERE pj.\"tagId\" IN ($tag) 
            AND pj.project_status != 'ProjectRejected'
            AND org.org_typeid = '" . $row['org_type_id'] . "' 
            ORDER BY org_name ASC";

    // Execute the query with prepared statement
    $resultOg = pg_query($con, $sqlOg);
    $rowOg = pg_fetch_all($resultOg);

    foreach ($rowOg as $row) {
        $totalBudgetOg = 0;
        echo "<h3>" . $row['org_name'] . "</h3>";
        $sqlPj = "SELECT 
                pj.id,
                pj.project_name_th,
                pj.number_of_project_participants,
                pj.sustainable_development_goals
                FROM \"Project\" as pj
                JOIN \"Organization\" as org
                ON pj.organization_orgid = org.id
                WHERE pj.\"tagId\" IN ($tag) 
                AND pj.project_status != 'ProjectRejected'
                AND org.id = '" . $row['org_id'] . "'
                ORDER BY pj.project_name_th ASC
                ";
        $resultPj = pg_query($con, $sqlPj);
        $rowPj = pg_fetch_all($resultPj);
    ?>
        <table autosize="1" width="100%" border="1" style="border-collapse: collapse; overflow: wrap;">
            <tr style="background-color: #D6F9FF;">
                <th width="4%">ที่</th>
                <th width="40%">โครงการ</th>
                <th width="6%">ผู้เข้าร่วม</th>
                <th width="20%">สอดคล้องกับ SDGs</th>
                <th width="10%">งบที่เสนอขอ</th>
                <th width="10%">งบประมาณที่ได้</th>
            </tr>
            <?php
            $j = 0;
            foreach ($rowPj as $row) {
                $number_of_project_participants = json_decode($row['number_of_project_participants'], true);
                #Sum All Number of Participants
                $Participants = 0;
                foreach ($number_of_project_participants as $key => $value) {
                    $Participants += $value;
                }

                #Get Project Budget History
                $sqlBudget = "SELECT * FROM \"ProjectBudgetHistory\" 
                WHERE projectid = $1 AND role = $2
                ORDER BY \"createdAt\" DESC
                LIMIT 1";

                $resultBudget = pg_query_params($con, $sqlBudget, array($row['id'], $role));
                $rowBudget = pg_fetch_assoc($resultBudget);
                //Add Budget Total By Organization
                $totalBudgetOg += $rowBudget["budget"];

                $sdg = str_replace("{", "", $row['sustainable_development_goals']);
                $sdg = str_replace("}", "", $sdg);
                $sdg = explode(",", $sdg);
            ?>
                <tr>
                    <td><?= $j + 1; ?></td>
                    <td><?= $row['project_name_th']; ?></td>
                    <td style="text-align: right;"><?= number_format($Participants) ?></td>
                    <td>
                        <?php
                        $k = 0;
                        foreach ($sdg as $sdgItem) {
                            if ($k == 0) {
                                echo $sdgItem;
                            } else {
                                echo ", " . $sdgItem;
                            }
                            $k++;
                        }
                        ?>
                    </td>
                    <td style="text-align: right;"><?= number_format($rowBudget["from_budget"]) ?></td>
                    <td style="text-align: right;"><?= number_format($rowBudget["budget"]) ?></td>
                </tr>
            <?php
                $j++;
            }
            ?>
        </table>
        <h4 style="text-align: right;">รวมทั้งสิ้น <?= number_format($totalBudgetOg) ?> บาท</h4>
        <p style="position:fixed; text-align:center; top:680px; color: #8C8C8C;">
            รายงานโดย <?= $decoded->name ?> 
            ตำแหน่ง <?= $decoded->role == "SAB" ? "องค์การบริหาร องค์การนิสิต" : "สภาผู้แทนนิสิต" ?>
            วันที่ <?= date("d/m/Y") ?>
            เวลา <?= date("H:i:s") ?>
            IP Address <?= getUserIP() ?>
        </p>
    </p>
<?php

    }
}
?>