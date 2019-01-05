<?php

namespace CrochetLibraryBundle\Controller;

use CrochetLibraryBundle\Entity\Difficulty;
use CrochetLibraryBundle\Entity\Pattern;
use CrochetLibraryBundle\Form\DifficultyType;
use CrochetLibraryBundle\Repository\DifficultyRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DifficultyController extends Controller
{
    /**
     * @Route("/pattern/{id}/setdiff", name="pattern_diff")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     * @param Request $request
     * @param Pattern $pattern
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function diff(Request $request, Pattern $pattern)
    {
        $diff = new Difficulty();
        $form = $this->createForm(DifficultyType::class, $diff);
        $form->handleRequest($request);

        $diffs = count($pattern->getDifficulty());
        var_dump($diffs);

        if ($form->isSubmitted() && $form->isValid()) {
            $currentUser = $this->getUser();
            var_dump($diff);
            $em = $this->getDoctrine()->getManager();

            $oldDiff = $this
                ->getDoctrine()
                ->getRepository(Difficulty::class)
                ->findOneBy([
                    'user' => $currentUser,
                    'pattern' => $pattern
                ]);

            if($oldDiff){
                $oldDiff->setLevel($diff->getLevel());
                $em->merge($oldDiff);
            } else {
                $diff->setPattern($pattern);
                $diff->setUser($currentUser);
                $em->persist($diff);
            }

            $em->flush();
            return $this->redirectToRoute("dashboard");
        }

        return $this->render("rates/difficulty_level.html.twig",
            ['diff_form' => $form->createView()]);
    }
}