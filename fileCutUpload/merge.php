<?php

//修改最大执行时间
ini_set('max_execution_time', '86400');
//修改此次最大运行内存
ini_set('memory_limit','2048M');

$target = "E:\\123jyb\\Upload\\" .iconv("utf-8","gbk",$_POST["name"]);
$dst = fopen($target, 'wb');

for($i = 0; $i < $_POST['index']; $i++) {
    $slice = $target . '-' . $i;
    $src = fopen($slice, 'rb');
    stream_copy_to_stream($src, $dst);
    fclose($src);
    unlink($slice);
}

fclose($dst);

echo $target;
