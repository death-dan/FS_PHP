<?php

namespace Source\Traits;

trait UserTraits
{
    private $user;

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param mixed $suer
     */
    public function setUser($user): void
    {
        $this->user = $user;
    }
}