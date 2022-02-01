<?php

include_once 'Router.php';

$router = new Router($_GET['url']);

$router->get('/', function(){
	echo "hello world";
}); 

$router->get('/signin/', function(){
	echo "hello world";
});

$router->get('/signup/', function(){
	echo "hello world";
});

$router->get('/catalog/', function(){
	echo "hello world";
});

$router->get('/product/:id', function(){
	echo "hello world";
});

$router->get('/shoppingcart/', function(){
	echo "hello world";
});

/*
/ 

sign/in/
sign/up/
catalogue
contact
page produit


*/



$router->get('/', function(){ echo "Bienvenue sur ma homepage !"; }); 
$router->get('/posts/:id', function($id){ echo "Voila l'article $id"; }); 
$router->run(); 