 <head>
     <title>BücherDB</title>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script src="https://cdn.tailwindcss.com"></script>
     <link rel="stylesheet" href="../visual/css.css">
     <script src="../visual/js.js"></script>

 </head>

<?php
    session_start();
    session_regenerate_id();
    if(!isset($_SESSION["admin"])){
        echo "<meta http-equiv='refresh' content='0;url=login.php'>";
    }
