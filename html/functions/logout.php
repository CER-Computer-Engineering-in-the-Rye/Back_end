<?php

session_start();
unset($_SESSION['user_idx']);

mysqli_close($conn);