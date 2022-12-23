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

        <!-- CONTAINER -->
        <section class="container bg-gradient-to-t from-slate-300 to-slate-200 shadow-lg shadow-slate-500/50 w-[30rem] h-[48rem] rounded-3xl flex justify-center items-center">

        <!-- CONTENT -->
            <div class="content w-[26rem] h-[36rem] flex flex-col justify-center items-center">

                <!-- TITLE - LOGIN -->
                <h2 class="text-5xl font-text-red-900 mb-8 font-bold uppercase">Login</h2>

                <!-- FORM -->
                <form action="login" method="post" class=" h-48 w-full flex flex-col justify-between">
                    <div class="">
                        
                        <!-- <label for="nickname" class="invisible">Nickname</label> -->
                        <input type="text" name="nickname" placeholder="Nickname" class="border hover:border-2 border-green-900 w-full h-12 rounded-lg px-4">
                    </div>
                    <div>
                        <!-- <label for="password" class="invisible">Password</label> -->
                        <input type="password" name="password" placeholder="Password" class="border hover:border-2 border-green-900 w-full h-12 rounded-lg px-4">
                    </div>
                    <button type="submit" class="bg-green-900 hover:bg-slate-900 text-white text-xl font-bold w-full h-12 rounded-full">Login !</button>
                </form>
            </div>
        </section>
    </main>
</body>

</html>