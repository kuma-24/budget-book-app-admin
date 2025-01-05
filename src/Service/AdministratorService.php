<?php

namespace App\Service;

use App\Entity\Administrator;
use App\Repository\AdministratorRepository;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AdministratorService
{
    private $administratorRepository;
    private $passwordHasher;

    public function __construct(AdministratorRepository $administratorRepository, UserPasswordHasherInterface $userPasswordHasher)
    {
        $this->administratorRepository = $administratorRepository;
        $this->passwordHasher = $userPasswordHasher;
    }

    public function registerAdministrator(Administrator $administrator)
    {
        $administrator->setPassword($this->passwordHasher->hashPassword($administrator, $administrator->getPassword()));

        $this->administratorRepository->save($administrator);
    }
}