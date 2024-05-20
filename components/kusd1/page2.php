<?php ob_start(); ?>
<!-- Project Detail-->
<div style="position: fixed; width: 490; top:45; left:170;"><?= $rowPj['project_name_th'] ?></div>
<div style="position: fixed; width: 475; top:80; left:185;"><?= $rowPj['project_name_en'] ?></div>

<!-- Og Detail -->
<div style="position: fixed; width: 455; top:117; left:205;"><?= $rowOg['orgnameth'] ?></div>
<div style="position: fixed; width: 440; top:152; left:220;"><?= $rowOg['orgnameen'] ?></div>

<?php
//Get Faculty
$facultySQL = "SELECT id, name FROM \"Faculty\"";
$resultFaculty = pg_query($con, $facultySQL);
$faculty = pg_fetch_all($resultFaculty);
$FACULTY = array();

foreach ($faculty as $facultyItem) {
    $FACULTY[$facultyItem['id']] = $facultyItem['name'];
}
//For Transform Year
$YEAR = [
    "YEAR1" => "ปี 1",
    "YEAR2" => "ปี 2",
    "YEAR3" => "ปี 3",
    "YEAR4" => "ปี 4",
    "YEAR5" => "ปี 5",
];
?>

<!-- -->
<div style="position: fixed; width: 250; top:190; left:230;"><?= $stakeholderTreasurer->name ?></div>
<div style="position: fixed; width: 130; top:190; left:530;"><?= $stakeholderTreasurer->std_id ?></div>
<div style="position: fixed; width: 135; top:225; left:190;"><?= array_key_exists($stakeholderTreasurer->faculty_id, $FACULTY) ? $FACULTY[$stakeholderTreasurer->faculty_id] : "" ?></div>
<div style="position: fixed; width: 60; top:225; left:365;"><?= array_key_exists($stakeholderTreasurer->year, $YEAR) ? $YEAR[$stakeholderTreasurer->year] : "" ?></div>
<div style="position: fixed; width: 130; top:225; left:530;"><?= $stakeholderTreasurer->phone ?></div>

<div style="position: fixed; width: 250; top:261; left:230;"><?= isset($stakeholderLeader["name"]) ? $stakeholderLeader["name"] : "" ?></div>
<div style="position: fixed; width: 130; top:261; left:530;"><?= isset($stakeholderLeader['idCode']) ? substr($stakeholderLeader['idCode'], 1)  : "" ?></div>
<div style="position: fixed; width: 135; top:298; left:190;"><?= array_key_exists($stakeholderLeader['facultyId'], $FACULTY) ? $FACULTY[$stakeholderLeader['facultyId']] : "" ?> </div>
<div style="position: fixed; width: 60; top:298; left:365;"><?= isset($stakeholderLeader['Year']) ? $YEAR[$stakeholderLeader['Year']] : "" ?></div>
<div style="position: fixed; width: 130; top:298; left:530;"><?= isset($stakeholderLeader['PhoneNumber']) ? $stakeholderLeader['PhoneNumber']  : "" ?></div>

<div style="position: fixed; width: 200; top:334; left:180;"><?= isset($stakeholderAdvisor["name"]) ? $stakeholderAdvisor["name"] : "" ?></div>
<div style="position: fixed; width: 170; top:334; left:490;"><?= isset($stakeholderAdvisor["PhoneNumber"]) ? $stakeholderAdvisor["PhoneNumber"] : "" ?></div>


<!-- OV -->
<div style="position: fixed; width: 20; top:395; left:30;"><?= $rowPj['complianceStandard'] == "KNOWLEDGE" ? "/" : "" ?></div>
<div style="position: fixed; width: 20; top:395; left:265;"><?= $rowPj['complianceStandard'] == "SKILLS" ? "/" : "" ?></div>
<div style="position: fixed; width: 20; top:395; left:505;"><?= $rowPj['complianceStandard'] == "ETHICS" ? "/" : "" ?></div>
<div style="position: fixed; width: 20; top:425; left:30;"><?= $rowPj['complianceStandard'] == "PERSONAL_CHARACTERISTICS" ? "/" : "" ?></div>
<div style="position: fixed; width: 20; top:425; left:265;"><?= $rowPj['complianceStandard'] == null ? "/" : "" ?></div>
<div style="position: fixed; width: 180; top:425; left:315;"><?= $rowPj['complianceStandard'] == null ? $rowPj['complianceStandardOther'] : "" ?></div>

<!-- IDKU -->
<div style="position: fixed; width: 20; top:485; left:30;"><?= $rowPj['kasetsartStudentIdentity'] == "INTEGRITY" ? "/" : "" ?></div>
<div style="position: fixed; width: 20; top:485; left:170;"><?= $rowPj['kasetsartStudentIdentity'] == "DETERMINATION" ? "/" : "" ?></div>
<div style="position: fixed; width: 20; top:485; left:335;"><?= $rowPj['kasetsartStudentIdentity'] == "KNOWLEDGE_CREATION" ? "/" : "" ?></div>
<div style="position: fixed; width: 20; top:485; left:555;"><?= $rowPj['kasetsartStudentIdentity'] == "UNITY" ? "/" : "" ?></div>

<!-- ID Activity -->
<div style="position: fixed; width: 310; top:535; left:143; letter-spacing: 13.58pt; text-align: start;"><?= isset($rowPj['activity_code']) && strlen($rowPj['activity_code']) == 12 ? $rowPj['activity_code'] : "000000000000" ?></div>

