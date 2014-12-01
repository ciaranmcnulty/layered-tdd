<?php

namespace DemoCorp;

use Inviqa\Db;

class UserController
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function saveAction($name)
    {
        $user = new NamedUser($name);
        $id = $this->userRepository->save($user);

        return ['id' => $id];
    }

    public function displayAction($id)
    {
        $user = $this->userRepository->findById($id);

        return ['user' => $user];
    }

} 