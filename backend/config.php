<?php

session_start();
// $_SESSION = array();


// переменная для быстрого доступа к корню файлов
define("ROOT", dirname(__DIR__));

// данные для бд
const DB_HOST = 'localhost';
const DB_PORT = '3306';
const DB_NAME = 'testlabs';
const DB_USERNAME = 'root';
const DB_PASSWORD = '';