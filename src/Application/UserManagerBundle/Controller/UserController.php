<?php

namespace Application\UserManagerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller;
 
class UserController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('UserManagerBundle:User:index', array('name' => $name));
    }

    public function homeAction()
    {
        return $this->render('UserManagerBundle:User:home');
    }
}
