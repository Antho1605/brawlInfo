<?php

namespace App\Controller;

use App\Service\BrawlStarsAPIService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BrawlersController extends AbstractController{

    /**
     * @Route("/brawlers", name="brawlers")
     */
    public function show(BrawlStarsAPIService $bsApi): Response{
        return $this->render('brawlers.html.twig', [
            'brawlers' => $bsApi->fetchBrawlersInformation()["items"]
        ]);
    }
}