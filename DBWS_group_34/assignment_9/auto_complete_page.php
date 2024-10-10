<?php
include('./header.php');
?>
    <form action="search_page.php" method="POST">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h2>Account</h2>
                    <p>Please fill out details to search student info</p>
                    <div>
                        <label for="first-name">First Name</label>
                        <input class="form-control" id="first-name" name="first-name" type="text" required>
                    </div>
                    <input name='create' type="submit" class="buttons" value="Search student info">
                    <?php
                    if (isset($_POST['create'])) {
                        if (!$_POST['first-name']) {
                            $error .= "<br/>please Enter Student's first name";
                        }
                        if (isset($error)) {
                            echo "There Were error(s) In Your account info :" . $error;
                        } else {
                            include('base.php');
                            $first_name = $_POST['first-name'];
                            $query1 = "SELECT Persons.id, first_name, last_name, student_id_card, gr.name FROM Persons
                                           INNER JOIN Students S on Persons.id = S.id
                                           INNER JOIN `groups` gr on S.group_id = gr.id
                                              where first_name = '$first_name';";
                            $result = mysqli_query($conn, $query1);
                        }
                    }
                                ?>
                </div>
            </div>
        </div>
        </div>
        <script>
            $(function() {
                $("#first-name").autocomplete({
                    source: "auto_complete_first_name.php",
                });
            });
        </script>
    </form>
<?php
include('./footer.php');
?>