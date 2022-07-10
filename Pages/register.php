<?php
include_once '../static/autoload.php';
$db = new dbView();
if (isset($_GET["log"])) {
    session_start();
    $_SESSION["admin"] = true;
    $_SESSION["page"] = "reg";
    $_SESSION["BPage"] = 1;
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
        <form class="flex flex-cols-1 flex-rows-4 flex-col h-full items-center gap-y-12 overflow-y" method="post"
              action="register.php">
            <svg class="w-24 h-24 ml-auto mr-auto stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <div class="w-full">
                <label for="userN" class="font-semibold pl-1 ml-auto mr-auto">Username</label>
                <input id="userN" name="userN" type="text" maxlength="50" placeholder="username"
                       class="w-full rounded bg-slate-800 pl-1 text-gray-300 border-solid border-gray-400"/>
            </div>
            <div class="w-full">
                <label for="fn" class="font-semibold pl-1 ml-auto mr-auto">First Name</label>
                <input id="fn" name="fn" type="text" maxlength="50" placeholder="First Name"
                       class="w-full rounded bg-slate-800 pl-1 text-gray-300 border-solid border-gray-400"/>
            </div>
            <div class="w-full">
                <label for="ln" class="font-semibold pl-1 ml-auto mr-auto">Last Name</label>
                <input id="ln" name="ln" type="text" maxlength="50" placeholder="Last Name"
                       class="w-full rounded bg-slate-800 pl-1 text-gray-300 border-solid border-gray-400"/>
            </div>
            <div class="w-full">
                <label for="em" class="font-semibold pl-1 ml-auto mr-auto">E-mail</label>
                <input id="em" name="em" type="email" maxlength="50" placeholder="Email"
                       class="w-full rounded bg-slate-800 pl-1 text-gray-300 border-solid border-gray-400"/>
            </div>
            <div class="w-full">
                <label for="pass" class="font-semibold pl-1 ml-auto mr-auto">Password</label>
                <input id="pass" name="pass" type="Password" placeholder="Password"
                       class="w-full rounded bg-slate-800 pl-1 text-gray-300 border-solid border-gray-400"/>
            </div>
            <div class="grow shrink bottom-0">
                <input type="submit" value="Register" name="register"
                        class="cursor-pointer rounded-md my w-20 h-8 text-lg font-semibold ml-auto mr-auto text-center bg-slate-500 text-gray-300 inset-x-0 bottom-0">
                </input>
                <a class="cursor-pointer rounded-md p-1 my w-24 h-12 text-lg font-semibold ml-auto mr-auto text-center bg-slate-500 text-gray-300 inset-x-0 bottom-0"
                   href="login.php">Log in</a>
            </div>


            <?php
            //error handler
            if (isset($_POST['register'])) {
                $error = "";
                if (isset($_POST['fn']) && !empty(trim($_POST['fn'])) && strlen(trim($_POST['fn'])) <= 100) {
                    $firstname = htmlspecialchars(trim($_POST['fn']));
                } else {
                    $error .= "Please enter a correct firstname.<br />";
                }
                if (isset($_POST['ln']) && !empty(trim($_POST['ln'])) && strlen(trim($_POST['ln'])) <= 100) {
                    $lastname = htmlspecialchars(trim($_POST['ln']));
                } else {
                    $error .= "Please enter a correct lastname.<br />";
                }
                if (isset($_POST['userN']) && !empty(trim($_POST['userN'])) && strlen(trim($_POST['userN'])) <= 45) {
                    $username = htmlspecialchars(trim($_POST['userN']));
                } else {
                    $error .= "Please enter a correct username.<br />";
                }
                if (isset($_POST['em']) && !empty(trim($_POST['em'])) && strlen(trim($_POST['em'])) <= 255) {
                    $email = htmlspecialchars(trim($_POST['em']));
                } else {
                    $error .= "Please enter a correct email.<br />";
                }
                if (isset($_POST['pass']) && !empty(trim($_POST['pass'])) && strlen(trim($_POST['pass'])) <= 255 && $_POST['pass']) {
                    $password = htmlspecialchars(trim($_POST['pass']));
                } else {
                    $error .= "Please enter a correct password.<br />";
                }

                $test = $db->showusername($_POST['userN']);
                // if user exists make an error
                foreach ($test as $item) {
                    if ($item['benutzername'] == $_POST['userN']) {
                        $error .= " user exists";
                    }
                }
                if (empty($error)) {
                    $password_hash = password_hash($password, PASSWORD_DEFAULT);
                    $db->makeuser($username, $lastname, $firstname, $password_hash, $email);
                    echo '<meta http-equiv="refresh" content="0;url=Index.php">';
                } else {
                    echo $error;
                }
            }
            ?>
        </form>
    </div>
</div>
</body>
</html>
