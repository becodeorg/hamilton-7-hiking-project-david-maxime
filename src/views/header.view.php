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
<!-- TITLE -->
    <section class="text-3xl font-bold uppercase bg-slate-500 text-white flex justify-center">
        <h1>Hiking Manager</h1>
    </section>

<!-- NAV -->
    <nav class="bg-slate-300">
        <ul class="flex flex-row justify-around font-semibold">
            <!-- HOME -->
            <li><a href="/">Home</a></li>
            <?php if (empty($_SESSION['user'])): ?>

                <!-- LOGIN -->
                <li><a href="/login">Login</a></li>

                <!-- REGISTER -->
                <li><a href="/registration">Register</a></li>
            <?php else: ?>

                <!-- LOGOUT -->
                <li><a href="/logout">Logout</a></li>
            <?php endif; ?>
        </ul>
    </nav>

<!-- WHEN LOGGED -->
    <?php if (!empty($_SESSION['user'])): ?>
        <span>Hello <?php echo $_SESSION['user']['username'] ?></span>
        <br>
        <a href="/addHike"><span>Add a new hike!</span></a>
        <a href="/myhikes"><span>Manage my hikes</span></a>
        <a href="/myprofile">See my profile</a>
    <?php endif; ?>
</header>