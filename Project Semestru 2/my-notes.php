<?php
    include_once 'inc/header.php';
?>

<div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                   <?php
                    echo "<a href=''>". $_SESSION["userUsername"] . "'s NOTES</a>";
                   ?>
                </div>
            </div>
        </div>
    </div>

    <div class="notes home">
        <div class="container">
           <div class="container-image">
                <div class="row">
                    <div class="col-md-12">
                        <div class="notes-container">
                            
                        </div>
                        <button class="button-41" role="button">Add Task</button>
                        <div id="myProgress">
                              <div id="progressbar">0/7</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        var username = "<?php echo $_SESSION['userUsername']; ?>";
    </script>
    <script src="js/script.js">
    </script>
<?php
    include_once 'inc/footer.php';
?>