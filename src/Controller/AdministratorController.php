<?php

namespace App\Controller;

use App\Entity\Administrator;
use App\Form\AdministratorSigninType;
use App\Form\AdministratorSignupType;
use App\Service\AdministratorService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class AdministratorController extends AbstractController
{
    private $administratorService;

    public function __construct(AdministratorService $administratorService)
    {
        $this->administratorService = $administratorService;
    }

    public function signin(Request $request, AuthenticationUtils $authenticationUtils): Response
    {
        $deviceType = $request->attributes->get('device');

        $administrator = new Administrator;
        $form = $this->createForm(AdministratorSigninType::class, $administrator);

        return $this->render("{$deviceType}/administrator/signin.html.twig", [
            'error' => $authenticationUtils->getLastAuthenticationError(),
            'form' => $form->createView(),
        ]);
    }

    public function signup(Request $request): Response
    {
        $deviceType = $request->attributes->get('device');

        $administrator = new Administrator;
        $form = $this->createForm(AdministratorSignupType::class, $administrator);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->administratorService->registerAdministrator($administrator);

            return $this->redirectToRoute('administrator_signin');
        }

        return $this->render("{$deviceType}/administrator/signup.html.twig", [
            'form' => $form->createView(),
        ]);
    }
}