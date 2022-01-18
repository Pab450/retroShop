<?php

namespace application\controller;

use application\Controller;
use application\Route;
use application\Session;

class HelloController
{
    /**
     * @var Session
     */
    private Session $session;

    public function __construct()
    {
        $this->session = new Session();

        echo '<p> le controller HelloController vient detre instancié</p>';
    }

    #[Route('foo/([0-9]*)/bar')]
	public function hello(string $name)
    {
		echo '<h1> Page HELLO !!! </h1>';
        echo '<h2> numéro de la page : '. $name.' </h2>';

        if(($counter = $this->session->getData('count')) !== null){
            $this->session->setData('count', $counter+1);
        }else{
            $this->session->setData('count', 0);
        }

        echo '<h3> compteur : '. $this->session->getData('count') .' </h3>';
        echo '<h3> Session ID : '. session_id() .' </h3>';
	}

    #[Route('foo/([a-z]*)/bar')]
	public function index($name)
    {
        echo '<h1> Page INDEX !!! </h1>';
        echo '<h2> nom de la page : '. $name.' </h2>';

        if(($counter = $this->session->getData('count')) !== null){
            $this->session->setData('count', $counter+1);
        }else{
            $this->session->setData('count', 0);
        }

        echo '<h3> compteur : '. $this->session->getData('count') .' </h3>';
    }

    #[Route('My/Super/Router')]
    public function mySuperPage()
    {
        $this->session->unsetData('count');
        $this->session->destroy();

        $variables = ['test' => 'bonjour'];
        extract($variables);
        ob_start();
        include("test.php");
        $output = ob_get_clean();

        echo $output;

        $variables = ['test' => 'bonjour 2'];
        extract($variables);
        ob_start();
        include("test.php");
        $output = ob_get_clean();

        var_dump($output);
    }
}