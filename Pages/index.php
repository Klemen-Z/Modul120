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
<p class='h-[10%] text-gray-300'>Title: titleHere</p>
<div class='h-[90%w]'>
    <img src='../images/yes.png' class='text-gray-300' height='100%' width='auto' alt='Failed to load'>
</div>
</div>";
                    }
                } else {
                for ($i = 0;$i < 20;$i++){
                    echo "<div class='basis-[24%] min-w-[20rem] grow h-96 shrink border-gray-900 rounded-lg p-2 border-4 border-solid'>
<p class='h-[10%] text-gray-300'>Title: titleHere</p>
<div class='h-[90%w]'>
    <img src='../images/yes.png' class='text-gray-300' height='100%' width='auto' alt='Failed to load'>
</div>
</div>";
                }
            }
            } else {
                for ($i = 0;$i < 20;$i++){
                    echo "<div class='basis-[24%] min-w-[20rem] grow h-96 shrink border-gray-900 rounded-lg p-2 border-4 border-solid'>
<p class='h-[10%] text-gray-300'>Title: titleHere</p>
<div class='h-[90%]'>
    <img src='../images/yes.png' class='text-gray-300' height='100%' width='auto' alt='Failed to load'>
</div>
</div>";
                }
            }
            ?>
        </div>
    </div>
    </body>
</html>
