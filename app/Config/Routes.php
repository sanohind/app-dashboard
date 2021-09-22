<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/receipt-report', 'Purchase::receipt');
$routes->get('/invoice-report', 'Sales::invoice_report');
$routes->get('/invoice-print', 'Sales::invoice');
$routes->get('/shipment-report', 'Sales::shipment_report');
$routes->get('/invoice-set/(:alpha)/(:num)', 'Sales::set_invoice/$1/$2');
$routes->get('/inventory/(:alpha)', 'Inventory::stockbypart/$1');
$routes->get('/inventory/(:alpha)/lot', 'Inventory::lotdetail/$1');
$routes->get('/warehouse/(:alpha)', 'Inventory::stockbywarehouse/$1');
$routes->get('/inventory', 'Inventory::index');

//post
$routes->post('/invoice-print', 'Sales::print_invoice');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
