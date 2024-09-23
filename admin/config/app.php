<?php
// error 0 untuk production, 1 untuk development
error_reporting(1);

session_start();

require 'database.php';
require 'controller.php';
require 'helper.php';
