<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\BrawlStarsAPIService;

class IndexController extends AbstractController{

    /**
     * @Route("/")
     */
    public function index(BrawlStarsAPIService $bsApi): Response{
        return $this->render('index.html.twig', [
            'brawlers' => $bsApi->fetchBrawlersInformation()
        ]);
    } 
}