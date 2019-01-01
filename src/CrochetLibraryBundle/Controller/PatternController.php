<?php

namespace CrochetLibraryBundle\Controller;

use CrochetLibraryBundle\Entity\Hook;
use CrochetLibraryBundle\Entity\Pattern;
use CrochetLibraryBundle\Form\PatternType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PatternController extends Controller
{
    /**
     * @Route("/pattern/add", name="pattern_add")
     * @param Request $request
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function addAction(Request $request)
    {
        $pattern = new Pattern();

        $hooks = $this
            ->getDoctrine()
            ->getRepository(Hook::class)
            ->findAll();

        $form = $this->createForm(PatternType::class, $pattern);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $currentUser = $this->getUser();
            $pattern->setDesigner($currentUser);

            // set likes
            // set difficulty level

            $picture = $form->getData()->getPicture();
            $file = $form->getData()->getFile();
            $pictureName = md5(uniqid()) . '.' . $picture->guessExtension();
            $fileName = md5(uniqid()) . '.' . $file->guessExtension();

            try {
                $picture->move($this->getParameter('patterns_pictures_directory'), $pictureName);
                $file->move($this->getParameter('patterns_files_directory'), $fileName);
            } catch (FileException $ex) {

            }

            $pattern->setPicture($pictureName);
            $pattern->setFile($fileName);

            $hook = $form->getData()->getHook();
            $pattern->setHook($hook);

            $pattern->setPublishedDate(new \DateTime('now'));

            $em = $this->getDoctrine()->getManager();
            $em->persist($pattern);
            $em->flush();

            return $this->redirectToRoute("dashboard");
        }

        return $this->render('patterns/add.html.twig', [
            'pattern_add_form' =>$form->createView(),
            'hooks' => $hooks
        ]);
    }

    /**
     * @Route("/pattern/{id}", name="pattern_view")
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewAction($id)
    {
        /** @var Pattern $pattern */
        $pattern = $this
            ->getDoctrine()
            ->getRepository(Pattern::class)
            ->find($id);

//        $comments = $this->getDoctrine()
//            ->getRepository(Comment::class)
//            ->findAllComments($pattern);

//        $pattern->setViewCount($pattern->getViewCount() + 1);
        $em = $this->getDoctrine()->getManager();

        $em->persist($pattern);
        $em->flush();

        return $this->render("patterns/view.html.twig",
            ['pattern' => $pattern]);
    }
}