<?php
    include_once 'inc/header.php';
?>

<div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a href="">LOG IN</a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="log-in">
        <div class="container">
           <h1>Log In Here</h1>
            <div class="row">
                <div class="col-md-12">
                    <form action="inc/login.inc.php" method="post">
                        <input type="text" name="uid" placeholder="Username/Email">
                        <input type="password" name="pwd" placeholder="Password">
                        <button type="submit" name="submit">Log In</button>
                    </form>
                </div>
            </div>
            <?php
                if(isset($_GET["error"])) {
                    if($_GET["error"] == "emptyinput") {
                        echo "<p>Fill in all fields!</p>";
                    }
                    else if($_GET["error"] == "wronglogin") {
                        echo "<p>Invalid login info.</p>";
                    }
                }
            ?>
        </div>
    </div>

<?php
    include_once 'inc/footer.php';
?>