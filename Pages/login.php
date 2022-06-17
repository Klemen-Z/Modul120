<?php
    if(isset($_SESSION["admin"])){
        session_destroy();
    } elseif (isset($_GET["log"])){
        session_start();
        $_SESSION["admin"] = true;
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
    }
?>
<html lang="de" class="bg-slate-600">
    <head>
        <title>BücherDB</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body>
        <div class="m-auto mt-[5%] p-2 min-h-fit min-w-fit rounded-lg w-[30rem] h-[80%] bg-slate-800">
            <div class="text-gray-300 min-h-fit min-w-fit w-full h-full">
                <div class="flex flex-cols-1 flex-rows-4 flex-col h-full items-center gap-y-12">
                    <svg class="w-24 h-24 ml-auto mr-auto stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div class="w-full">
                        <label for="userN" class="font-semibold pl-1 ml-auto mr-auto">Username</label>
                        <input id="userN" type="text" maxlength="50" placeholder="username" class="w-full rounded bg-slate-800 pl-1 text-gray-300 border-solid border-gray-400" />
                    </div>
                    <div class="w-full">
                        <label for="userP" class="font-semibold pl-1 ml-auto mr-auto">Password</label>
                        <input id="userP" type="Password" placeholder="Password" class="w-full rounded bg-slate-800 pl-1 text-gray-300 border-solid border-gray-400" />
                    </div>
                    <div class="grow shrink bottom-2 pt-[70%]">
                        <a class="cursor-pointer rounded-md p-1 my w-24 h-12 text-lg font-semibold ml-auto mr-auto text-center bg-slate-500 text-gray-300 inset-x-0 bottom-0" href="login.php?log=true">Log in</a>
                        <a class="cursor-pointer rounded-md p-1 my w-24 h-12 text-lg font-semibold ml-auto mr-auto text-center bg-slate-500 text-gray-300 inset-x-0 bottom-0" href="register.php">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>