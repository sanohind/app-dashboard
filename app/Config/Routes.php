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
$routes->get('/board', 'Home::index');
$routes->get('/board/(:any)', 'Home::index/$1');
$routes->get('/stock-monitor', 'Inventory::monitor');
$routes->get('/stock-monitor/(:any)', 'Inventory::monitor/$1');
$routes->get('/receipt-report', 'Purchase::receipt');
$routes->get('/sales-report', 'Sales::invoice_report');
$routes->get('/sales-detail-report', 'Sales::invoice_detail_report');
$routes->get('/invoice-print', 'Sales::invoice');
$routes->get('/shipment-report', 'Sales::shipment_report');
$routes->get('/invoice-set/(:alpha)/(:num)', 'Sales::set_invoice/$1/$2');
$routes->get('/planned-load', 'Logistic::planned_load');
$routes->get('/planned-load/(:any)', 'Logistic::planned_load/$1');
$routes->get('/inventory/(:alpha)', 'Inventory::stockbypart/$1');
$routes->get('/inventory/(:alpha)/lot', 'Inventory::lotdetail/$1');
$routes->get('/warehouse/(:segment)', 'Inventory::stockbywh/$1');
$routes->get('/inventory', 'Inventory::index');
$routes->get('/(:any)/inventory', 'Inventory::index/$1');
$routes->get('/stock-opname', 'Accounting::stock_opname');
$routes->get('/sto-scan-fg', 'Warehouse::stock_scan');
$routes->get('/sto-scan-rm', 'Warehouse::stock_scan_rm');
$routes->get('/data-scan/(:any)', 'Warehouse::getdatascan/$1');
$routes->get('/data-scan/(:any)/(:any)', 'Warehouse::getdatascan/$1/$2');
$routes->get('/auth', 'Auth::index');
$routes->get('/production/(:segment)/(:segment)', 'Production::index/$1/$2');
$routes->get('/shipment', 'Logistic::index');
$routes->get('/shipment/graph', 'Logistic::shipment_graph');
$routes->get('/shipment/graph/export', 'Logistic::shipment_graph_export');
$routes->get('/purchase', 'Purchase::index');
$routes->get('billable', 'Sales::billable');

//post
$routes->post('/invoice-print', 'Sales::print_invoice');
$routes->post('/scan-proses','Warehouse::scanproses');


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
