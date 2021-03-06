<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class UsersController extends FOSRestController
{
    private $userRepository;

    public function __construct(UserRepository $userRepository, EntityManagerInterface $em)
    {
        $this->userRepository = $userRepository;
        $this->em = $em;
    }

    public function getUsersAction()
    {
        $user = $this->userRepository->find($id);
        return $this-> view($user);
    }

    public function getUserAction($id)
    {
        return $this->view($users);
    } // "get_user" [GET] /users/{id}

    /**
    * @Rest\Post("/users")
    * @ParamConverter("user", converter="fos_rest.request_body")
    */
    public function postUsersAction(User $user)
    {
        $this->em->persist($user);
        $this->em->flush();
        return $this->view($user);
    } // "post_users" [POST] /users

    public function putUserAction(Request $request, int $id)
    {
        $user = $this->userRepository->find($id);

        if($this->getUser() === $user){
            $firstname = $request->get('firstname');
            $lastname = $request->get('lastname');
            $email = $request->get('email');
            if(isset($firstname)){
                $user->setFirstname($firstname);
            }
            if(isset($lastname)){
                $user->setLastname($lastname);
            }
            if(isset($email)){
                $user->setEmail($email);
            }

            $this->em->persist($user);
            $this->em->flush();
        }
        return $this->view($user);

    } // "put_user" [PUT] /users/{id}

    public function deleteUserAction($id)
    {
        $user = $this->userRepository->find($id);
        $this->em->remove($user);
        $this->em->flush();
    } // "delete_user" [DELETE] /users/{id}
}