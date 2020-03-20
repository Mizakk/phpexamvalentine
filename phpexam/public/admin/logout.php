<?php
require_once '../../functions/utils.php';
session_start();
$_SESSION = [];
redirect('/index.php');