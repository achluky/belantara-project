<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	http://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['underconstruction'] = 'home/underconstruction';
$route['news/en/(:num)/(:num)/(:any)/(:any)'] = 'news/post/EN/$1/$2/$3/$4';
$route['news/id/(:num)/(:num)/(:any)/(:any)'] = 'news/post/ID/$1/$2/$3/$4';
$route['event/en/(:num)/(:num)/(:any)/(:any)'] = 'event/post/EN/$1/$2/$3/$4';
$route['event/id/(:num)/(:num)/(:any)/(:any)'] = 'event/post/ID/$1/$2/$3/$4';
$route['announcement/en/(:num)/(:num)/(:any)/(:any)'] = 'announcement/post/EN/$1/$2/$3/$4';
$route['announcement/id/(:num)/(:num)/(:any)/(:any)'] = 'announcement/post/ID/$1/$2/$3/$4';
$route['event/sitemap\.xml'] = "event/sitemap";
$route['news/sitemap\.xml'] = "news/sitemap";
$route['announcement/sitemap\.xml'] = "announcement/sitemap";
$route['staff/d/(:any)'] = 'staff/detail/$1';
$route['view/(:any)'] = 'view/index/$1';


// front end
$route['management'] = "home/management";
$route['boards'] = "home/boards";