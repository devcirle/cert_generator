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



$routes->get('home', 'AccountController::index');
$routes->match(['get', 'post'], 'loginAuth', 'AccountController::loginAuth');
$routes->match(['get', 'post'], 'admindashboard', 'AccountController::login');
$routes->match(['get', 'post'], 'ownerdashboard', 'AccountController::login');
$routes->get('addAccount', 'AccountController::addAccount');
$routes->match(['get', 'post'], 'addAccount', 'AccountController::storeAccount');

$routes->get('setAccount', 'AccountController::setAccount');
$routes->match(['get', 'post'], 'setAccount', 'AccountController::updateAccountRole');

$routes->get('updateAccount', 'AccountController::updateAccountView');
$routes->match(['get', 'post'], 'updateAccount', 'AccountController::updateAccountCredentials');


$routes->get('cert-test', 'DataController::certViewTest');
$routes->match(['get', 'post'], 'cert-test', 'DataController::getCertificate');



$routes->match(['get', 'post'], 'SeminarController/create', 'SeminarController::create');

$routes->get('/', 'AttendanceController::index');
$routes->match(['get', 'post'], 'events', 'AttendanceController::eventspage');

$routes->match(['get', 'post'], 'attendance', 'AttendanceController::attendanceView');
$routes->match(['get', 'post'], 'attendance/success', 'AttendanceController::doAttendance');

$routes->match(['get', 'post'], 'preregister', 'AttendanceController::viewseminars');
$routes->match(['get', 'post'], 'preregister/success', 'AttendanceController::register');

$routes->match(['get', 'post'], 'certificates', 'AttendanceController::certificates');

$routes->get('datatable', 'DataController::index');
$routes->get('datatable/get_data', 'DataController::get_data');


$routes->get('search/perform_search', 'Search::perform_search');
$routes->post('seminar/cancel/(:num)', 'SeminarController::cancel/$1');

$routes->post('seminar/viewDetails/(:num)', 'DataController::viewSeminarDetails/$1');

$routes->post('seminar/viewSeminars/(:num)', 'DataController::viewSeminarByOwner/$1');

$routes->post('seminar/viewAttendees/(:num)', 'DataController::viewAttendeesFullyAttended/$1');

$routes->get('success', 'AttendanceController::preRegSuccess');

$routes->get('ownerUpdate/(:any)', 'AccountController::ownerAccountUpdate/$1');


$routes->get('updateData', 'DataController::updateDataView');
$routes->post('updateData/uploadImage', 'DataController::uploadImage');

$routes->get('viewOwners', 'DataController::viewAllOwners');



if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}