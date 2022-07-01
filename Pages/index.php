<?php
include_once '../static/autoload.php';
$db = new dbView();
if (!isset($_POST['SearchBar'])) {
    $books = ($db->showBooks());
} else {
    $books = ($db->showfilteredBooks($_POST['drpdwn'], $_POST['SearchBar']));
}
if (!isset($_GET["p"]) || !filter_input(INPUT_GET, "p", FILTER_VALIDATE_INT)) {
    $page = 1;
} else {
    $page = $_GET["p"];
}
if ($page == 1) {
    $pm = $page;
} else {
    $pm = $page - 1;
}
if ((sizeof($books) / 20) > $page) {
    $pp = $page + 1;
} else {
    $pp = $page;
}
if ($page < 0 || $page > (sizeof($books) / 20)) {
    $page = 1;
}
?>
<html lang="de" class="dark:bg-slate-600">
<?php include("../static/header.php") ?>
<body>
<?php include("../static/sidebar.php") ?>
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
                <option class="dark:text-white" value="id">Id</option>
                <option class="dark:text-white" value="katalog">Katalog</option>
                <option class="dark:text-white" value="nummer">Nummer</option>
                <option class="dark:text-white" value="kurztitle">Kurztitel</option>
                <option class="dark:text-white" value="kategorie">Kategorie</option>
                <option class="dark:text-white" value="verkauft">Verkauft</option>
                <option class="dark:text-white" value="kaufer">Kaufer</option>
                <option class="dark:text-white" value="autor">Autor</option>
                <option class="dark:text-white" value="title">Title</option>
                <option class="dark:text-white" value="verfasser">Verfasser</option>
                <option class="dark:text-white" value="zustand">Zustand</option>
            </select>
            <label class="mx-2" for="SearchBar"> for: </label><input id="SearchBar" name="SearchBar" placeholder="Search Terms" class="p-4 pl-10 w-[30rem] h-10 text-sm basis-[50%] grow text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required type="search">
            <label class="mx-2" for="drpdwn2"> Sort by: </label>
            <select id="drpdwn2" name="drpdwn2" class="text-center h-10 w-[5rem] grow text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                <option class="dark:text-white" value="id">Id</option>
                <option class="dark:text-white" value="katalog">Katalog</option>
                <option class="dark:text-white" value="nummer">Nummer</option>
                <option class="dark:text-white" value="kurztitle">Kurztitel</option>
                <option class="dark:text-white" value="kategorie">Kategorie</option>
                <option class="dark:text-white" value="verkauft">Verkauft</option>
                <option class="dark:text-white" value="kaufer">Kaufer</option>
                <option class="dark:text-white" value="autor">Autor</option>
                <option class="dark:text-white" value="title">Title</option>
                <option class="dark:text-white" value="verfasser">Verfasser</option>
                <option class="dark:text-white" value="zustand">Zustand</option>
            </select>
            <button type="submit" class="text-white bg-sky-400 hover:bg-sky-500 basis-[4%] h-10 ml-2 dark:bg-blue-700 dark:hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
        </form>
    </div>
    <?php
    echo "<a class='float-right mr-4 pb-[.25rem] mt-3 text-center w-10 border-solid border-2 rounded-lg border-gray-slate-150 dark:border-gray-slate-800 dark:hover:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-700' href='index.php?p=$pp'> >> </a>";
    echo "<a class='float-right mr-2 pb-[.25rem] mt-3 text-center w-10 border-solid border-2 rounded-lg border-gray-slate-150 dark:border-gray-slate-800 dark:hover:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-700' href='index.php?p=$pm'> << </a>";
    ?>
