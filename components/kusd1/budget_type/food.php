<?php
if (checkDatainArrary($budgetCheck["food_and_snack_costs"])) {
    $i = 0;
    $foodBudget = $budget_use->food_and_snack_costs;
    $totalFood = 0;
?>
    <h2 style="padding: 0; margin:0;">ค่าอาหารและอาหารว่าง</h2>
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
            if (isset($foodBudget->meals)) {
                $i++;
                $totalFood += $foodBudget->meals * $foodBudget->max_per_meal_baht * $foodBudget->num_people_meals;
            ?>
                <tr>
                    <td><?= $i ?></td>
                    <td>อาหาร <?= $foodBudget->meals ?> มื้อ ๆ ละไม่เกิน <?= $foodBudget->max_per_meal_baht ?> บาท จำนวน <?= $foodBudget->num_people_meals ?> คน</td>
                    <td style="text-align: right"><?= number_format($foodBudget->meals * $foodBudget->max_per_meal_baht * $foodBudget->num_people_meals) ?></td>
                </tr>
            <?php
            }
            if (isset($foodBudget->snacks_per_day)) {
                $totalFood += $foodBudget->snacks_per_day * $foodBudget->max_snack_cost_per_meal * $foodBudget->num_people_snacks;
                $i++;
            ?>
                <tr>
                    <td><?= $i ?></td>
                    <td>อาหารว่าง <?= $foodBudget->snacks_per_day ?> มื้อ ๆ ละไม่เกิน <?= $foodBudget->max_snack_cost_per_meal ?> บาท จำนวน <?= $foodBudget->num_people_snacks ?> คน</td>
                    <td style="text-align: right"><?= number_format($foodBudget->snacks_per_day * $foodBudget->max_snack_cost_per_meal * $foodBudget->num_people_snacks) ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <h3 style="text-align: right">รวม <?= number_format($totalFood) ?> บาท</h3>
<?php
}
?>