<?php
include_once '../static/autoload.php';
$db = new dbView();
if (!isset($_POST['SearchBar'])) {
    $books = ($db->showUsers());
} else {
    $books = ($db->showfilteredUsers($_POST['drpdwn'], $_POST['SearchBar']));
}
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
    <nav class="top-0 fixed w-full h-14 items-center text-gray-700 bg-gray-100 dark:text-gray-400 dark:bg-gray-900">
        <a class="flex items-center float-left max-w-fit px-3 mt-3" href="../Pages/index.php?p=<?php echo 1; ?>">
            <svg class="w-8 h-8 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path d="M11 17a1 1 0 001.447.894l4-2A1 1 0 0017 15V9.236a1 1 0 00-1.447-.894l-4 2a1 1 0 00-.553.894V17zM15.211 6.276a1 1 0 000-1.788l-4.764-2.382a1 1 0 00-.894 0L4.789 4.488a1 1 0 000 1.788l4.764 2.382a1 1 0 00.894 0l4.764-2.382zM4.447 8.342A1 1 0 003 9.236V15a1 1 0 00.553.894l4 2A1 1 0 009 17v-5.764a1 1 0 00-.553-.894l-4-2z"/>
            </svg>
            <span class="ml-2 text-sm font-bold">BookDB</span>
        </a>
        <div class="w-full absolute h-14 flex flex-row flex-shrink justify-center align-center">
            <form method="post" class="w-[50%] h-full flex flex-row flex-shrink justify-center items-center">
                <label class="mr-2" for="drpdwn">Search: </label>
                <select id="drpdwn" name="drpdwn" class="text-center h-10 w-[5rem] grow text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <option class="dark:text-white" value="ID">Id</option>
                    <option class="dark:text-white" value="benutzername">Username</option>
                    <option class="dark:text-white" value="name">First Name</option>
                    <option class="dark:text-white" value="vorname">Last Name</option>
                    <option class="dark:text-white" value="email">E-mail</option>
                    <option class="dark:text-white" value="admin">other</option>
                </select>
                <label class="mx-2" for="SearchBar"> for: </label><input id="SearchBar" name="SearchBar" placeholder="Search Terms" class="p-4 pl-10 w-[30rem] h-10 text-sm basis-[50%] grow text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required type="search">
                <label class="mx-2" for="drpdwn2"> Sort by: </label>
                <select id="drpdwn2" name="drpdwn2" class="text-center h-10 w-[5rem] grow text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <option class="dark:text-white" value="ID">Id</option>
                    <option class="dark:text-white" value="benutzername">Username</option>
                    <option class="dark:text-white" value="name">First Name</option>
                    <option class="dark:text-white" value="vorname">Last Name</option>
                    <option class="dark:text-white" value="email">E-mail</option>
                    <option class="dark:text-white" value="admin">other</option>
                </select>
                <button type="submit" class="text-white bg-sky-400 hover:bg-sky-500 basis-[4%] h-10 ml-2 dark:bg-blue-700 dark:hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
            </form>
        </div>
    </nav>
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
                    echo "<tr class='divide-y divide-slate-700 w-full'>
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