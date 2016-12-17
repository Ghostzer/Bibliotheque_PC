<?php

namespace mpc\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use mpc\PlatformBundle\Entity\Reservation;
use mpc\PlatformBundle\Entity\Emprunt;
use mpc\PlatformBundle\Entity\Utilisateurs;
use Symfony\Component\Form\Extension\Core\Type\DateIntervalType;

class DefaultController extends Controller {

    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $bds = $em->getRepository('mpcPlatformBundle:Bd')->findBy([], ['date' => 'DESC']); //trie par date
        $livres = $em->getRepository('mpcPlatformBundle:Livre')->findBy([], ['date' => 'DESC']); //trie par date
        $cds = $em->getRepository('mpcPlatformBundle:Cd')->findBy([], ['date' => 'DESC']); //trie par date


        return $this->render('mpcPlatformBundle:Default:index.html.twig', array('bds' => $bds, 'livres' => $livres, 'cds' => $cds
        ));
    }

    public function ajoutReservationAction(Request $request) {

        $em = $this->getDoctrine()->getManager();

        $id_select = $request->get('id'); // on récupère la valeur "id", par exemple le chiffre 2 et on la place dans la variable $id_select, $id_select = 2
        $datetoday = new \DateTime();
        $currentuser = $this->getUser();

        $objet = $em->getRepository('mpcPlatformBundle:Ouvrage')->find($id_select); // Il va chercher dans la table Ouvrage l'id correspondant (2 toujousr dans l'exemple) afin de l'associer

        $reservation = new Reservation; // on créer un objet vide dans la table Reservation

        $reservation->setOuvrage($objet); // on set la colonne ouvrage_id avec la variable objet, donc 2
        $reservation->SetDate($datetoday); // on set la date avec la date d'aujourd'hui
        $reservation->setUtilisateur($currentuser); // on set l'utilisateur avec celui actuellement logué

        $em->persist($reservation);

        $em->flush();


        return $this->render('mpcPlatformBundle:Default:ajout_reservation_ok.html.twig');
    }

    public function mesReservationAction() {
        $em = $this->getDoctrine()->getManager();

        $reservations = $em->getRepository('mpcPlatformBundle:Reservation')->findByUtilisateur($this->getUser()); // La fonction findByX permets la recherche par utilisateur avec l'utilisateur actuel dans la table Reservation

        return $this->render('mpcPlatformBundle:Default:mes_reservations.html.twig', array('reservations' => $reservations,
        ));
    }

    public function listeReservationAction() {
        $em = $this->getDoctrine()->getManager();

        $reservations = $em->getRepository('mpcPlatformBundle:Reservation')->findAll();

        return $this->render('mpcPlatformBundle:Default:liste_reservations.html.twig', array('reservations' => $reservations
        ));
    }
    
        public function mesEmpruntsAction() {
        $em = $this->getDoctrine()->getManager();

        $emprunts = $em->getRepository('mpcPlatformBundle:Emprunt')->findByUtilisateur($this->getUser()); // La fonction findByX permets la recherche par utilisateur avec l'utilisateur actuel dans la table Reservation


        return $this->render('mpcPlatformBundle:Default:mes_emprunts.html.twig', array('emprunts' => $emprunts
        ));
        
        
    }

    public function ajoutEmpruntAction(Request $request) {

        $em = $this->getDoctrine()->getManager();

        $id_select = $request->get('id');
        
        $date = new \DateTime();
        
        $datetoday = new \DateTime();
        $currentuser = $this->getUser();
        $dateInterval = new \DateInterval("P15D");
        $dateretour = $datetoday->add($dateInterval);

        $objet = $em->getRepository('mpcPlatformBundle:Ouvrage')->find($id_select);

        $emprunt = new Emprunt; 

        $emprunt->setOuvrage($objet);
        $emprunt->SetdateEmprunt($date); 
        $emprunt->setUtilisateur($currentuser); 
        $emprunt->setdateRetour($dateretour);

        $em->persist($emprunt);
        
//        $reservation = $em->getRepository('mpcPlatformBundle:Reservation')->findByOuvrage($id_select);
//        $em->remove($reservation);
//        

        $em->flush();


        return $this->render('mpcPlatformBundle:Default:ajout_emprunt_ok.html.twig');
    }
    
        public function listeEmpruntsAction() {
        $em = $this->getDoctrine()->getManager();
        $datetoday = new \DateTime();

        $emprunts = $em->getRepository('mpcPlatformBundle:Emprunt')->findAll();

        return $this->render('mpcPlatformBundle:Default:liste_emprunts.html.twig', array('emprunts' => $emprunts, 'datetoday' => $datetoday
        ));
    }
    
    
}
