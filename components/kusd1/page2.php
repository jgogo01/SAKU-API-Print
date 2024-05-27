<div style="page-break-after:always;"></div>

<h2 style="text-align:center;">รายละเอียดโครงการ</h2>

<!-- Project Detail-->
<div style="text-align:start;">
    <b>ชื่อโครงการ (ภาษาไทย)</b>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <span>
        <?= $rowPj['project_name_th'] ?>
    </span>
</div>

<div style="text-align:start;">
    <b>ชื่อโครงการ (ภาษาอังกฤษ)</b>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <span>
        <?= $rowPj['project_name_en'] ?>
    </span>
</div>

<!-- Og Detail -->
<div style="text-align:start;">
    <b>ชื่อองค์กรกิจกรรม (ภาษาไทย)</b>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <span>
        <?= $rowOg['orgnameth'] ?>
    </span>
</div>

<div style="text-align:start;">
    <b>ชื่อองค์กรกิจกรรม (ภาษาอังกฤษ)</b>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <span>
        <?= $rowOg['orgnameen'] ?>
    </span>
</div>

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

<!-- Treasurer -->
<div style="text-align:start;">
    <b>นิสิตเหรัญญิก </b>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <span>
        นาย/นางสาว <?= $stakeholderTreasurer->name ?>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        รหัสนิสิต <?= $stakeholderTreasurer->std_id ?> <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        คณะ<?= isset($stakeholderTreasurer->faculty_id) && array_key_exists($stakeholderTreasurer->faculty_id, $FACULTY) ? $FACULTY[$stakeholderTreasurer->faculty_id] : "" ?>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        หมายเลขโทรศัพท์ <?= $stakeholderTreasurer->phone ?>
    </span>
</div>

<!-- Leader -->
<div style="text-align:start;">
    <b>นิสิตประธานโครงการ </b>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <span>
        นาย/นางสาว <?= isset($headOfPj["name"]) ? $headOfPj["name"] : "________________________" ?>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        รหัสนิสิต <?= isset($headOfPjUser["idCode"]) ? substr($headOfPjUser["idCode"], 1) : "__________________" ?> <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;
        คณะ<?= isset($headOfPjUser["facultyId"]) && array_key_exists($headOfPjUser["facultyId"], $FACULTY) ? $FACULTY[$headOfPjUser["facultyId"]] : "__________________" ?>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        หมายเลขโทรศัพท์ <?= isset($headOfPjUser["PhoneNumber"]) ? $headOfPjUser["PhoneNumber"] : "__________________" ?>
    </span>
</div>

<!-- Advisor -->
<div style="text-align:start;">
    <b>อาจารย์ที่ปรึกษาโครงการ </b>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <span>
        <?= isset($advisorOg["name"]) ? $advisorOg["name"] : "________________________" ?>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        หมายเลขโทรศัพท์ <?= isset($advisorOgUser["PhoneNumber"]) ? $advisorOgUser["PhoneNumber"] : "__________________" ?>
    </span>
</div>

<!-- complianceStandard -->
<div style="text-align:start;">
    <b>สอดคล้องตามมาตรฐานคุณวุฒิระดับอุดมศึกษา พ.ศ.2565 (เลือกเพียง 1 ข้อ) ดังนี้</b>
    <br>
    <span>
        <input type="checkbox" <?= $rowPj['complianceStandard'] == "KNOWLEDGE" ? "checked=\"checked\"" : "" ?> /> ด้านความรู้
        &nbsp;&nbsp;&nbsp;
        <input type="checkbox" <?= $rowPj['complianceStandard'] == "SKILLS" ? "checked=\"checked\"" : "" ?> /> ด้านทักษะ
        &nbsp;&nbsp;&nbsp;
        <input type="checkbox" <?= $rowPj['complianceStandard'] == "ETHICS" ? "checked=\"checked\"" : "" ?> /> ด้านจริยธรรม
        &nbsp;&nbsp;&nbsp;
        <input type="checkbox" <?= $rowPj['complianceStandard'] == "PERSONAL_CHARACTERISTICS" ? "checked=\"checked\"" : "" ?> /> ด้านคุณลักษณะบุคคล
        &nbsp;&nbsp;&nbsp;
        <input type="checkbox" <?= $rowPj['complianceStandard'] == null ? "checked=\"checked\"" : "" ?> /> อื่น ๆ <?= $rowPj['complianceStandard'] == null ? $rowPj['complianceStandardOther'] : "_____________" ?>
    </span>
</div>

