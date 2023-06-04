<footer>
		<div class="tail container">
		    <?php
                if(isset($_SESSION["userUsername"]))
                {
                    echo "<p>You are logged in as " . $_SESSION["userUsername"] . "</p>";
                }
                else {
                    echo "<p>PixelTree©</p>";
                }
            ?>
		</div>
	</footer>

</body>
</html>