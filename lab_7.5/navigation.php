<?php if (isset($_SESSION['username'])) : ?>
    &#10084; <a href="viewprofile.php">View Profile</a><br />
    &#10084; <a href="editprofile.php">Edit Profile</a><br />
    &#10084; <a href="logout.php">Log Out (<?= $_SESSION['username'] ?>)</a>
<?php else : ?>
    &#10084; <a href="login.php">Log In</a><br />
    &#10084; <a href="signup.php">Sign Up</a>
<?php endif; ?>