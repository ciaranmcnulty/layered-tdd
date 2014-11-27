<?php

namespace DemoCorp;

use Inviqa\Db;

class UserController
{
    private $db;

    public function __construct()
    {
        $path = tempnam(sys_get_temp_dir(), 'data-storage');

        if (!is_dir($path)) {
            unlink($path);
            mkdir($path);
        }

        $this->db = new Db($path);
    }

    public function saveAction($name)
    {
        $user = new NamedUser($name);
        $id = $this->db->saveData(['name' => $user->getName()]);

        return ['id' => $id];
    }

    public function displayAction($id)
    {
        $data = $this->db->loadData($id);
        $user = new NamedUser($data['username']);

        return ['user' => $user];
    }

} 