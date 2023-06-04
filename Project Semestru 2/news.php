<?php
    include_once 'inc/header.php';
?>

<div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a href="">NEWS</a>
                </div>
            </div>
        </div>
    </div>

<div class="home">
        <div class="news container">
          <?php
                if(isset($_SESSION["userUsername"])) {
                    echo "<h2>Hello " . $_SESSION["userUsername"] . "! Nice to see you again!</h2>";
                }
            ?>
           
        </div>
        <div class="icon">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="title">
                        <img src="img/pixel-apple-tree.png" alt="">
                        <h2>New sign up System</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, deserunt?
                        Read more</p>
                        <a href="" class="btn btn-success">Read MoRE</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="title">
                        <img src="img/pixel-brad.png" alt="">
                        <h2>New log in System</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, deserunt?
                        Read more</p>
                        <a href="" class="btn btn-success">Read MoRE</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="title">
                        <img src="img/pixel-apple-tree.png" alt="">
                        <h2>Update Progress Bar</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, deserunt?
                        Read more</p>
                        <a href="" class="btn btn-success">Read More</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="title">
                        <img src="img/pixel-brad.png" alt="">
                        <h2>New users record</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, deserunt?
                        Read more</p>
                        <a href="" class="btn btn-success">Read MoRE</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

<?php
    include_once 'inc/footer.php';
?>