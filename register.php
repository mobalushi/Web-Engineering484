<!DOCTYPE html>
<html>

<head>
    <title>Insert Page page</title>
</head>

<body>
    <center>
        <?php
        session_start();


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
        $unhashed_pass_word = $_REQUEST['pass_word'];

        // hash password
        $pass_word = password_hash($unhashed_pass_word, PASSWORD_DEFAULT);

        verify_username($conn, $user_name, $pass_word);

        function verify_username($conn, $user_name, $pass_word)
        {
            if ($user_name != 'Administrator') {
                $sql = "SELECT * FROM users WHERE username = '$user_name'";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    header('Location: lab2.php?msg=userExist');
                } else {
                    insert_to_db($conn, $user_name, $pass_word);
                }
            } else {
                header('Location: lab2.php?msg=adminName');
            }
        }

        function insert_to_db($conn, $user_name, $pass_word)
        {
            $sql = "INSERT INTO users (username, password) VALUES ('$user_name', 
            '$pass_word')";

            if (mysqli_query($conn, $sql)) {
                $_SESSION['registerState'] = false;
                header("Location: lab2.php?msg=regSuccess");
            } else {
                echo "ERROR: Hush! Sorry $sql. "
                    . mysqli_error($conn);
            }
        }


        // Close connection
        mysqli_close($conn);
        ?>
    </center>
</body>

</html>