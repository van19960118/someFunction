<?php
/**
 * Created by PhpStorm.
 * User: j5521
 * Date: 2017/8/23
 * Time: 上午 09:36
 */

$target = "E:\\123jyb\Upload\\" .iconv("utf-8","gbk",$_POST["name"]) . '-' . $_POST['index'];
move_uploaded_file($_FILES['file']['tmp_name'], $target);

// Might execute too quickly.
sleep(0.5);

echo $target;
