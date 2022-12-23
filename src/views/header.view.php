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
        <nav class=" flex flex-row justify-between h-16 items-center">

            <!-- HOME LOGO/TITLE -->
            <section class=" title text-2xl font-bold uppercase text-green-800 flex justify-center mx-5">
                <a href="/">
                    <h1>Hiking Manager</h1>
                </a>
            </section>

            <?php if (empty($_SESSION['user'])) : ?>
                <!-- LINKS -->
                <ul class="flex flex-row justify-around font-semibold w-52 mx-3">

                    <!-- BUTTON - LOGIN -->
                    <li class="bg-green-800 w-24 h-8 flex justify-center items-center rounded-full text-white"><a href="/login">Login</a></li>

                    <!-- BUTTON - REGISTER -->
                    <li class="bg-slate-200 w-24 h-8 flex justify-center items-center rounded-full "><a href="/registration">Register</a></li>
                <?php else : ?>

                    <!-- BUTTON - LOGOUT -->
                    <li class="list-none bg-green-800 w-24 h-8 flex justify-center items-center rounded-full text-white mx-8""><a href=" /logout">Logout</a></li>
                <?php endif; ?>
                </ul>
        </nav>

        <?php if (!empty($_SESSION['user']) && $_SESSION['user']['isAdmin'] != 1) : ?>
            <span class="mx-5 text-2xl font-bold">Hello <?php echo $_SESSION['user']['nickname'] . "!" ?></span>
            <br>
            <a href="/addHike"><span class="text-white max-w-sm m-2 bg-slate-200 border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">Add a new hike!</span></a>
            <a href="/myhikes"><span class="text-white max-w-sm m-2 bg-slate-200 border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">Manage my hikes</span></a>
            <a href="/myprofile"><span class="text-white max-w-sm m-2 bg-slate-200 border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">See my profile</span></a>
        <?php endif; ?>
        <?php if (!empty($_SESSION['user']) && $_SESSION['user']['isAdmin'] === 1) : ?>
            <span>Hello <?php echo $_SESSION['user']['nickname'] ?></span>
            <br>
            <a href="/addHike"><span>Add a new hike!</span></a>
            <a href="/myprofile"><span>Admin Panel</span></a>
        <?php endif; ?>

        <section class="heroBgImage w-full h-[43rem] overflow-hidden relative">
            <img src="https://unsplash.it/1920/1080" alt="image/png">
        </section>
    </header>
</body>