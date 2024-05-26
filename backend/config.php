<?php

session_start();
// $_SESSION = array();


// переменная для быстрого доступа к корню файлов
define("ROOT", dirname(__DIR__));

// данные для бд
const DB_HOST = 'localhost';
const DB_PORT = '3306';
const DB_NAME = '';
const DB_USERNAME = '';
const DB_PASSWORD = '';

const DB_TABLE_USERS = 'users';
const DB_TABLE_TESTS = 'tests';
const DB_TABLE_TESTINGS = 'testings';
const DB_TABLE_GENDERS = 'genders';
const DB_TABLE_ROLES = 'roles';
const DB_TABLE_PIQS = 'piqs';
const DB_TABLE_RATINGS = 'ratings';

//const DB_TABLE_USERS = 'opd_users';
//const DB_TABLE_TESTS = 'opd_tests';
//const DB_TABLE_TESTINGS = 'opd_testings';
//const DB_TABLE_GENDERS = 'opd_genders';
//const DB_TABLE_ROLES = 'opd_roles';
//const DB_TABLE_PIQS = 'opd_piqs';
//const DB_TABLE_RATINGS = 'opd_ratings';