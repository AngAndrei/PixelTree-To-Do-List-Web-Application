<?php
    include_once 'inc/header.php';
?>

<div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a href="">SIGN UP</a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="sign-up">
        <div class="container">
           <h1>Sign Up Here</h1>
            <div class="row">
                <div class="col-md-12">
                    <form action="inc/signup.inc.php" method="post">
                        <input type="text" name="username" placeholder="Username">
                        <input type="text" name="email" placeholder="Email">
                        <input type="password" name="pwd" placeholder="Password">
                        <input type="password" name="pwdRepeat" placeholder="Repeat password">
                        <button type="submit" name="submit">Sign Up</button>
                    </form>
                </div>
            </div>
            <?php
                if(isset($_GET["error"])) {
                    if($_GET["error"] == "emptyinput") {
                        echo "<p>Fill in all fields!</p>";
                    }
                    else if($_GET["error"] == "invaliduid") {
                        echo "<p>Choose another username.</p>";
                    }
                    else if($_GET["error"] == "invalidemail") {
                        echo "<p>Email does not exist.</p>";
                    }
                    else if($_GET["error"] == "passwordsdontmatch") {
                        echo "<p>Password does not match</p>";
                    }
                    else if($_GET["error"] == "stmtfailed") {
                        echo "<p>Something went wrong, try again.</p>";
                    }
                    else if($_GET["error"] == "usernametaken") {
                        echo "<p>Username already taken.</p>";
                    }
                    else if($_GET["error"] == "none") {
                        echo "<p>Signed up successfuly!</p>";
                    }
                }
            ?>
        </div>
    </div>



<?php
    include_once 'inc/footer.php';
?>