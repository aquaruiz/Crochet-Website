<?php

namespace CrochetLibraryBundle\Controller;

use CrochetLibraryBundle\Entity\Pattern;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DashboradController extends Controller
{
    /**
     * @Route("/", name="dashboard")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        $patterns = $this->getDoctrine()
            ->getRepository(Pattern::class)
            ->findBy([], ['publishedDate' => 'DESC']);

        return $this->render('default/dashboard.html.twig', [
            'patterns' => $patterns
        ]);
    }
}
