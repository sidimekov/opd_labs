<?php

session_start();
// $_SESSION = array();


// переменная для быстрого доступа к корню файлов
define("ROOT", dirname(__DIR__));

// данные для бд
const DB_HOST = 'localhost';
const DB_PORT = '8005';
const DB_NAME = 'studs';
const DB_USERNAME = 's409553';
const DB_PASSWORD = 'nWASInv7Uumwyf0P';

//const DB_TABLE_USERS = 'users';
//const DB_TABLE_TESTS = 'tests';
//const DB_TABLE_TESTINGS = 'testings';
//const DB_TABLE_GENDERS = 'genders';
//const DB_TABLE_ROLES = 'roles';
//const DB_TABLE_PIQS = 'piqs';
//const DB_TABLE_RATINGS = 'ratings';
//const DB_TABLE_PROFESSIONS = 'professions';

const DB_TABLE_USERS = 'opd_users';
const DB_TABLE_TESTS = 'opd_tests';
const DB_TABLE_TESTINGS = 'opd_testings';
const DB_TABLE_GENDERS = 'opd_genders';
const DB_TABLE_ROLES = 'opd_roles';
const DB_TABLE_PIQS = 'opd_piqs';
const DB_TABLE_RATINGS = 'opd_ratings';
const DB_TABLE_PROFESSIONS = 'opd_professions';