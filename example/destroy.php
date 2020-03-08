<?php
    session_start();
    session_unset();
    session_destroy();
    // ทำลาย Session
    echo "Destroy finish !";
?>