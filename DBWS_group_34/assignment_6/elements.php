<?php
include('./header.php');
?>
<div class="page">
    <?php
    $id = $_GET["Persons.id"];
    $sql = "SELECT * FROM PERSONS WHERE id=$id";
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

    <p id="imprint">
        This website is student lab work and does not necessarily reflect Jacobs University Bremen opinions. Jacobs
        University Bremen does not endorse this site, nor is it checked by Jacobs University
        Bremen regularly, nor is it part of the official Jacobs University Bremen web presence.
        For each external link existing on this website, we initially have checked that the target page
        does not contain contents which is illegal wrt. German jurisdiction. However, as we have no influence on
        such contents, this may change without our notice. Therefore we deny any responsibility for the websites
        referenced through our external links from here.
        No information conflicting with GDPR is stored in the server.
    </p>
</div>
<?php
include('./footer.php');
?>
