<?php


// Affichage des erreurs PHP
error_reporting(E_ALL);
ini_set("display_errors", 1);

define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/..'));

require APPLICATION_PATH . '/lib/autoload.php';
require APPLICATION_PATH . '/config.php';

//Démarrage de la session en PHP
session_start();

// Initialisation du Router afin de capter les URLs disponibles
$router = new Router();

// Page d'accueil
$router->addRoute(array(
    'route'  => '^/$',
    'GET'   => array('IndexController', 'index') // Classe IndexController, Méthode index
));

$router->addRoute(array(
    'route'  => '^/admin$',
    'GET'   => array('AdminController', 'index') // Classe IndexController, Méthode index
));

$router->addRoute(array(
    'route'  => '^/admin/users$',
    'GET'   => array('AdminUserController', 'index') // Classe IndexController, Méthode index
));

$router->addRoute(array(
    'route'  => '^/admin/users/add$',
    'ALL'   => array('AdminUserController', 'add') // Classe IndexController, Méthode index
));


$router->addRoute(array(
    'route'  => '^/admin/users/update$',
    'ALL'   => array('AdminUserController', 'update') // Classe IndexController, Méthode index
));

// modification
// product
$router->addRoute(array(
    'route'  => '^/admin/products$',
    'GET'   => array('AdminProductsController', 'index') // Classe IndexController, Méthode index
));

$router->addRoute(array(
    'route'  => '^/admin/products/add$',
    'ALL'   => array('AdminProductsController', 'add') // Classe IndexController, Méthode index
));

$router->addRoute(array(
    'route'  => '^/admin/products/update$',
    'ALL'   => array('AdminProductsController', 'update') // Classe IndexController, Méthode index
));

$router->addRoute(array(
    'route'  => '^/admin/products/delete$',
    'ALL'   => array('AdminProductsController', 'delete') // Classe IndexController, Méthode index
));
//fin modification product


// Authentification des membres
$router->addRoute(array(
    'route'  => '^/admin/login$',
    'GET'   => array('AdminController', 'login') // Classe MembreController, Méthode login
));

// Authentification des membres - envoie des données en POST
$router->addRoute(array(
    'route'  => '^/admin/login$',
    'POST'   => array('AdminController', 'loginPost') // Classe MembreController, Méthode loginPost
));

// Déconnexion de l'espace membre
$router->addRoute(array(
    'route'  => '^/admin/logout$',
    'GET'   => array('AdminController', 'logout')
));

$router->run();
