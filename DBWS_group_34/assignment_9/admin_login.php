<?php
include("./header.php");
$usrname = $_GET['username'] ?? " ";
$passwrd = $_GET['password'] ?? " ";
$usrname = htmlspecialchars($usrname);
$passwrd = htmlspecialchars($passwrd);
if(isset($_POST['login'])):
    include("./base.php");
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    print($username);
    print($password);
    $query = "SELECT * FROM ADMINS_TAB at WHERE at.username = '{$username}' and at.password = {$password};";
    $result = mysqli_query($conn, $query);
    $clean_data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $count_results = count($clean_data);
    print ($count_results);
    if($count_results == 1):
        mysqli_free_result($result);
        mysqli_close($conn);
        setcookie("is_auth", 'yes', time() + 900);
        header("Location: ./main_page.php");
    elseif($count_results == 0):
        mysqli_free_result($result);
        mysqli_close($conn);
        header("Location:".$_SERVER['PHP_SELF']."?status=auth_failed&username={$username}&password={$password}");
    else:
        mysqli_free_result($result);
        header("Location: ./exception.php?status=Cannot authenticate user");
    endif;
elseif(isset($_GET['status'])):
    if($_GET['status'] === "auth_failed"):
        echo "<h2 style = 'color:red;'>Wrong username or password</h2>";
    elseif($_GET['status'] === 'sign_in_required'):
        echo "<h2 style = 'color:red;'> Sign in with an admin account before inserting students info</h2>";
    endif;
else:
    echo "<h3> Enter your admin account credentials </h3>";
endif;
?>
    <form action="<?php $_SERVER['PHP_SELF']?>" method = "POST">
        <input type="text" name = 'username' placeholder = "Admin Username">
        <br>
        <input type="password" name = 'password' placeholder = "Admin Password">
        <br>
        <input type="submit" name = "login" value = "login" class = buttons>
    </form>
<?php
include("./footer.php");
?>