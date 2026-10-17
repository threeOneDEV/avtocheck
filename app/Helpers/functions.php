<?php

function file_size_mb(string $publicPath): string
{
    $full = public_path($publicPath);

    if (!is_file($full)) {
        return '0 МБ';
    }

    return round(filesize($full) / 1048576, 1) . ' МБ';
}