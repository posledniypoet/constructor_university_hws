<?php
require("./admin_auth.php");
require("./header.php");
?>
<form action="insert_lecturers.php" method="POST">
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
                    <label for="scientific-name">Scientific Name</label>
                    <input class="form-control" name="scientific-name" type="text">
                </div>
                <input name='create' type="submit" class="buttons" value="Add Lecturer">
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
                            $scientific_name = $_POST['scientific-name'];
                            $query1 = "INSERT INTO Persons(first_name, last_name, email) VALUES ('$first_name','$last_name', '$email');";
                            $query2 = "INSERT INTO Lectors(scientific_name) VALUES ('$scientific_name');";
                            if (mysqli_query($conn, $query1) && mysqli_query($conn, $query2)) {
                                header("Location: ./success.php");
                            } else {
                                header("Location: ./exception.php");
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
