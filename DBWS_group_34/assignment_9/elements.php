<?php
include('./header.php');
?>
<body>
<div class="page">
    <?php
    include('base.php');
    $id = $_GET["s_id"];
    $sql = "SELECT * FROM Persons WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    $num = $result->field_count;
    $data = $result->fetch_row();

    for ($count = 0; $count < $num; $count++) {
        ?>
        <ul style="margin-left: 200px;">
            <li>
                <?php
                $field = $result->fetch_field();
                echo $field->name, ": ", $data[$count];
                ?>
            </li>
        </ul>
        <?php
    }
    ?>
</div>
</body>
<?php
include('./footer.php');
?>
