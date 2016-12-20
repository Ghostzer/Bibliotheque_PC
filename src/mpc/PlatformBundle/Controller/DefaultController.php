<?php

namespace mpc\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use mpc\PlatformBundle\Entity\Reservation;
use mpc\PlatformBundle\Entity\Emprunt;
use mpc\PlatformBundle\Entity\Utilisateurs;
use Symfony\Component\Form\Extension\Core\Type\DateIntervalType;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller {

    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $bds = $em->getRepository('mpcPlatformBundle:Bd')->findBy([], ['date' => 'DESC']); //trie par date
        $livres = $em->getRepository('mpcPlatformBundle:Livre')->findBy([], ['date' => 'DESC']); //trie par date
        $cds = $em->getRepository('mpcPlatformBundle:Cd')->findBy([], ['date' => 'DESC']); //trie par date

        return $this->render('mpcPlatformBundle:Default:index.html.twig', array('bds' => $bds, 'livres' => $livres, 'cds' => $cds,
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

        return $this->render('mpcPlatformBundle:Default:mes_reservations.html.twig', array('reservations' => $reservations
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
        $dateInterval = new \DateInterval("P15D"); // on définit 15 jours d'interval pour l'emprunt...
        $dateretour = $datetoday->add($dateInterval); // ... et on l'ajoute à la date d'aujourd'hui pour le calcul

        $objet = $em->getRepository('mpcPlatformBundle:Reservation')->findOneBy(array('id' => $id_select)); // on recherche l'objet qui a pour id celui selectionné, par exemple si l'id est 76, on obtient son id/date/ouvrage_id/utilisateur_id et pas seulement l'id

        $emprunt = new Emprunt;

        $emprunt->setOuvrage($objet->getOuvrage()); // on récupère ouvrage_id de la table "reservation" et on le set, par rapport à la variable $objet
        $emprunt->SetdateEmprunt($date);
        $emprunt->setUtilisateur($objet->getUtilisateur());  // On récupère l'utilisateur de la table Reservation et on le set par rapport à la variable $objet
        $emprunt->setdateRetour($dateretour);

        $em->persist($emprunt);

        $reservation = $em->getRepository('mpcPlatformBundle:Reservation')->findOneBy(array('id' => $id_select));
        $em->remove($reservation);

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

    public function indexEvenementAction() {

        return $this->render('mpcPlatformBundle:Default:evenements.html.twig');
    }

    public function allEvenementsAction() {
        
                $em = $this->getDoctrine()->getManager();

        $events = $em->getRepository('mpcPlatformBundle:evenements')->findAll();

        return $this->render('mpcPlatformBundle:Default:allevents.html.twig', array('events' => $events
                ));
    }

}
