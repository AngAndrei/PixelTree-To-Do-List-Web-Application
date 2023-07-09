<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>FILS</title>

	<link rel="stylesheet" href="styles/bootstrap.css">
	<link rel="stylesheet" href="styles/styles.css">
</head>
<body>
	
	<div class="top">
        <div class="container">
            <div class="row">
                <div class="col-md-3 tree-logo">
                    <img src="img/logo-tree.png" class="logo">
                </div>
                <div class="col-md-6">
                    <ul class="navigation">
                        <?php
                            if(isset($_SESSION["userUsername"])) {
                                echo "<li><a href='news.php'>NEWS</a></li>";
                                echo "<li><a href='my-notes.php'>MY NOTES</a></li>";
                                echo "<li><a href='inc/log-out.inc.php'>LOG OUT</a></li>";
                            }
                            else {
                                echo "<li><a href='log-in.php'>LOG IN</a></li>";
                                echo "<li><a href='sign-up.php'>SIGN UP</a></li>";
                            }
                        ?>
                        <li><a href="contact.php">CONTACT</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                   <ul class="social">
                       <li><a href="https://www.facebook.com/"><img src="img/facebook.png"></a></li>
                       <li><a href="https://twitter.com/?lang=en"><img src="img/twitter.png"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    