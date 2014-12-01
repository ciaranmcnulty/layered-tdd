<?php

require __DIR__ . '/../src/DemoCorp/NamedUser.php';
require __DIR__ . '/../src/DemoCorp/UserRepository.php';
require __DIR__ . '/../src/Inviqa/Db.php';
require __DIR__ . '/../src/InviqaBridge/UserRepository.php';


class UserRepositoryTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $path = tempnam(sys_get_temp_dir(), 'data-storage');
        if (!is_dir($path)) {
            unlink($path);
            mkdir($path);
        }
        $db = new \Inviqa\Db($path);

        $this->repo = new \InviqaBridge\UserRepository($db);
    }

    public function testItIsARepository()
    {
        $this->assertInstanceOf('DemoCorp\UserRepository', $this->repo);
    }

    public function testItLoadsWhatItSaves()
    {
        $user = new \DemoCorp\NamedUser('Ciaran');
        $id = $this->repo->save($user);

        $result = $this->repo->findById($id);

        $this->assertEquals($user, $result);
    }
}