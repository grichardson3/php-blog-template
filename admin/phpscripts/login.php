<?php
	function logIn($username, $password) {
        if (isset($_POST['submit'])) {
            require_once("phpscripts/connect.php");

            $userid = mysqli_real_escape_string($link, $_POST['username']);
            $pass = mysqli_real_escape_string($link, $_POST['password']);

            if (empty($userid) || empty($pass)) {
                header("Location: login.php?login=empty");
                exit();
            } else {
                $sql = "SELECT * FROM tbl_users WHERE user_userid='$userid'";
                $result = mysqli_query($link, $sql);
                $resultCheck = mysqli_num_rows($result);
                if ($resultCheck < 1) {
                    header("Location: login.php?login=no-results");
                    exit();
                } else {
                    if ($row = mysqli_fetch_assoc($result)) {
                        //De-Hashing the password
                        $hashedPassCheck = password_verify($pass, $row['user_pass']);
                        if ($hashedPassCheck == false) {
                            header("Location: login.php?login=user-or-password-incorrect");
                            exit();
                        } elseif ($hashedPassCheck == true) {
                            // Lock in the user here
                            $_SESSION['u_id'] = $row['user_id'];
                            $_SESSION['u_first'] = $row['user_first'];
                            $_SESSION['u_last'] = $row['user_last'];
                            $_SESSION['u_email'] = $row['user_email'];
                            $_SESSION['u_userid'] = $row['user_userid'];
                            $_SESSION['u_userlevel'] = $row['user_userlevel'];
                            header("Location: dashboard.php");
                            exit();
                        }
                    }
                }
            }
        } else {
            header("Location: login.php?login=error");
            exit();
        }
	}
?>