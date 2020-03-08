<?php
    session_start();
    $_SESSION['name'] = 'james';
    // กำหนด Session
    echo "page1 $_SESSION[name]";
?>