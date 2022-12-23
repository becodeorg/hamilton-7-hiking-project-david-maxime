<h2>Update profile</h2>

<form action="updateProfile" method="post">
    <div class="max-w-sm m-2 bg-slate-200 border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
        <label for="firstname">Firstname</label>
        <input type="text" name="firstname" value="<?php echo $_SESSION['user']['firstname'] ?>">
    </div>
    <div class="max-w-sm m-2 bg-slate-200 border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
        <label for="lastname">Lastname</label>
        <input type="text" name="lastname" value="<?php echo $_SESSION['user']['lastname'] ?>">
    </div>
    <div class="max-w-sm m-2 bg-slate-200 border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
        <label for="nickname">Nickname</label>
        <input type="text" name="nickname" value="<?php echo $_SESSION['user']['nickname'] ?>">
    </div>
    <div class="max-w-sm m-2 bg-slate-200 border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
        <label for="email">Email</label>
        <input type="email" name="email" value="<?php echo $_SESSION['user']['email'] ?>">
    </div>
    <div class="max-w-sm m-2 bg-slate-200 border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
        <label for="password">Password</label>
        <input type="password" name="password">
    </div>
    <button type="submit">Update !</button>
</form>