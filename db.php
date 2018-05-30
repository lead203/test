<?php 

require "libs/rb.php";
R::setup( 'mysql:host=test;dbname=cookbook',
        'root', '' );

session_start();