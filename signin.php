<!DOCTYPE html>
<html>

<head>
    <title>Insert Page page</title>
</head>

<body>
    <center>
        <?php

        $servername = "localhost";
        $username = "";
        $password = "";
        $dbname = "usersdb";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Taking all 5 values from the form data(input)
        $user_name =  $_REQUEST['user_name'];
        $pass_word = $_REQUEST['pass_word'];


        // Performing insert query execution

        $sql = "SELECT * FROM users WHERE username = '$user_name'";
        $result = mysqli_query($conn, $sql);

        if ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($pass_word, $row['password'])) {
                session_start();
                
                $_SESSION['username'] = $row['username'];
                if ($_SESSION['username'] == "Administrator") {
                    $_SESSION['loggedInAsAdmin'] = true;
                    header("Location: admin.php");
                } else {
                    $_SESSION['loginState'] = true;
                    header("Location: lab2.php");
                }
            } else {
                $_SESSION['loginState'] = false;
                header("Location: lab2.php?msg=xadminpass");
            }
        } else {
            $_SESSION['loginState'] = false;
            header("Location: lab2.php?msg=usernotfound");
        }

        // Close connection
        mysqli_close($conn);
        ?>
    </center>
</body>

</html>