<!-- IDKU -->
<div style="text-align:start;">
    <b>สอดคล้องกับอัตลักษณ์นิสิตมหาวิทยาลัยเกษตรศาสตร์ IDKU (เลือกเพียง 1 ข้อ) ดังนี้</b>
    <br>
    <span>
        <input type="checkbox" <?= $rowPj['complianceStandard'] == "KNOWLEDGE" ? "checked=\"checked\"" : "" ?> /> สำนึกดี (Integrity)
        &nbsp;
        <input type="checkbox" <?= $rowPj['complianceStandard'] == "SKILLS" ? "checked=\"checked\"" : "" ?> /> มุ่งมั้น (Determination)
        &nbsp;
        <input type="checkbox" <?= $rowPj['complianceStandard'] == "ETHICS" ? "checked=\"checked\"" : "" ?> /> สร้างสรรค์ (Knowledge Creation)
        &nbsp;
        <input type="checkbox" <?= $rowPj['complianceStandard'] == "PERSONAL_CHARACTERISTICS" ? "checked=\"checked\"" : "" ?> /> สามัคคี (Unity)
    </span>
</div>

<!-- ID Activity -->
<div style="text-align:start;">
    <b>รหัสกิจกรรม คือ</b>
    <span class="underline">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;
        <?= isset($rowPj["activity_code"]) && strlen($rowPj['activity_code']) == 12 ? $rowPj["activity_code"] : 
        "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;" 
        ?>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;
    </span>
</div>

<!-- Activity Hour -->
<?php
$activityHour = json_decode($rowPj['activity_hours']);
?>
<div style="margin-top:10px; text-align: left !important; margin-left:50px;">
    <input type="checkbox" <?= isset($activityHour->university_activities) && !empty($activityHour->university_activities) ? "checked=\"checked\"" : "" ?> /> <b>กิจกรรมมหาวิทยาลัย</b>
    <span class="underline">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;
        <?= isset($activityHour->university_activities)
            && !empty($activityHour->university_activities)
            ? $activityHour->university_activities : "&nbsp;" ?>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;
    </span>
    <b>ชั่วโมง</b>
    <br>

    <input type="checkbox" <?= isset($activityHour->social_activities) && !empty($activityHour->social_activities) ? "checked=\"checked\"" : "" ?> /> <b>กิจกรรมเพื่อสังคม</b>
    <span class="underline">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <?= isset($activityHour->social_activities)
            && !empty($activityHour->social_activities)
            ? $activityHour->social_activities : "&nbsp;" ?>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </span>
    <b>ชั่วโมง</b>
    <br>

    <input type="checkbox" <?= isset($activityHour->competency_development_activities) && sumJson($activityHour->competency_development_activities) != 0 ? "checked=\"checked\"" : "" ?> /> <b>กิจกรรมเสริมสร้างสมรรถนะ</b>
    <span class="underline">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <?= isset($activityHour->competency_development_activities)
            && sumJson($activityHour->competency_development_activities) != 0
            ? sumJson($activityHour->competency_development_activities) : "&nbsp;" ?>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </span>
    <b>ชั่วโมง</b>
    ดังนี้ <br>
</div>

<!--Sub Select -->
<div style="margin-left:100px; width:100%">
    <div style="text-align: left !important; width:70%; float:left">
        <input type="radio" <?= isset($activityHour->competency_development_activities->virtue) ? "checked=\"checked\"" : "" ?> /> คุณธรรมจริยธรรม<br>
        <input type="radio" <?= isset($activityHour->competency_development_activities->thinking_and_learning) ? "checked=\"checked\"" : "" ?> /> การคิดและการเรียนรู้<br>
        <input type="radio" <?= isset($activityHour->competency_development_activities->interpersonal_relationships_and_communication) ? "checked=\"checked\"" : "" ?> /> ความสัมพันธ์ระหว่างบุคคลและการสื่อสาร<br>
        <input type="radio" <?= isset($activityHour->competency_development_activities->health) ? "checked=\"checked\"" : "" ?> /> สุขภาพ
    </div>
    <div style="text-align: left !important; width:30%; float:right">
        <span class="underline">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <?= isset($activityHour->competency_development_activities->virtue)
                && !empty($activityHour->competency_development_activities->virtue)
                ? $activityHour->competency_development_activities->virtue : "&nbsp;" ?>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </span>
        <b>ชั่วโมง</b>
        <br>

        <span class="underline">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <?= isset($activityHour->competency_development_activities->thinking_and_learning)
                && !empty($activityHour->competency_development_activities->thinking_and_learning)
                ? $activityHour->competency_development_activities->thinking_and_learning : "&nbsp;" ?>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </span>
        <b>ชั่วโมง</b>
        <br>

        <span class="underline">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <?= isset($activityHour->competency_development_activities->interpersonal_relationships_and_communication)
                && !empty($activityHour->competency_development_activities->interpersonal_relationships_and_communication)
                ? $activityHour->competency_development_activities->interpersonal_relationships_and_communication : "&nbsp;" ?>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </span>
        <b>ชั่วโมง</b>
        <br>

        <span class="underline">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <?= isset($activityHour->competency_development_activities->health)
                && !empty($activityHour->competency_development_activities->health)
                ? $activityHour->competency_development_activities->health : "&nbsp;" ?>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </span>
        <b>ชั่วโมง</b>
    </div>
