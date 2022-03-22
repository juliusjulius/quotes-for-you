<?php
include "./login/ActionRegister.php";

$reg = new ActionRegister();

if ($reg->checkData($_POST)) {
    echo "true";
}else {
    echo "false";
}