</nav>
<div class="ml-44 mt-16 mr-4">
    <div class="flex flex-row flex-wrap h-full w-full gap-y-3 gap-x-2">
        <?php
        if (isset($_SESSION["admin"])) {
            if (!$_SESSION["admin"]) {
                foreach ($books as $key => $item) {
                    if ($key > ($page - 1) * 20 && $key < (($page * 20) + 1)) {
                        $title = $item["kurztitle"];
                        $img = $item["foto"];
                        echo "<a href='index.php?p=$page&id=$key' class='basis-[24%] cursor-pointer min-w-[20rem] grow h-96 shrink border-gray-100 dark:border-gray-900 rounded-lg p-2 border-4 border-solid'>
<div class='flex flex-col h-[100%] items-center'>
    <p class='grow basis-4/5 dark:text-gray-300 max-h-[9.5%]'>$title</p>
    <img src='../images/$img' class='dark:text-gray-300 grow basis-4/5 max-w-[196.5px]' height='auto' width='55%' alt='Failed to load'>
</div>
</a>";
                    }
                }
            } else {
                foreach ($books as $key => $item) {
                    if ($key > ($page - 1) * 20 && $key < (($page * 20) + 1)) {
                        $title = $item["kurztitle"];
                        $img = $item["foto"];
                        echo "<div class='basis-[24%] min-w-[20rem] grow h-96 shrink border-gray-100 dark:border-gray-900 rounded-lg p-2 border-4 border-solid'>
<a class='flex flex-col h-[95%] items-center cursor-default' href='index.php?p=$page&id=$key'>
    <p class='grow basis-4/5 dark:text-gray-300 max-h-[10%]'>$title</p>
    <img src='../images/$img' class='dark:text-gray-300 grow basis-4/5 max-w-[196.5px]' height='auto' width='50%' alt='Failed to load'>
</a>
<div class='flex flex-col h-[5%] items-center'>
    <div class='h-[5%] grow shrink basis-4/5 gap-y-4'>
        <a href='NonUsable.php' class='dark:text-gray-300 mr-2'>Edit</a><a href='NonUsable.php' class='dark:text-gray-300 ml-2'>Delete</a>
    </div>
</div></div>";
                    }
                }
            }
        }
        ?>
        <?php
        if (isset($_GET["id"]) && filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT)) {
            foreach ($books as $key => $item) {
                if ($_GET['id'] == $key) {
                    $item = $books[$key];
                    $pTitle = $item["title"];
                    $pIMG = $item["foto"];
                    $category = $item["kategorie"];
                    $author = $item["autor"];
                    $catalog = $item["katalog"];
                    $condition = $item["zustand"];
                    $writers = $item["verfasser"];
                    $buyer = $item["kaufer"];
                    if ($item["verkauft"] = 1) {
                        $sold = "Sold";
                    } else {
                        $sold = "Not sold";
                    }
                    echo "
                        <div class='mt-[3%] w-[88%] h-full fixed'>
                        <div class='m-auto min-w-[50rem] min-h-[40rem] w-[70%] h-[80%] border-gray-100 dark:border-gray-900 dark:bg-slate-800 border-4 border-solid rounded-lg'>
                        <div class='grid grid-cols-4 grid-rows-6 items-center h-full w-full'>
                        <p class='basis-4/5 col-span-3 text-center dark:text-gray-300 p-1'>$pTitle</p>
                        <div class='text-center dark:text-gray-300'>
                        <a href='index.php?p=$page'>close</a>
                        </div>
                        <img class='basis-4/5 ml-2 row-span-5 dark:text-gray-300' src='../images/$pIMG' alt='Failed to load'/>
                        <div class='flex flex-col row-span-5 col-span-2 ml-10'>
                        <h1 class='text-xl basis-4/5 dark:text-gray-300'>Category: $category</h1>
                        <h1 class='text-xl basis-4/5 dark:text-gray-300'>Catalog: $catalog</h1>
                        <h1 class='text-xl basis-4/5 dark:text-gray-300'>Writers: $writers</h1>
                        <h1 class='text-xl basis-4/5 dark:text-gray-300'>Buyer: $buyer</h1>
                        <h1 class='text-xl basis-4/5 dark:text-gray-300'>Status: $sold</h1>
                        </div>
                        </div>
                        </div>
                        </div>
";
                }
            }
        }
       ?>
</body>
</html>
