<?php

namespace spec\DemoCorp;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class NamedUserSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('Bob');
    }

    function it_remembers_its_name()
    {
        $this->getName()->shouldReturn('Bob');
    }

    function it_can_change_its_name()
    {
        $this->rename('Alice');
        $this->getName()->shouldReturn('Alice');
    }
}
