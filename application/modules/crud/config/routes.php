<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
|--------------------------------------------------------------------------
| Remove the default route set by the module extensions
|--------------------------------------------------------------------------
|
| Normally by default this route is accepted:
|
| module/controller/method
|
| If you do not want to allow access via that route you should add:
|
| $route['module'] = "";
| $route['module/(:any)'] = "";
|
*/
$route['crud'] = "";
//$route['crud/(:any)'] = "";
/*
|--------------------------------------------------------------------------
| Routes to accept
|--------------------------------------------------------------------------
|
| Map all of your valid module routes here such as:
|
| $route['your/custom/route'] = "controller/method";
|
*/
$route['crud'] = "crud/index";
$route['crud/add'] = "crud/add";
$route['crud/update/(:num)'] = "crud/update";
$route['crud/delete/(:num)'] = "crud/delete";
// Original version would have to have yourmodule at the start of the route for the routes.php to be read
$route['crud/crud'] = "crud/index";
$route['crud/crud/add'] = "crud/add";
$route['crud/crud/update/(:num)'] = "crud/update";
$route['crud/crud/delete/(:num)'] = "crud/delete";