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
        <table class="h-full w-full ">
            <tr>
                <th class='text-gray-300'><h3>Username</h3></th>
                <th class='text-gray-300'><h3>Email</h3></th>
                <th class='text-gray-300'><h3>First Name</h3></th>
                <th class='text-gray-300'><h3>Last Name</h3></th>
                <th class='text-gray-300'><h3>Gender</h3></th>
                <th class='text-gray-300'><h3>Birthday</h3></th>
                <th class='text-gray-300'>other</th>
            </tr>
            <?php
                for ($i = 0;$i < 20;$i++){
                    echo "<tr class='mr-auto ml-auto'>
            <th class='text-gray-300'>usernameHere</th>
            <th class='text-gray-300'>emailHere</th>
            <th class='text-gray-300'>fnameHere</th>
            <th class='text-gray-300'>lnameHere</th>
            <th class='text-gray-300'>N/A</th>
            <th class='text-gray-300'>bdayHere</th>
            <th><a href='Edit.php' class='text-gray-300 mr-2'>Edit</a><a href='Delete.php' class='text-gray-300 ml-2'>Delete</a></th>
    </tr>";
                }
           ?>
            </table>
        </div>
    </body>
</html>