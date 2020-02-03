<?php
session_start();

$authorized = false;

# LOGOUT
if (isset($_GET['logout']) && !isset($_GET["login"]) && isset($_SESSION['auth']))
{
    $_SESSION = array();
    unset($_COOKIE[session_name()]);
    session_destroy();
    echo "logging out...";
}

# checkup login and password
if (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW']))
{
    $user = 'test';
    $pass = 'test';
    if (($user == $_SERVER['PHP_AUTH_USER']) && ($pass == ($_SERVER['PHP_AUTH_PW'])) && isset($_SESSION['auth']))
    {
    $authorized = true;
    }
}

# login
if (isset($_GET["login"]) && !$authorized ||
# relogin
    isset($_GET["login"]) && isset($_GET["logout"]) && !isset($_SESSION['reauth']))
{
    header('WWW-Authenticate: Basic Realm="Login please"');
    header('HTTP/1.0 401 Unauthorized');
    $_SESSION['auth'] = true;
    $_SESSION['reauth'] = true;
    echo "Login now or forever hold your clicks...";
    exit;
}
$_SESSION['reauth'] = null;
?>
<h1>you have <? echo ($authorized) ? (isset($_GET["login"]) && isset($_GET["logout"]) ? 're' : '') : 'not '; ?>logged!</h1>