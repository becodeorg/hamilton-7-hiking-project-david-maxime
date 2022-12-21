<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Hiking Manager</title>
</head>
<body>
<header>
    <h1 class="text-3xl ">Hiking Manager</h1>
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

    <?php if (!empty($_SESSION['user'])): ?>
        <span>Hello <?php echo $_SESSION['user']['username'] ?></span>
        <br>
        <a href="/addHike"><span>Add a new hike!</span></a>
        <a href="/myhikes"><span>Manage my hikes</span></a>
        <a href="/myprofile">See my profile</a>
    <?php endif; ?>
</header>

<h1>Hiking Manager</h1>