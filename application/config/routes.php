<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = 'inicio';
$route['404_override'] = "";
$route[''] = "Inicio";
$route['nosotros'] = "Inicio/nosotros";
$route['servicios'] = "Inicio/servicios";
$route['clientes'] = "Inicio/clientes";
$route['contacto'] = "Inicio/contacto";
$route['enviaContacto'] = "Inicio/enviaContacto";
$route['servicio/(:any)'] = "Inicio/servicio/$1";


/* End of file routes.php */
/* Location: ./application/config/routes.php */