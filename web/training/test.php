 $files = scandir("./");
    unset($files[array_search('index.php', $files , true)]);
    unset($files[0]);
    unset($files[1]);

    foreach($files as $link) {
        $menu = explode(".",$link);
        $menu = $link[1];
       echo "<a href='$link'>$link</a>";
    }