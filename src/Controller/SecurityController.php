<?php

namespace App\Controller;

use App\Trait\SecurityTrait;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SecurityController extends AbstractController
{
    use SecurityTrait;

    public function signin(Request $request): Response
    {
        $deviceType = $request->attributes->get('device');

        return $this->render("{$deviceType}/security/signin.html.twig", [
            'importfile' => $this->getImportmap($deviceType, "{$deviceType}-security-signin"),
        ]);
    }
}
