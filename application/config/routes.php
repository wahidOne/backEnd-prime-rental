<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
// auth admnistrator
$route['administrator/sign-in'] = 'admin/auth/auth/index';
$route['administrator/sign-up'] = 'admin/auth/auth/signUp';
$route['administrator/sign-out'] = 'admin/auth/auth/signOut';

// adminitrator page
$route['administrator/dashboard'] = 'admin/dashboard/Dashboard/index';
$route['administrator/system-management/menu'] = 'admin/dashboard/System/menu';
$route['administrator/system-management/tambah-menu'] = 'admin/dashboard/System/tambahMenu';
$route['administrator/system-management/ubah-menu'] = 'admin/dashboard/System/UbahMenu';
$route['administrator/system-management/delete-menu/(:any)'] = 'admin/dashboard/System/deleteMenu/$1';
// submenu
$route['administrator/system-management/submenu'] = 'admin/dashboard/System/showSubmenu';
$route['administrator/system-management/add-submenu'] = 'admin/dashboard/System/addSubmenu';
$route['administrator/system-management/update-submenu/(:any)'] = 'admin/dashboard/System/updateSubmenu/$1';
$route['administrator/system-management/delete-submenu/(:any)'] = 'admin/dashboard/System/deleteSubmenu/$1';

// $route['administrator/system-management/get-menu-where/(:any)'] = 'admin/dashboard/System/getMenuWhere/$1';
$route['404_override'] = 'Page404/index';
$route['translate_uri_dashes'] = FALSE;
