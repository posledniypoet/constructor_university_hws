<?php
require("./admin_auth.php");
require("./header.php");
?>
<h3>INSERT PAGE</h3>
<div>
    <a href="insert_students.php">
        <button id="students" class="buttons">Insert Students Info</button>
    </a>
</div>
<div>
    <a href="insert_lecturers.php">
        <button id="lecturers" class="buttons">Insert Lecturers Info</button>
    </a>
</div>
<div>
    <a href="#">
        <button id="marks" class="buttons">Insert Marks Info</button>
    </a>
</div>
<div>
    <a href="insert_groups_info.php">
        <button id="groups" class="buttons">Insert groups info</button>
    </a>
</div>
<!--<div>-->
<!--    <a href="get_rating.php">-->
<!--        <button id="rating" class="buttons">get students rating</button>-->
<!--    </a>-->
<!--</div>-->
<?php include("./footer.php") ?>
