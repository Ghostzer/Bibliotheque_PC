<?php

namespace mpc\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller {

    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $ouvrages = $em->getRepository('mpcPlatformBundle:Ouvrage')->findAll();

        return $this->render('mpcPlatformBundle:Default:index.html.twig', array('ouvrages' => $ouvrages,
        ));
    }

}
