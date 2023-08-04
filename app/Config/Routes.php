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



/* Default Route */
$routes->get('home', 'SigninController::index');

/* Signup Controller Routes */
$routes->get('/new_register', 'SignupController::index');
$routes->match(['get', 'post'], 'new_register', 'SignupController::store');

/* Signin Controller Routes */
$routes->match(['get', 'post'], 'SigninController/loginAuth', 'SigninController::loginAuth');

/* Profile Controller Routes */
//$routes->get('/adminprofile', 'ProfileController::admin',['filter' => 'authGuard']);
//$routes->get('/ownerprofile', 'ProfileController::owner',['filter' => 'authGuard']);
$routes->get('/dashboard', 'ProfileController::login', ['filter' => 'authGuard']);

/* Seminar Controller Routes */
$routes->match(['get', 'post'], 'SeminarController/create', 'SeminarController::create');

/* Attendance Controller Routes */
$routes->match(['get', 'post'], 'preregister', 'AttendanceController::index');
$routes->match(['get', 'post'], 'preregister/success', 'AttendanceController::register');




if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}