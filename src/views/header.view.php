<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hiking Manager</title>
</head>
<body>
<header>
    <nav>
        <ul>
            <li><a href="/">Home</a></li>
            <?php if (empty($_SESSION['user'])): ?>
                <li><a href="/login">Login</a></li>
                <li><a href="/registration">Register</a></li>
            <?php else: ?>
                <li><a href="/logout">Logout</a></li>
            <?php endif; ?>
        </ul>
    </nav>

    <?php if (!empty($_SESSION['user']) && $_SESSION['user']['isAdmin'] === 0): ?>
        <span>Hello <?php echo $_SESSION['user']['nickname'] ?></span>
        <br>
        <a href="/addHike"><span>Add a new hike!</span></a>
        <a href="/myhikes"><span>Manage my hikes</span></a>
        <a href="/myprofile">See my profile</a>
    <?php endif; ?>
    <?php if (!empty($_SESSION['user']) && $_SESSION['user']['isAdmin'] === 1): ?>
        <span>Hello <?php echo $_SESSION['user']['nickname'] ?></span>
        <br>
        <a href="/addHike"><span>Add a new hike!</span></a>
        <a href="/myprofile"><span>Admin Panel</span></a>
    <?php endif; ?>
</header>

<h1>Hiking Manager</h1>