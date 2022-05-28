<?php
session_start();
session_destroy();
header('location: http://groupproject/admin/pages/login.php');