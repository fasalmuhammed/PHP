<?php
$con = pg_connect("host=localhost user=postgres password=mamo dbname=login");
if ($con) {
    echo "Successfully Connected.";
} else {
    echo "Error Connecting to the database";
}

if ($_POST) {
    $usrname = pg_escape_string($con, $_POST['username']);
    $passwd = pg_escape_string($con, $_POST['password']);

    $qry = "SELECT Username, Password FROM login_dt WHERE Username='$usrname' AND Password='$passwd'";
    $result = pg_query($con, $qry);

    if (!$result) {
        echo "Query Error: " . pg_last_error($con);
    } else {
        $row = pg_fetch_row($result);

        if ($row) {
            echo "<br>Hello $usrname, You are Logged Successfully...";
        } else {
            echo "<br> Incorrect username or password";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .login-container {
            width: 300px;
            margin: 0 auto;
            margin-top: 100px;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin: 10px 0;
        }

        label {
            display: block;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .login-button {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="login-button">Login</button>
        </form>
    </div>
</body>
</html>
