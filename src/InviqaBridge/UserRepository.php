<?php

namespace InviqaBridge;

use DemoCorp\NamedUser;
use Inviqa\Db;

class UserRepository implements \DemoCorp\UserRepository
{
    /**
     * @var Db
     */
    private $db;

    public function __construct(Db $db)
    {
        $this->db = $db;
    }

    public function save(NamedUser $user)
    {
        $id = $this->db->saveData(['name' => $user->getName()]);
        return $id;
    }

    public function findById($id)
    {
        $data = $this->db->loadData($id);

        return new NamedUser($data['name']);
    }
}