<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
header("Location: projectcoen161.php#home"); // Redirecting To Home Page
}
?>