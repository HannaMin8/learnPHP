<?php

// if (is_dir('files/p1')) {
//     rmdir('files/p1');
// }
// if (is_dir('files/p2')) {
//     rmdir('files/p2');
// }
// if (is_dir('files/p3')) {
//     rmdir('files/p3');
// }
// if (is_dir('files/p0/p2')) {
//     rmdir('files/p0/p2');
// }
// if (is_dir('files/p0')) {
//     rmdir('files/p0');
// }



// mkdir('files/p0', 0777, true);
// mkdir('files/p1', 0777);
// var_dump(is_dir('files/p1'), is_file('files/p1'), file_exists('files/p1'));

// rename('files/p1', 'files/p2');

// //copy('files/p2', 'p2');

// var_dump(getcwd());
// chdir('files');
// var_dump(getcwd());
// mkdir('p3');

// echo __DIR__;
/*
$dirHandler = opendir('files');

$r1 = readdir($dirHandler);
var_dump($r1);
rewinddir($dirHandler);

while (($r = readdir($dirHandler)) !== false) {
    var_dump($r);
}

closedir($dirHandler);

function readDirectory(string $dirName) {
    $dirName = opendir($dirName);

    $r1 = readdir($dirName);
    //var_dump($r1);

    while (($r = readdir($dirName)) !== false) {
        var_dump($r);
    } 

    closedir($dirName);
}
readDirectory('files');
*/
function readDirectory($dir) {
    $dirHandler = opendir($dir);

    while (($r = readdir($dirHandler)) !== false) {
       
        if ($r == "." || $r == "..") {
            continue;
        }
       
        $fullPath = $dir . '/' . $r;

        if (is_dir($fullPath)) {
            echo "Директория: $fullPath\n";
            readDirectory($fullPath);
        } else {
            echo "Файл: $fullPath\n";
        }
    }

    closedir($dirHandler);
}

readDirectory('files');
