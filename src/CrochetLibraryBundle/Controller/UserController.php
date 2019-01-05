<?php

namespace CrochetLibraryBundle\Controller;

use CrochetLibraryBundle\Entity\Pattern;
use CrochetLibraryBundle\Entity\Role;
use CrochetLibraryBundle\Entity\User;
use CrochetLibraryBundle\Form\UserType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends Controller
{
    /**
     * @Route("/register", name="user_register")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function registerAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $usernameForm = $form->getData()->getUsername();

            $userForm = $this
                ->getDoctrine()
                ->getRepository(User::class)
                ->findOneBy(['username' => $usernameForm]);

            if(null !== $userForm){
                $this->addFlash('info', "Username " . $usernameForm . " already taken!");
                return $this->render('user/register.html.twig');
            }

            $password = $this->get('security.password_encoder')
                ->encodePassword($user, $user->getPassword());

            $role = $this
                ->getDoctrine()
                ->getRepository(Role::class)
                ->findOneBy(['name' => 'ROLE_USER']);

            $user->addRole($role);

            $user->setPassword($password);

            $file = $form->getData()->getPicture();
            $fileName = md5(uniqid()) . '.' . $file->guessExtension();

            try {
                $file->move($this->getParameter('users_pictures_directory'),
                    $fileName);
            } catch (FileException $ex) {

            }

            $user->setPicture($fileName);
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute("security_login");
        }

        return $this->render('user/register.html.twig', [
                'register_form' =>$form->createView()
            ]);
    }

    /**
     * @Route("/profile", name="user_profile")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function profile()
    {
        $userId = $this->getUser()->getId();
        $user = $this
            ->getDoctrine()
            ->getRepository(User::class)
            ->find($userId);

        return $this->render('user/profile.html.twig',
            ['user' => $user]);
    }

    /**
     * @Route("/profile/mypatterns", name="user_patterns")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showMyPatterns(){
        $currentUser = $this->getUser();

        $em = $this->getDoctrine()->getManager();
        $myPatterns = $em->getRepository(Pattern::class)->findBy(['designer' => $currentUser]);

        return $this->render('user/mypatterns.html.twig',
            ['patterns' => $myPatterns,
                'user' => $currentUser]);
    }
}