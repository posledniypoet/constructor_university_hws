<?php
include('./header.php');
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
                    <label for="have-contract">has contract</label>
                    <input class="checkbox-field" name="have-contract" type="checkbox" required>
                </div>
                <input name='create' type="submit" class="buttons" value="Add Student">
                <div>
                    <?php
                    if (isset($_POST['create'])) {
                        if (!$_POST['first-name']) {
                            $error .= "<br/>please Enter Student's first name";
                        }
                        if (!$_POST['last-name']) {
                            $error .= "<br/>please Enter Student's last name";
                        }
                        if (!$_POST['email']) {
                            $error .= "<br/>please Enter Student's email";
                        }
                        if (!$_POST['group-name']) {
                            $error .= "<br/>please Enter Student's group name";
                        }
                        if (isset($error)) {
                            echo "There Were error(s) In Your account info :" . $error;
                        } else {
                            include('base.php');
                            $email = $_POST['email'];
                            $first_name = $_POST['first-name'];
                            $last_name = $_POST['last-name'];
                            $group_id = $_POST['group-id'];
                            $have_contract = (!empty($_POST['subtype']));
                            $group_name = $_POST['group-name'];

                            $query1 = "INSERT INTO persons(first_name, last_name, email) VALUES ('$first_name','$last_name', '$email');";
                            $query2 = "INSERT INTO students(group_name, have_contract) VALUES ('$group_name','$have_contract');";
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
