<?php
    include_once '../static/autoload.php';
    $db = new dbView();
    $books = ($db->showBooks());
    $fun = is_integer($_GET["p"]);
    if(!isset($_GET["p"])){
        $page = 1;
    } elseif($fun){
        $page = $_GET["p"];
    }
    if($page == 1){
        $pm = $page;
    } else{
        $pm = $page-1;
    }
    if((sizeof($books)/20) > $page){
        $pp = $page+1;
    } else{
        $pp = $page;
    }
    if ($page < 0 || $page > (sizeof($books)/20)){
        $page = 1;
    }
?>
<html lang="de" class="bg-slate-600">
    <?php include("../static/header.php") ?>
    <body>
    <?php include("../static/sidebar.php") ?>
    <nav class="top-0 fixed w-full h-14 items-center text-gray-700 bg-gray-100 dark:text-gray-400 dark:bg-gray-900">
        <a class="flex items-center w-full px-3 mt-3" href="../Pages/index.php">
            <svg class="w-8 h-8 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path d="M11 17a1 1 0 001.447.894l4-2A1 1 0 0017 15V9.236a1 1 0 00-1.447-.894l-4 2a1 1 0 00-.553.894V17zM15.211 6.276a1 1 0 000-1.788l-4.764-2.382a1 1 0 00-.894 0L4.789 4.488a1 1 0 000 1.788l4.764 2.382a1 1 0 00.894 0l4.764-2.382zM4.447 8.342A1 1 0 003 9.236V15a1 1 0 00.553.894l4 2A1 1 0 009 17v-5.764a1 1 0 00-.553-.894l-4-2z" />
            </svg>
            <span class="ml-2 text-sm font-bold">BookDB</span>
        </a>
        <?php
            echo "<a class='text-gray-300 float-right mr-4 mt-[-2rem]' href='index.php?p=$pp'>>></a>";
            echo "<a class='text-gray-300 float-right mr-12 mt-[-2rem]' href='index.php?p=$pm'><<</a>";
        ?>
    </nav>
    <div class="ml-44 mt-16 mr-4">
        <div class="flex flex-row flex-wrap h-full w-full gap-y-3 gap-x-2">
            <?php
            if(isset($_SESSION["admin"])){if(!$_SESSION["admin"]){
                foreach($books as $item) {
                    $id = $item["id"];
                    if($id > ($page-1) && $id < (($page*20)+1)){
                        $title = $item["kurztitle"]; $img = $item["foto"];
                    echo "<div class='basis-[24%] min-w-[20rem] grow h-96 shrink border-gray-900 rounded-lg p-2 border-4 border-solid'>
<div class='flex flex-col h-[100%] items-center'>
    <p class='grow basis-4/5 text-gray-300 max-h-[9.5%]'>Title: titleHere</p>
    <img src='../images/$img.png' class='text-gray-300 grow basis-4/5' height='auto' width='50%' alt='Failed to load'>
</div>
</div>";
                    }
                }
            } else {
                foreach($books as $item) {
                    $id = $item["id"];
                    if($id > ($page-1) && $id < (($page*20)+1)){
                        $title = $item["kurztitle"]; $img = $item["foto"];
                        echo "<div class='basis-[24%] min-w-[20rem] grow h-96 shrink border-gray-900 rounded-lg p-2 border-4 border-solid'>
<div class='flex flex-col h-[95%] items-center'>
    <p class='grow basis-4/5 text-gray-300 max-h-[10%]'>$title</p>
    <img src='../images/$img' class='text-gray-300 grow basis-4/5' height='auto' width='50%' alt='Failed to load'>
</div>
<div class='flex flex-col h-[5%] items-center'>
    <div class='h-[5%] grow shrink basis-4/5 gap-y-4'>
        <a href='Edit.php' class='text-gray-300 mr-2'>Edit</a><a href='Delete.php' class='text-gray-300 ml-2'>Delete</a>
    </div>
</div></div>";
                    }
                 }
                }
            }
            ?>
        </div>
    </div>
    </body>
</html>
