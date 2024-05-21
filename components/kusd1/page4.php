<?php
$budgetCheck = json_decode($rowPj['budget_use'], true);
$transportation_costs = json_decode($rowPj['transportation_costs'], true);
$compensation_per_regulations = json_decode($rowPj['compensation_per_regulations'], true);

//Check if have any budget
if (
    checkDatainArrary($budgetCheck["food_and_snack_costs"]) || checkDatainArrary($budgetCheck["accommodation_costs"])
    || checkDatainArrary($transportation_costs) || checkDatainArrary($budgetCheck["speaker_honorarium"])
    || checkDatainArrary($budgetCheck["materials_costs"]) || checkDatainArrary($compensation_per_regulations)
    || checkDatainArrary($budgetCheck["other_expenses"])
) {
    $budget_use = json_decode($rowPj['budget_use']);
?>
    <div style="page-break-before:always;"></div>
    <div style="width:100%;">
        <img src="assets/ku_sd_online.png" width="200">
        <h3 style="line-height: 0; padding: 0; margin:0;">ประมาณการค่าใช้จ่ายในการดำเนินโครงการ <?= $rowPj['project_name_th'] ?></h3>
        <h4>วันที่ <?= dateThai($rowPj['date_start_the_project'], $rowPj['date_end_the_project'], "full") ?></h4>
        <h4>ณ <?= $rowPj['project_location'] ?></h4>
    </div>

    <?php require("budget_type/food.php") ?>
    <?php require("budget_type/accountment.php") ?>
    <?php require("budget_type/transportation.php") ?>
    <?php require("budget_type/speaker_honorarium.php") ?>
    <?php require("budget_type/material.php") ?>
    <?php require("budget_type/compensation_per_regulations.php") ?>
    <?php require("budget_type/other.php") ?>
<?php
}
?>