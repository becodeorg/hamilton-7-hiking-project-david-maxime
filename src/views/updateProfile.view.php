<h2>Update profile</h2>

<form action="updateProfile" method="post">
    <div>
        <label for="firstname">Firstname</label>
        <input type="text" name="firstname" value="<?php echo $_SESSION['user']['firstname'] ?>">
    </div>
    <div>
        <label for="lastname">Lastname</label>
        <input type="text" name="lastname" value="<?php echo $_SESSION['user']['lastname'] ?>">
    </div>
    <div>
        <label for="nickname">Nickname</label>
        <input type="text" name="nickname" value="<?php echo $_SESSION['user']['nickname'] ?>">
    </div>
    <div>
        <label for="email">Email</label>
        <input type="email" name="email" value="<?php echo $_SESSION['user']['email'] ?>">
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" name="password">
    </div>
    <button type="submit">Update !</button>
</form>