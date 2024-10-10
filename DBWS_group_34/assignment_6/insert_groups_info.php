<?php
include('./header.php');
?>
<form action="insert_groups_info.php" method="POST">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <h2>Account</h2>
                <p>Please fill out details to add group info</p>
                <div>
                    <label for="group-name">Group name</label>
                    <input class="form-control" name="group-name" type="text" required>
                </div>
                <input name='create' type="submit" class="buttons" value="Add Group">
                <div>
                    <?php
                    if (isset($_POST['create'])) {
                        if (!$_POST['group-name']) {
                            $error .= "<br/>please Enter Group's name";
                        }
                        if (isset($error)) {
                            echo "There Were error(s) In Your account info :" . $error;
                        } else {
                            include('base.php');
                            $group_name = $_POST['group-name'];
                            $query1 = "INSERT INTO groups(group_name) VALUES ('$group_name');";
                            if (mysqli_query($conn, $query1)) {
                                header("Location: ./success.php");
                            } else {
                                header("Location: ./failure.php");
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</form>
<?php
include('./footer.php');
?>
