<?php
function message($status, $message)
{
    session_start();
    if ($status === "success") {
        $_SESSION["success"] = $message;
    } else {
        $_SESSION["erorr"] = $message;
    }
    $_SESSION[$status] = $message;
}
