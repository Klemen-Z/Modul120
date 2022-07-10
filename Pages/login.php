<?php
session_start();
include_once '../static/sidebar.php';
include_once '../static/autoload.php';
$db = new dbView();

?>
    <html lang="de" class="dark:bg-slate-600">
    <head>
        <title>BücherDB</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body>
    <div class="m-auto mt-[5%] p-2 min-h-fit min-w-fit rounded-lg w-[30rem] h-[80%] bg-slate-800">
        <div class="text-gray-300 min-h-fit min-w-fit w-full h-full">
            <form class="flex flex-cols-1 flex-rows-4 flex-col h-full items-center gap-y-12" method="post"
                  action="login.php">
                <svg class="w-24 h-24 ml-auto mr-auto stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <div class="w-full h-[10%]">
                    <label for="username" class="font-semibold pl-1 ml-auto mr-auto">Username</label>
                    <input id="username" name="username" type="text" maxlength="50" placeholder="username"
                           class="w-full rounded dark:bg-slate-800 pl-1 dark:text-gray-300 border-solid dark:border-gray-400"/>
                </div>
                <div class="w-full h-[10%]">
                    <label for="password" class="font-semibold pl-1 ml-auto mr-auto">Password</label>
                    <input id="password" name="password" type="Password" placeholder="Password"
                           class="w-full rounded dark:bg-slate-800 mb-5 pl-1 dark:text-gray-300 border-solid border-gray-400"/>
                    <a href="NonUsable.php"
                       class="cursor-pointer rounded-md p-1 w-10 h-8 text-sm text-center dark:bg-slate-500 dark:text-gray-300">Forgot
                        password?</a>
                </div>
                <div class="grow shrink bottom-2 pt-[70%]">
                    <Button type="submit" value="login"
                            class="cursor-pointer rounded-md my w-20 h-8 text-lg font-semibold ml-auto mr-auto text-center bg-slate-150 dark:bg-slate-500 dark:text-gray-300 inset-x-0 bottom-0">
                        Log in
                    </Button>
                    <a class="cursor-pointer rounded-md p-1 my w-24 h-12 text-lg font-semibold ml-auto mr-auto text-center bg-slate-150 dark:bg-slate-500 dark:text-gray-300 inset-x-0 bottom-0"
                       href="register.php">Register</a>
                </div>
            </form>

<?php

if (isset($_POST['password']) && isset($_POST['username'])) {
    $error = '';
    $message = '';
// username
    if (!empty(trim($_POST['username'])) && !preg_match("/(?=.*[a-z])(?=.*[A-Z])[a-zA-Z]{6,}/", $_POST['username'])) {
        $username = trim($_POST['username']);
        if (strlen($username) >= 255) {
            $error .= "Der Benutzername entspricht nicht dem geforderten Format.<br />";
        }
    } else {
        $error .= "Geben Sie bitte den Benutzername an.<br />";
    }
// password
    if (!empty(trim($_POST['password']) && !preg_match("/(?=^.{8,}$)((?=.*\d+)(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/", $_POST['password']))) {
        $password = trim($_POST['password']);
    } else {
        $error .= "Geben Sie bitte das Passwort an.<br />";
    }

// kein fehler
    if (empty($error)) {
        $results = $db->showpassword($username);
        if (isset($results['0'])) {
            $results = $results['0'];
            $result = $results['passwort'];
            if (password_verify($password, $result)) {
                $_SESSION['admin'] = $results['admin'];
                $_SESSION['username'] = $username;

                echo "<meta http-equiv='refresh' content='0;url=index.php'>";
            } else {
                echo "<a>wrong password</a>";
            }
        }else {echo "<a>user doesnt exist</a>";}
    }
}
?>
        </div>
    </div>
    </body>
    </html>

