<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Hiking Manager</title>
</head>

<body>
    <header>
        <!-- NAV -->
        <nav class="bg-slate-300 flex flex-row justify-between h-12 items-center">

            <!-- HOME LOGO/TITLE -->
            <section class=" title text-2xl font-bold uppercase text-blue-900 flex justify-center mx-5">
                <a href="/">
                    <h1>Hiking Manager</h1>
                </a>
                <?php if (empty($_SESSION['user'])) : ?>
            </section>

            <!-- LINKS -->
            <ul class="flex flex-row justify-around font-semibold w-52 mx-3">

                <!-- LOGIN -->
                <li class="bg-green-700 w-24 h-8 flex justify-center items-center rounded-full text-white"><a href="/login">Login</a></li>

                <!-- REGISTER -->
                <l class="bg-slate-200 w-24 h-8 flex justify-center items-center rounded-full "><a href="/registration">Register</a></l>
            <?php else : ?>

                <!-- LOGOUT -->
                <li><a href="/logout">Logout</a></li>
            <?php endif; ?>
            </ul>
        </nav>

        <!-- WHEN LOGGED -->
        <?php if (!empty($_SESSION['user'])) : ?>
            <span>Hello <?php echo $_SESSION['user']['username'] ?></span>
            <br>
            <a href="/addHike"><span>Add a new hike!</span></a>
            <a href="/myhikes"><span>Manage my hikes</span></a>
            <a href="/myprofile">See my profile</a>
        <?php endif; ?>
    </header>