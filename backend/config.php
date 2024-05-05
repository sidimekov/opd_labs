<?php

session_start();
// $_SESSION = array();


// переменная для быстрого доступа к корню файлов
define("ROOT", dirname(__DIR__));

// данные для бд
const DB_HOST = '192.168.0.110';
const DB_PORT = '3306';
const DB_NAME = 'opd_africa_savers';
const DB_USERNAME = 'admin_tima';
const DB_PASSWORD = 'qwer1234';