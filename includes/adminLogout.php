<?php
	session_start();
	session_destroy();
    session_unset();
	header('Location: ../admin/prijava/prijava.php?');
?>