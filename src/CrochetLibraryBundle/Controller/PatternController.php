<?php

namespace CrochetLibraryBundle\Controller;

use CrochetLibraryBundle\Entity\Difficulty;
use CrochetLibraryBundle\Entity\Hook;
use CrochetLibraryBundle\Entity\Pattern;
use CrochetLibraryBundle\Form\DifficultyType;
use CrochetLibraryBundle\Form\PatternDeleteType;
use CrochetLibraryBundle\Form\PatternEditType;
use CrochetLibraryBundle\Form\PatternType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
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

        if ($form->isSubmitted() && $form->isValid()) {
            $currentUser = $this->getUser();
            $pattern->setDesigner($currentUser);

            // set likes
            // set difficulty level

            $picture = $form->getData()->getPicture();
            $file = $form->getData()->getFile();

            try {
                $pictureName = md5(uniqid()) . '.' . $picture->guessExtension();
                $fileName = md5(uniqid()) . '.' . $file->guessExtension();
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
            'pattern_add_form' => $form->createView()
        ]);
    }

    /**
     * @Route("/pattern/{id}", name="pattern_view")
     * @param $id
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewAction($id)
    {
        /** @var Pattern $pattern */
        $pattern = $this
            ->getDoctrine()
            ->getRepository(Pattern::class)
            ->find($id);

        $user = $this->getUser();

        $likable = false;

        if ($pattern) {
            $likes = $pattern->getLikes();

            if (!in_array($user, $likes->getValues())) {
                $likable = true;
            }
        }


        return $this->render("patterns/view.html.twig",
            ['pattern' => $pattern,
                'likable' => $likable,]);
    }

    /**
     * @Route("/pattern/{id}/liked", name="pattern_likes")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function likes($id)
    {
        /**
         * @var Pattern $pattern
         */
        $pattern = $this
            ->getDoctrine()
            ->getRepository(Pattern::class)
            ->find($id);

        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $likes = $pattern->getLikes();

        if (!in_array($user, $likes->getValues())) {
            $pattern->setLikes($user);
            $em->persist($pattern);
            $em->flush();
        }

        return $this->render("patterns/view.html.twig",
            ['pattern' => $pattern,
                'likable' => false]);
    }

    /**
     * @Route("/pattern/edit/{id}", name="pattern_edit")
     * @param Request $request
     * @param Pattern $pattern
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */
    public function editAction(Request $request, Pattern $pattern)
    {
        $user = $this->getUser()->getId();

        $editForm = $this->createForm(PatternEditType::class, $pattern);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->merge($pattern);
            $em->flush();

            return $this->redirectToRoute('pattern_view', array(
                'id' => $pattern->getId()
            ));
        }

        return $this->render('patterns/edit.html.twig', array(
            'pattern' => $pattern,
            'edit_form' => $editForm->createView(),
        ));
    }

    /**
     * @Route("/pattern/delete/{id}", name="pattern_delete")
     * @param Request $request
     * @param Pattern $pattern
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function deleteAction(Request $request, Pattern $pattern)
    {
        $deleteForm = $this->createForm(PatternDeleteType::class, $pattern);
        $deleteForm->handleRequest($request);

        if ($deleteForm->isSubmitted() && $deleteForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($pattern);
            $em->flush();

            return $this->redirectToRoute("user_patterns");
        }

        return $this->render('patterns/confirm_delete.html.twig',
            ['pattern' => $pattern,
                'delete_form' => $deleteForm->createView()]);

    }
}
