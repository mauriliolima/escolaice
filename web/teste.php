<?php
$tmp = '140316';
$data = date_create_from_format('dmy', $tmp);
echo date_format($data, "d/m/Y");

?>