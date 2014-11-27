<?php

namespace DemoCorp;

class NamedUser
{

    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function rename($name)
    {
        $this->name = $name;
    }
}
