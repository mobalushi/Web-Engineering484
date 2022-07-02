<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Admin Page</title>
</head>

<body>
    

    <?php
    session_start();

    if (isset($_SESSION['loggedInAsAdmin'])) {
        if ($_SESSION['loggedInAsAdmin'] == true) {

            function read_data()
            {
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

                // Performing insert query execution

                $sql = "SELECT * FROM users ORDER BY username ASC";
                $result = mysqli_query($conn, $sql);


                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr class='item_row'>
                    <td>" . $row['userId'] . "</t>
                    <td>" . $row['username'] . "</td>
                    <td>" . $row['password'] . "</td>
                </tr>";
                    }
                } else {
                    echo "0 results";
                }


                // Close connection
                mysqli_close($conn);
            }
    ?>
            <div class="admin">
                <div class="topContainer">
                    <h1>You logged in as Administrator</h1>
                    <a class="logoutBtn" href="logout.php">Logout</a>
                </div>
                <div class="userContainer">
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Password</th>
                        </tr>
                        <?php read_data(); ?>
                    </table>
                </div>
            </div>
    <?php


        } else {
            header("HTTP/1.1 403 Forbidden");
            echo '<div style="text-align: center">';
            echo '<h1>403 forbidden</h1>';
            echo '<p>Login as Administrator first to access this page</p>';
            echo '</div>';
        }
    } else {
        $_SESSION['loggedInAsAdmin'] = false;
        header("Refresh:0");
    }


    ?>
</body>

</html>