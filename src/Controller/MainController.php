<?php
// src/Controller/MainController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class MainController extends AbstractController
{
	/**
    * @Route("/")
    */
    public function home()
    {
        if( $this->container->get( 'security.authorization_checker' )->isGranted( 'IS_AUTHENTICATED_FULLY' ) )
        {

            $iduser = $this->container->get('security.token_storage')->getToken()->getUser()->getId();

            return $this->render('Main/index.html.twig', array('id' => $iduser));
        }
        return $this->render('Main/index.html.twig');
    }

 	/**
    * @Route("/test")
    */
    public function test()
    {
       
        return new Response(" test"
        );
     }
}