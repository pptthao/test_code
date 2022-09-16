<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//trang chu
// $route['default_controller'] = 'CHome';

$route['home'] = 'CHome';

$route['monctdt']   = 'Cmonctdt';
$route['datatable']   = 'Cdatatable';

$route['default_controller'] = 'Cdatatable';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;