<?php
    session_start();
    $numericAlphaRegex = "/^(?=.*[a-zA-Z])(?=.*[0-9])/";
    $allUsernameValues = GetColumn("username");
    $allPasswordValues = GetColumn("password");

    function GetColumn($columnName) {
        include "../../connection.php";

        $sql = "SELECT * FROM users";
        $result = $mysqli -> query($sql);
    
        $myArray = array();
    
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result -> fetch_array(MYSQLI_ASSOC)) {
                array_push($myArray, $row[$columnName]);
            }
        } else {
            echo "0 results";
        }

        // Free result set
        $result -> free_result();

        $mysqli -> close();
    
        return $myArray;
    }

    function GetRow($value) {
        include "../../connection.php";

        $sql = "SELECT * FROM users WHERE username = '" . $value . "'";
        $result = $mysqli -> query($sql);
    
        // Associative array
        $row = $result -> fetch_assoc();

        // Free result set
        $result -> free_result();

        $mysqli -> close();
    
        return $row;
    }

    if (isset($_POST["submit"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Check username validation
        if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
            $usernameError = "Username must be in email form";
        }
        else {
            // Check username correction
            if (!in_array($username, $allUsernameValues)) {
                $usernameError = "Username does not exist";
            }
            else {
                // Check password validation
                // Min 8 char
                if (strlen($password) < 8) {
                    $passwordError = "Password must have at least 8 characters";
                }
                // Numbers + letters
                else if (!preg_match($numericAlphaRegex, $password)) {
                    $passwordError = "Password must contain both numbers and letters";
                }
                // At least 1 uppercase
                else if ($password === strtolower($password)) {
                    $passwordError = "Password must have at least 1 uppercase characters";
                }
                else {
                    if ($password !== $allPasswordValues[array_search($username, $allUsernameValues)]) {
                        $passwordError = "Password is incorrect";
                    }            
                    
                    else {
                        $_SESSION["user"] = GetRow($username);
                        setcookie("is-logged-in", true, time() + 86400 * 30);
                        unset($_SESSION["usernameError"]);
                        unset($_SESSION["passwordError"]);
                        header("Location: http://localhost/index.php?page=home");
                        exit();
                    }
                }
            }
        }

        $_SESSION["username"] = $username;
        $_SESSION["password"] = $password;
        $_SESSION["usernameError"] = $usernameError;
        $_SESSION["passwordError"] = $passwordError;

        header("Location: http://localhost/index.php?page=login");
        exit();
    }
?>