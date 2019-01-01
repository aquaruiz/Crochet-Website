<?php

namespace CrochetLibraryBundle\Controller;

use CrochetLibraryBundle\Entity\Difficulty;
use CrochetLibraryBundle\Entity\Pattern;
use CrochetLibraryBundle\Form\DifficultyType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DifficultyController extends Controller
{
    /**
     * @Route("/pattern/level/{id}", name="difficulty_add")
     *      *
     * @param Request $request
     * @param Pattern $pattern
     * @return void @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */
    public function addAction(Request $request, Pattern $pattern)
    {
        $form = $this->createForm(DifficultyType::class, $pattern);
        $form->handleRequest($request);
        var_dump($form);
        $difficulty = new Difficulty();
        //        $pattern = new Pattern();
//
//        $hooks = $this
//            ->getDoctrine()
//            ->getRepository(Hook::class)
//            ->findAll();
//
//        $form = $this->createForm(PatternType::class, $pattern);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            $currentUser = $this->getUser();
//            $pattern->setDesigner($currentUser);
//
//            // set likes
//            // set difficulty level
//
//            $picture = $form->getData()->getPicture();
//            $file = $form->getData()->getFile();
//
//            try {
//                $pictureName = md5(uniqid()) . '.' . $picture->guessExtension();
//                $fileName = md5(uniqid()) . '.' . $file->guessExtension();
//                $picture->move($this->getParameter('patterns_pictures_directory'), $pictureName);
//                $file->move($this->getParameter('patterns_files_directory'), $fileName);
//            } catch (FileException $ex) {
//
//            }
//
//            $pattern->setPicture($pictureName);
//            $pattern->setFile($fileName);
//
//            $hook = $form->getData()->getHook();
//            $pattern->setHook($hook);
//
//            $pattern->setPublishedDate(new \DateTime('now'));
//
//            $em = $this->getDoctrine()->getManager();
//            $em->persist($pattern);
//            $em->flush();
//
//            return $this->redirectToRoute("dashboard");
//        }
//
//        return $this->render('patterns/add.html.twig', [
//            'pattern_add_form' => $form->createView()
//        ]);
    }
}