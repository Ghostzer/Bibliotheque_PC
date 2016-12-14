<?php

namespace mpc\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller {

    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $ouvrages = $em->getRepository('mpcPlatformBundle:Ouvrage')->findBy([], ['date' => 'DESC']); //trie par date

        return $this->render('mpcPlatformBundle:Default:index.html.twig', array('ouvrages' => $ouvrages,
        ));
    }

    public function trieBdAction() {
        $em = $this->getDoctrine()->getManager();

        $repo = $em->getRepository('mpcPlatformBundle:Bd');

        $qb = $repo->createQueryBuilder('b') // le b est un alias de la table Bd, b pour "B"d
                ->join('b.ouvrage', 'o') // on utilise l'alias b pour désigner la table Bd, on join la table ouvrage et on assigne un alias pour la table ouvrage "o"
                ->where('b.ouvrage = o.id'); // On défini le lien entre les 2 tables, la liaison faites dans phpmyadmin (voir designer). Ici on cherche ouvrage_id (définis par ouvrage) dans la table Bd, qu'on lie avec id de la table ouvrage

        $ouvrages_select = $qb->getQuery()->getResult();

        return $this->render('mpcPlatformBundle:Default:filterbd.html.twig', array('ouvrages_select' => $ouvrages_select,
        ));
    }
    
        public function trieLivreAction() {
        $em = $this->getDoctrine()->getManager();

        $repo = $em->getRepository('mpcPlatformBundle:Livre');

        $qb = $repo->createQueryBuilder('l')
                ->join('l.ouvrage', 'o')
                ->where('l.ouvrage = o.id');

        $ouvrages_select = $qb->getQuery()->getResult();

        return $this->render('mpcPlatformBundle:Default:filterlivre.html.twig', array('ouvrages_select' => $ouvrages_select,
        ));
    }
    
        public function trieCdAction() {
        $em = $this->getDoctrine()->getManager();

        $repo = $em->getRepository('mpcPlatformBundle:Cd');

        $qb = $repo->createQueryBuilder('c') 
                ->join('c.ouvrage', 'o')
                ->where('c.ouvrage = o.id');

        $ouvrages_select = $qb->getQuery()->getResult();

        return $this->render('mpcPlatformBundle:Default:filtercd.html.twig', array('ouvrages_select' => $ouvrages_select,
        ));
    }

}