<!-- Activity Hour -->
<?php
$activityHour = json_decode($rowPj['activity_hours']);
?>
<div style="position: fixed; width: 20; top:570; left:110;"><?= isset($activityHour->university_activities) ? "/" : "" ?></div>
<div style="position: fixed; width: 170; top:570; left:270;"><?= isset($activityHour->university_activities) ? $activityHour->university_activities : "" ?></div>
<div style="position: fixed; width: 20; top:595; left:110;"><?= isset($activityHour->social_activities) ? "/" : "" ?></div>
<div style="position: fixed; width: 170; top:595; left:270;"><?= isset($activityHour->social_activities) ? $activityHour->social_activities : "" ?></div>
<div style="position: fixed; width: 20; top:620; left:110;"><?= isset($activityHour->competency_development_activities) ? "/" : "" ?></div>
<div style="position: fixed; width: 170; top:620; left:270;"><?= isset($activityHour->competency_development_activities) ? sumJson($activityHour->competency_development_activities) : "" ?></div>

<!-- Activity (Upskill) -->
<div style="position: fixed; width: 20; top:645; left:155;"><?= isset($activityHour->competency_development_activities->virtue) ? "/" : "" ?></div>
<div style="position: fixed; width: 55; top:645; left:480;"><?= isset($activityHour->competency_development_activities->virtue) ? $activityHour->competency_development_activities->virtue : "" ?></div>
<div style="position: fixed; width: 20; top:668; left:155;"><?= isset($activityHour->competency_development_activities->interpersonal_relationships_and_communication) ? "/" : "" ?></div>
<div style="position: fixed; width: 55; top:668; left:480;"><?= isset($activityHour->competency_development_activities->interpersonal_relationships_and_communication) ? $activityHour->competency_development_activities->interpersonal_relationships_and_communication : "" ?></div>
<div style="position: fixed; width: 20; top:692; left:155;"><?= isset($activityHour->competency_development_activities->thinking_and_learning) ? "/" : "" ?></div>
<div style="position: fixed; width: 55; top:692; left:480;"><?= isset($activityHour->competency_development_activities->thinking_and_learning) ? $activityHour->competency_development_activities->thinking_and_learning : "" ?></div>
<div style="position: fixed; width: 20; top:717; left:155;"><?= isset($activityHour->competency_development_activities->health) ? "/" : "" ?></div>
<div style="position: fixed; width: 55; top:717; left:480;"><?= isset($activityHour->competency_development_activities->health) ? $activityHour->competency_development_activities->health : "" ?></div>

<!-- SDGS -->
<?php
$sdg = str_replace("{", "", $rowPj['sustainable_development_goals']);
$sdg = str_replace("}", "", $sdg);
$sdg = explode(",", $sdg);
?>
<div style="position: fixed; width: 20; top:780; left:115;"><?= in_array("SDG1", $sdg) ? "/" : ""  ?></div>
<div style="position: fixed; width: 20; top:780; left:402;"><?= in_array("SDG2", $sdg) ? "/" : "" ?></div>
<div style="position: fixed; width: 20; top:807; left:115;"><?= in_array("SDG3", $sdg) ? "/" : "" ?></div>
<div style="position: fixed; width: 20; top:807; left:402;"><?= in_array("SDG4", $sdg) ? "/" : "" ?></div>
<div style="position: fixed; width: 20; top:835; left:115;"><?= in_array("SDG5", $sdg) ? "/" : "" ?></div>
<div style="position: fixed; width: 20; top:835; left:402;"><?= in_array("SDG6", $sdg) ? "/" : "" ?></div>
<div style="position: fixed; width: 20; top:864; left:115;"><?= in_array("SDG7", $sdg) ? "/" : "" ?></div>
<div style="position: fixed; width: 20; top:864; left:402;"><?= in_array("SDG8", $sdg) ? "/" : "" ?></div>
<div style="position: fixed; width: 20; top:892; left:115;"><?= in_array("SDG9", $sdg) ? "/" : "" ?></div>
<div style="position: fixed; width: 20; top:892; left:402;"><?= in_array("SDG10", $sdg) ? "/" : "" ?></div>
<div style="position: fixed; width: 20; top:920; left:115;"><?= in_array("SDG11", $sdg) ? "/" : "" ?></div>
<div style="position: fixed; width: 20; top:920; left:402;"><?= in_array("SDG12", $sdg) ? "/" : "" ?></div>
<div style="position: fixed; width: 20; top:948; left:115;"><?= in_array("SDG13", $sdg) ? "/" : "" ?></div>
<div style="position: fixed; width: 20; top:948; left:402;"><?= in_array("SDG14", $sdg) ? "/" : "" ?></div>
<div style="position: fixed; width: 20; top:976; left:115;"><?= in_array("SDG15", $sdg) ? "/" : "" ?></div>
<div style="position: fixed; width: 20; top:976; left:402;"><?= in_array("SDG16", $sdg) ? "/" : "" ?></div>
<div style="position: fixed; width: 20; top:1004; left:115;"><?= in_array("SDG17", $sdg) ? "/" : "" ?></div>

<?php
//Page 2 Content
$html = ob_get_contents();
ob_end_clean();
$mpdf->WriteHTML($html);

//Template Page 2
$mpdf->SetSourceFile("assets/kusd1.pdf");
$import_page = $mpdf->ImportPage(2);
$mpdf->UseTemplate($import_page);
$mpdf->AddPage();
?>