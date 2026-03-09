<?php
$link = __DIR__.'/storage';
$target = __DIR__.'/../storage/app/public';

if (file_exists($link)) {
    echo "Symlink already exists.";
} else {
    if (symlink($target, $link)) {
        echo "Symlink created successfully!";
    } else {
        echo "Failed to create symlink.";
    }
}
