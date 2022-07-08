<?php
if (!$_SESSION["admin"]) {
    echo "<meta http-equiv='refresh' content='0;url=index.php'>";
}
    include_once '../static/autoload.php';
    if (isset($_POST["pass1"]) && isset($_POST["pass2"]) && isset($_POST["uName"])){
        if ($_POST["pass1"] == $_POST["pass2"]){
            echo "<script> async function a {alert(`Password reset`) }</script>";
            echo "<meta http-equiv='refresh' content='0;url=login.php'>";
        } else {
            echo "<script> alert(`Passwords don't match`)</script>";
        }
    }
?>
<html lang="de" class="dark:bg-slate-600">
    <head>
        <title>BücherDB</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body>
        <div class="m-auto mt-[5%] p-2 min-h-fit min-w-fit rounded-lg w-[30rem] h-[22%] bg-slate-800">
            <form method="post" class="text-gray-300 min-h-fit min-w-fit flex flex-col w-full h-full">
                <div class="my-3">
                    <label for="uName">Username</label>
                    <input id="uName" name="uName" type="text" maxlength="50" placeholder="Password" class="w-full rounded dark:bg-slate-800 pl-1 dark:text-gray-300 border-solid dark:border-gray-400" required />
                </div>
                <div class="my-3">
                    <label for="pass1">New Password</label>
                    <input id="pass1" name="pass1" type="Password" placeholder="Password" class="w-full rounded dark:bg-slate-800 pl-1 dark:text-gray-300 border-solid dark:border-gray-400" required />
                </div>
                <div class="my-3">
                    <label for="pass2">New Password</label>
                    <input id="pass2" name="pass2" type="Password" placeholder="Password" class="w-full rounded dark:bg-slate-800 pl-1 text-gray-300 border-solid dark:border-gray-400" required />
                </div>
                <button type="submit" class="cursor-pointer rounded-md p-1 my w-40 h-12 text-lg font-semibold ml-auto mr-auto text-center bg-slate-150 dark:bg-slate-500 dark:text-gray-300 inset-x-0 ">Change Password</button>
            </form>
        </div>
    </body>
</html>