</div>

<!-- SDGS -->
<?php
$sdg = str_replace("{", "", $rowPj['sustainable_development_goals']);
$sdg = str_replace("}", "", $sdg);
$sdg = explode(",", $sdg);
?>
<div style="text-align:start;">
    <b>โครงการที่ดำเนินการตรงกับเป้าหมายการพัฒนาอย่างยั่งยืน (Sustainable Development Goals)</b>
    <br>
    <div style="margin-left:100px; width:100%">
        <div style="text-align: left !important; width:50%; float:left">
            <input type="checkbox" <?= in_array("SDG1", $sdg) ? "checked=\"checked\"" : "" ?> /> พ1 ขจัดความยากจน<br>
            <input type="checkbox" <?= in_array("SDG2", $sdg) ? "checked=\"checked\"" : "" ?> /> พ2 ขจัดความหิวโหย<br>
            <input type="checkbox" <?= in_array("SDG3", $sdg) ? "checked=\"checked\"" : "" ?> /> พ3 การมีสุขภาพและความเป็นอยู่ที่ดี<br>
            <input type="checkbox" <?= in_array("SDG4", $sdg) ? "checked=\"checked\"" : "" ?> /> พ4 การศึกษาที่มีคุณภาพ<br>
            <input type="checkbox" <?= in_array("SDG5", $sdg) ? "checked=\"checked\"" : "" ?> /> พ5 ความเท่าเทียมทางเพศ<br>
            <input type="checkbox" <?= in_array("SDG6", $sdg) ? "checked=\"checked\"" : "" ?> /> พ6 น้ำสะอาดและสุขาภิบาล<br>
            <input type="checkbox" <?= in_array("SDG7", $sdg) ? "checked=\"checked\"" : "" ?> /> พ7 พลังงานสะอาดและจ่ายได้<br>
            <input type="checkbox" <?= in_array("SDG8", $sdg) ? "checked=\"checked\"" : "" ?> /> พ8 งานที่มีคุณค่าและเศรษฐกิจที่เติบโต<br>
            <input type="checkbox" <?= in_array("SDG9", $sdg) ? "checked=\"checked\"" : "" ?> /> พ9 อุตสาหกรรม นวัตกรรม โครงสร้างพื้นฐาน
        </div>
        <div style="text-align: left !important; width:50%; float:right">
            <input type="checkbox" <?= in_array("SDG10", $sdg) ? "checked=\"checked\"" : "" ?> /> พ10 ลดความเลื่อมล้ำ<br>
            <input type="checkbox" <?= in_array("SDG11", $sdg) ? "checked=\"checked\"" : "" ?> /> พ11 เมืองและชุมชนที่ยั่งยืน<br>
            <input type="checkbox" <?= in_array("SDG12", $sdg) ? "checked=\"checked\"" : "" ?> /> พ12 การผลิตและบริโภคที่รับผิดชอบ<br>
            <input type="checkbox" <?= in_array("SDG13", $sdg) ? "checked=\"checked\"" : "" ?> /> พ13 การร่วมมือกับ Climate Change<br>
            <input type="checkbox" <?= in_array("SDG14", $sdg) ? "checked=\"checked\"" : "" ?> /> พ14 นิเทศทางทะเลและมหาสมุทร<br>
            <input type="checkbox" <?= in_array("SDG15", $sdg) ? "checked=\"checked\"" : "" ?> /> พ15 ระบบนิเวศบก<br>
            <input type="checkbox" <?= in_array("SDG16", $sdg) ? "checked=\"checked\"" : "" ?> /> พ16 สันติภาพและสถานบันเข้มแข็ง<br>
            <input type="checkbox" <?= in_array("SDG17", $sdg) ? "checked=\"checked\"" : "" ?> /> พ17 หุ้นส่วนเพื่อการพัฒนา
        </div>
    </div>
</div>