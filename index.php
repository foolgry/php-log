<?php

require "./log3.php";

$warn = new stdClass();
$warn->aa = "warn";

log3::debug([1,3,4,65,5]);
log3::info(3);
log3::error("err");
log3::warn($warn);

echo 'test';


