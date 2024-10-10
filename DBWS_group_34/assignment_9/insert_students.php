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
                    <input class="form-control" name="group-name" type="number">
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
                            $group_name = $_POST['group-name'];

                            $query1 = "INSERT INTO Persons(first_name, last_name, email) VALUES ('$first_name','$last_name', '$email');";
                            $query_search = "SELECT Persons.id FROM Persons ORDER BY id DESC LIMIT 0, 1;";
                            $result_search = mysqli_query($conn, $query_search);
                            $data = mysqli_fetch_all($result_search,MYSQLI_ASSOC);
                            $idList = array();
                            foreach($data as $id){
                                $idList[] = $id['id'];
                            }
                            $final_id = $idList[0]+1;
                            $query2 = "INSERT INTO Students(id, group_name, student_id_card, have_contract) VALUES ('$final_id','$group_name','$final_id', false);";
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
