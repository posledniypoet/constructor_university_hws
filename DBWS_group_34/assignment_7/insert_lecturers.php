<?php
require("./admin_auth.php");
require("./header.php");
?>
<form action="insert_students.php" method="POST">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <h2>Account</h2>
                <p>Please fill out details to add student info</p>
                <div>
                    <label for="first-name">First Name</label>
                    <input class="form-control" name="first-name" type="text" required>
                </div>
                <div>
                    <label for="last-name">Last Name</label>
                    <input class="form-control" name="last-name" type="text" required>
                </div>
                <div>
                    <label for="email">Email</label>
                    <input class="form-control" name="email" type="email" required>
                </div>
                <div>
                    <label for="group-name">Group Name</label>
                    <input class="form-control" name="group-name" type="text">
                </div>
                <div>
                    <label for="scientific-name">Scientific Name</label>
                    <input class="form-control" name="scientific-name" type="text">
                </div>
                <input name='create' type="submit" class="buttons" value="Add Student">
                <div>
                    <?php
                    if (isset($_POST['create'])) {
                        if (!$_POST['first-name']) {
                            $error .= "<br/>please Enter Lector's first name";
                        }
                        if (!$_POST['last-name']) {
                            $error .= "<br/>please Enter Lector's last name";
                        }
                        if (!$_POST['email']) {
                            $error .= "<br/>please Enter Lector's email";
                        }
                        if (!$_POST['group-name']) {
                            $error .= "<br/>please Enter Lector's group name";
                        }
                        if (!$_POST['scientific-name']) {
                            $error .= "<br/>please Enter Lector's scientific name";
                        }
                        if (isset($error)) {
                            echo "There Were error(s) In Your account info :" . $error;
                        } else {
                            include('base.php');
                            $email = $_POST['email'];
                            $first_name = $_POST['first-name'];
                            $last_name = $_POST['last-name'];
                            $group_id = $_POST['group-id'];
                            $group_name = $_POST['group-name'];
                            $scientific_name = $_POST['scientific-name'];

                            $query1 = "INSERT INTO persons(first_name, last_name, email) VALUES ('$first_name','$last_name', '$email');";
                            $query2 = "INSERT INTO lectors(group_name, scientific_name) VALUES ('$group_name','$scientific_name');";
                            if (mysqli_query($conn, $query1) && mysqli_query($conn, $query2)) {
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
