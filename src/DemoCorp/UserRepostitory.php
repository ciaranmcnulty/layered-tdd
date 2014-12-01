<?php

namespace DemoCorp;

interface UserRepository
{
    public function save(NamedUser $user);

    public function findById($id);
}