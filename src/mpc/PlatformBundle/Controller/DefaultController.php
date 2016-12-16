<?php

namespace mpc\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use mpc\PlatformBundle\Entity\Reservation;
use mpc\PlatformBundle\Entity\Utilisateurs;

class DefaultController extends Controller {

    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $bds = $em->getRepository('mpcPlatformBundle:Bd')->findBy([], ['date' => 'DESC']); //trie par date
        $livres = $em->getRepository('mpcPlatformBundle:Livre')->findBy([], ['date' => 'DESC']); //trie par date
        $cds = $em->getRepository('mpcPlatformBundle:Cd')->findBy([], ['date' => 'DESC']); //trie par date


        return $this->render('mpcPlatformBundle:Default:index.html.twig', array('bds' => $bds, 'livres' => $livres, 'cds' => $cds
        ));
    }

    public function ajoutReservationsAction(Request $request) {

        $em = $this->getDoctrine()->getManager();

        $id_select = $request->get('id');
        $datetoday = new \DateTime();

        $objet = $em->getRepository('mpcPlatformBundle:Ouvrage')->find($id_select);

        $reservation = new Reservation;

        $reservation->setOuvrage($objet);
        $reservation->SetDate($datetoday);

        $em->persist($reservation);

        $reservation->setDate($datetoday);

        //jusqu'ici ça fonctionne sans setter l'user
        
//        $currentuser = $this->getUser();
//        $finduser = $em->getRepository('mpcPlatformBundle:Utilisateurs')->find($currentuser);
//        $add_user = new Reservation;
//        $add_user = setUtilisateur($utilisateur);

//        $em->persist($add_user);


        $em->flush();


//        return $this->render('mpcPlatformBundle:Default:ajout_reservations_ok.html.twig', array('currentuser' => $currentuser, 'finduser' => $finduser));
        return $this->render('mpcPlatformBundle:Default:ajout_reservations_ok.html.twig');
    }

    public function mesReservationAction() {
        $em = $this->getDoctrine()->getManager();

        $reservations = $em->getRepository('mpcPlatformBundle:Reservation')->findAll();

        return $this->render('mpcPlatformBundle:Default:mesreservations.html.twig', array('reservations' => $reservations,
        ));
    }

    public function listeReservationAction() {
        $em = $this->getDoctrine()->getManager();

        $reservations = $em->getRepository('mpcPlatformBundle:Reservation')->findAll();

        return $this->render('mpcPlatformBundle:Default:listereservations.html.twig', array('reservations' => $reservations
        ));
    }

}
