<?php

namespace spec\DemoCorp;

use DemoCorp\NamedUser;
use DemoCorp\UserRepository;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class UserControllerSpec extends ObjectBehavior
{
    function let(UserRepository $userRepository)
    {
        $this->beConstructedWith($userRepository);
    }

    function it_saves_the_user(UserRepository $userRepository)
    {
        $this->saveAction('Ciaran');

        $userRepository->save(new NamedUser('Ciaran'))->shouldHaveBeenCalled();
    }

    function it_returns_the_id_of_the_saved_user(UserRepository $userRepository)
    {
        $userRepository->save(Argument::any())->willReturn(123);

        $this->saveAction('Ciaran')->shouldReturn(['id' => 123]);
    }

    function it_loads_the_user_by_id(UserRepository $userRepository)
    {
        $userRepository->findById(456)->willReturn(new NamedUser('Konstantin'));

        $this->displayAction(456)->shouldBeLike(['user' => new NamedUser('Konstantin')]);
    }
}
