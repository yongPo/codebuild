<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/******** Admin************/
$route['cb-admin'] = 'admin/dashboards';
$route['cb-admin/list/page'] = 'admin/pages';
$route['cb-admin/create/page'] = 'admin/pages/save';
$route['cb-admin/edit/page/(:any)'] = 'admin/pages/edit/$1';

/************ POST *************/
$route['posts/index'] = 'posts/index';
$route['posts/create'] = 'posts/create';
$route['posts/update'] = 'posts/update';
$route['posts/(:any)'] = 'posts/view/$1';
$route['posts'] = 'posts/index';

$route['default_controller'] = 'pages/view';

/************ CATEGORIES *************/
$route['categories'] = 'categories/index';
$route['categories/delete/(:any)'] = 'categories/delete/$1';
$route['categories/create'] = 'categories/create';
$route['categories/posts/(:any)'] = 'categories/posts/$1';

$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;