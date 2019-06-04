<?php
// 秒 sec
echo date("Y-m-d H:i:s") ." 現在\n";
echo date("Y-m-d H:i:s", strtotime("-3 sec")) ." 3秒前\n";
echo date("Y-m-d H:i:s", strtotime("-2 sec")) ." 2秒前\n";
echo date("Y-m-d H:i:s", strtotime("-1 sec")) ." 1秒前\n";
echo date("Y-m-d H:i:s", strtotime("1 sec")) ." 1秒後\n";
echo date("Y-m-d H:i:s", strtotime("2 sec")) ." 2秒後\n";
echo date("Y-m-d H:i:s", strtotime("3 sec")) ." 3秒後\n\n";
?>
