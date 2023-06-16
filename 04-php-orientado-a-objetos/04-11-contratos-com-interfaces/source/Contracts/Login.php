<?php

namespace Source\Contracts;

use Source\Contracts\User;
use Source\Contracts\UserAdmin;

class Login
{
    private $logged;

    /**
     * @param User $user
     * @return User
     */
    public function loginUser(User $user): User
    {
        $this->logged = $user;
        return $this->logged;
    }

    /**
     * @param UserAdmin $user
     * @return UserAdmin
     */
    public function loginAdmin(UserAdmin $user): UserAdmin
    {
        $this->logged = $user;
        return $this->logged;
    }

    /**
     * @param UserInterface $user
     * @return UserInterface
     */
    public function login(UserInterface $user): UserInterface
    {
        $this->logged = $user;
        return $this->logged;
    }
}