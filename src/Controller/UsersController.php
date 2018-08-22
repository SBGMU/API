<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class UsersController extends FOSRestController
{
    private $userRepository;
    private $em;
    
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getUsersAction()
    {
        $users = $this->userRepository->findAll();
        return $this->view($users);
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
        //$request->get('firstname');
        
    } // "put_user" [PUT] /users/{id}

    public function deleteUserAction($id)
    {

    } // "delete_user" [DELETE] /users/{id}
}