<html lang="de" class="bg-slate-600">
    <?php include("../static/header.php") ?>
    <body>
    <?php include("../static/sidebar.php") ?>
    <div class="ml-44 mt-2 mr-4">
        <div class="flex flex-row flex-wrap h-full w-full gap-y-3 gap-x-2">
            <?php
            if(isset($_SESSION["admin"])){if(!$_SESSION["admin"]){
                for ($i = 0;$i < 20;$i++){
                    echo "<div class='basis-[24%] min-w-[20rem] grow h-96 shrink border-gray-900 rounded-lg p-2 border-4 border-solid'>
<div class='flex flex-col h-[100%] items-center'>
    <p class='grow basis-4/5 text-gray-300 max-h-[9.5%]'>Title: titleHere</p>
    <img src='../images/yes.png' class='text-gray-300 grow basis-4/5' height='100%' width='auto' alt='Failed to load'>
</div>
</div>";
                    }
                } else {
                for ($i = 0;$i < 20;$i++){
                    echo "<div class='basis-[24%] min-w-[20rem] grow h-96 shrink border-gray-900 rounded-lg p-2 border-4 border-solid'>
<div class='flex flex-col h-[95%] items-center'>
    <p class='grow basis-4/5 text-gray-300 max-h-[10%]'>Title: titleHere</p>
    <img src='../images/yes.png' class='text-gray-300 grow basis-4/5' height='100%' width='auto' alt='Failed to load'>
</div>
<div class='flex flex-col h-[5%] items-center'>
    <div class='h-[5%] grow shrink basis-4/5 gap-y-4'>
        <a href='Edit.php' class='text-gray-300 mr-2'>Edit</a><a href='Delete.php' class='text-gray-300 ml-2'>Delete</a>
    </div>
</div></div>";
                }
            }
            } else {
                for ($i = 0;$i < 20;$i++){
                    echo "<div class='basis-[24%] min-w-[20rem] grow h-96 shrink border-gray-900 rounded-lg p-2 border-4 border-solid'>
<div class='flex flex-col h-[100%] items-center'>
    <p class='grow basis-4/5 text-gray-300 max-h-[10%]'>Title: titleHere</p>
    <img src='../images/yes.png' class='text-gray-300 grow basis-4/5' height='100%' width='auto' alt='Failed to load'>
</div>
</div>";
                }
            }
            ?>
        </div>
    </div>
    </body>
</html>
