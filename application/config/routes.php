<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/******** Admin************/
$route['cb-admin'] = 'admin/dashboards';

/*PAGES*/
$route['cb-admin/list/page'] = 'admin/pages';
$route['cb-admin/create/page'] = 'admin/pages/save';
$route['cb-admin/edit/page/(:any)'] = 'admin/pages/edit/$1';
$route['cb-admin/view/page/'] = 'admin/pages/list';
$route['cb-admin/delete/page/(:any)'] = 'admin/pages/delete/$1';

/*SLIDER*/
$route['cb-admin/create/slides'] = 'admin/slider/save';
$route['cb-admin/slides/category'] = 'admin/slider/categoryList';

/*CATEGORY*/
$route['cb-admin/category/datatable/(:any)']['GET'] = 'admin/categories/datatable/$1';
$route['cb-admin/category/save']['POST'] = 'admin/categories/save';
$route['cb-admin/category/edit']['GET'] = 'admin/categories/edit';
$route['cb-admin/category/update']['POST'] = 'admin/categories/update';
$route['cb-admin/category/delete']['POST'] = 'admin/categories/delete';
$route['cb-admin/category/(:any)']['GET'] = 'admin/categories/index/$1';

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

$route['page/shortcode'] = 'shortcode/index';

/***** View Page *****/
$route['(:any)'] = 'default/home_controller/index/$1';

