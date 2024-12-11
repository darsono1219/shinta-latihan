<?php
session_start();
session_unset();
session_destroy();
header("Location: quis1.php");
