<h2>My profile</h2>
<span>Username: <?php echo $_SESSION['user']['nickname']?></span>
<br>
<span>Email: <?php echo $_SESSION['user']['email']?></span>
<br>
<a href="/updateProfile"><button>Update my profile</button></a>