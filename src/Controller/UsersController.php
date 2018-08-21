<?php

namespace App\Controller;

use FOS\RestBundle\Controller\FOSRestController;

class UsersController extends FOSRestController
{

    public function getUsersAction():?string
    {

    } // "get_users" [GET] /users

    public function getUserAction($id)
    {

    } // "get_user" [GET] /users/{id}

    public function postUsersAction()
    {

    } // "post_users" [POST] /users

    public function putUserAction($id)
    {

    } // "put_user" [PUT] /users/{id}

    public function deleteUserAction($id)
    {

    } // "delete_user" [DELETE] /users/{id}

}
