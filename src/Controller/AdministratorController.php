<?php

namespace App\Controller;

use App\Entity\Administrator;
use App\Repository\AdministratorRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class AdministratorController extends AbstractController
{
    public function __construct()
    {
        
    }

    public function signup(Request $request)
    {
        $deviceType = $request->attributes->get('device');

        return $this->render("{$deviceType}/administrator_security/signup.html.twig");
    }

    public function signin(Request $request, EntityManagerInterface $entityManager)
    {
        $deviceType = $request->attributes->get('device');

        $a = $entityManager->getRepository(Administrator::class)->findAll();

        dd($a);

        return $this->render("{$deviceType}/administrator_security/signin.html.twig");
    }

    public function accountIndex(Request $request)
    {

    }

    public function accountCreate(Request $request)
    {

    }
}