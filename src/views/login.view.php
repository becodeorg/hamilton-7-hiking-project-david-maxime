<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body>
    <main class="flex justify-center items-center  h-screen">
        <section class="container bg-yellow-500 w-[30rem] h-[48rem] rounded-3xl flex justify-center items-center">
            <div class="content bg-red-600 w-[26rem] h-[36rem] flex flex-col justify-center items-center">

                <!-- TITLE - LOGIN -->
                <h2 class="text-5xl font-text-red-900 mb-8 font-bold uppercase">Login</h2>

                <!-- FORM -->
                <form action="login" method="post">
                    <div>
                        <label for="nickname">Nickname</label>
                        <input type="text" name="nickname" class="border-2 border-green-900">
                    </div>
                    <div>
                        <label for="password">Password</label>
                        <input type="password" name="password" class="border-2 border-green-900">
                    </div>
                    <button type="submit" class="bg-green-900 text-white">Login !</button>
                </form>
            </div>
        </section>
    </main>
</body>

</html>