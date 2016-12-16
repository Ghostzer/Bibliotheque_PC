<?php

namespace mpc\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use mpc\PlatformBundle\Entity\Reservation;

class DefaultController extends Controller {

    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $bds = $em->getRepository('mpcPlatformBundle:Bd')->findBy([], ['date' => 'ASC']); //trie par date
        $livres = $em->getRepository('mpcPlatformBundle:Livre')->findBy([], ['date' => 'ASC']); //trie par date
        $cds = $em->getRepository('mpcPlatformBundle:Cd')->findBy([], ['date' => 'ASC']); //trie par date
        

        return $this->render('mpcPlatformBundle:Default:index.html.twig', array('bds' => $bds, 'livres' => $livres, 'cds' => $cds
        ));
    }

    public function mesReservationsAction(Request $request) {

        $em = $this->getDoctrine()->getManager();
        
        $id_select = $request->get('id');
        $datetoday = new \DateTime();

        $objet = $em->getRepository('mpcPlatformBundle:Ouvrage')->find($id_select);
        
        $reservation = new Reservation;
        
        $reservation->setOuvrage($objet);
        $reservation->SetDate($datetoday);

        $em->persist($reservation);

        $reservation->setDate($datetoday);

        $em->flush();
        
        
        return $this->render('mpcPlatformBundle:Default:ajout_reservations_ok.html.twig');
    }
    
    
    public function listeReservationAction() {
        $em = $this->getDoctrine()->getManager();

        $reservations = $em->getRepository('mpcPlatformBundle:Reservation')->findAll();
        
        return $this->render('mpcPlatformBundle:Default:mesreservations.html.twig', array('reservations' => $reservations,
        ));
    }
    
}