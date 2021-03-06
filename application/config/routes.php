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

/*empresa url*/
require_once( BASEPATH .'database/DB.php' );
$db =& DB();
$query = $db->get( 'empresa' );
$result = $query->result();
foreach( $result as $row )
{
    $route[$row->url]                 = "empresa/index/{$row->id}";
    $route[ $row->url.'/(:any)' ]         = "empresa/$1/{$row->id}";
  //  $route[ $row->controller ]           = 'error404';
   // $route[ $row->controller.'/:any' ]   = 'error404';
}

$route['default_controller'] = 'home';
$route['404_override'] = 'erros/page404';
$route['translate_uri_dashes'] = FALSE;

/* Administrador */
$route['login_adm'] = 'admin/administrador/login';
$route['admin/logout_adm'] = 'admin/administrador/logout';
$route['acessar_adm'] = 'admin/administrador/acessar';
$route['registro_adm'] = 'admin/administrador/cadastro';
$route['cadastrar_adm'] = 'admin/administrador/cadastrar';
$route['admin/cadastro_efetuado/(:num)'] = 'admin/administrador/cadastro_efetuado/$1';
$route['cadastro_completo'] = 'admin/administrador/cadastro_completo';
$route['cadastrar_completo'] = 'admin/administrador/cadastrar_completo';

/*menu administrador*/
$route['admin/_(:any)'] = 'admin/home/$1';


