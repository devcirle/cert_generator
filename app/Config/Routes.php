<?php

namespace Config;

$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('SigninController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();

/* 
 * --------------------------------------------------------------------
 * ROUTES 
 * --------------------------------------------------------------------
 */
$routes->get('api/getUserSeminars/(:num)', 'Api::getUserSeminars/$1');

//********************

$routes->get('home', 'AccountController::index');
$routes->match(['get', 'post'], 'loginAuth', 'AccountController::loginAuth');
$routes->match(['get', 'post'], 'dashboard', 'AccountController::login', ['filter' => 'authGuard']);
$routes->get('addAccount', 'AccountController::addAccount');
$routes->match(['get', 'post'], 'addAccount', 'AccountController::storeAccount');

//********************


/* Seminar Controller Routes */
$routes->match(['get', 'post'], 'SeminarController/create', 'SeminarController::create');

/* Attendance Controller Routes */
$routes->get('/', 'AttendanceController::index');
$routes->match(['get', 'post'], 'preregister', 'AttendanceController::viewseminars');
$routes->match(['get', 'post'], 'preregister/success', 'AttendanceController::register');




if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}