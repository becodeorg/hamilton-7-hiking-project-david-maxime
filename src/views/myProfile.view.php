<h2>My profile</h2>
<span class="max-w-sm m-2 bg-slate-200 border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">Username: <?php echo $_SESSION['user']['nickname']?></span>
<br>
<span class="max-w-sm m-2 bg-slate-200 border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">Email: <?php echo $_SESSION['user']['firstname']?></span>
<br>
<span class="max-w-sm m-2 bg-slate-200 border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">Email: <?php echo $_SESSION['user']['lastname']?></span>
<br>
<span class="max-w-sm m-2 bg-slate-200 border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">Email: <?php echo $_SESSION['user']['email']?></span>
<br>
<a href="/updateProfile"><button>Update my profile</button></a>