<?php
/**
 * Created by PhpStorm.
 * User: ciaran-presenting
 * Date: 01/12/14
 * Time: 15:46
 */

namespace DemoCorp;


interface UserRepository
{
    public function save(NamedUser $user);

    public function findById($id);
}