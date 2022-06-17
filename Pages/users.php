<?php
include_once '../static/autoload.php';
$db = new dbView();
$users = ($db->showUsers());
$_SESSION["page"] = "user";
?>
<html lang="de" class="bg-slate-600">
    <?php
        include("../static/header.php");
        if(!$_SESSION["admin"]){
            echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        }
    ?>
    <body>
    <?php include("../static/sidebar.php"); ?>
    <div class="ml-44 mt-2 mr-4">
        <table class="h-full w-full border-collapse">
            <tr class="border-solid border-x-1">
                <th class='text-gray-300 border-solid border-x-1'><h3>Username</h3></th>
                <th class='text-gray-300 border-solid border-x-1'><h3>Email</h3></th>
                <th class='text-gray-300 border-solid border-x-1'><h3>First Name</h3></th>
                <th class='text-gray-300 border-solid border-x-1'><h3>Last Name</h3></th>
                <th class='text-gray-300 border-solid border-x-1'><h3>Admin</h3></th>
                <th class='text-gray-300 border-solid border-x-1'>other</th>
            </tr>
            <?php
                foreach ($users as $item){
                    $uname = $item["benutzername"]; $email = $item["email"]; $fname = $item["name"];
                    $lname = $item["vorname"]; $admin = $item["admin"];
                    echo "<tr class='border-solid border-b-1'>
            <th class='text-gray-300'>$uname</th>
            <th class='text-gray-300'>$email</th>
            <th class='text-gray-300'>$fname</th>
            <th class='text-gray-300'>$lname</th>
            <th class='text-gray-300'>$admin</th>
            <th class=''><a href='Edit.php' class='text-gray-300 mr-2'>Edit</a><a href='Delete.php' class='text-gray-300 ml-2'>Delete</a></th>
    </tr>";
                }
           ?>
            </table>
        </div>
    </body>
</html>