<?php

namespace Source\Bank;

use Source\App\Trigger;
use Source\App\User;

class AccountSaving extends Account
{
    private $interest;

    /**
     * AccountSaving constructor
     * @param $branch
     * @param $account
     * @param $client
     * @param $balance
     */
    public function __construct($branch, $account, User $client, $balance)
    {
        parent::__construct($branch, $account, $client, $balance);
        $this->interest = 0.006;
    }

    public function deposit($value)
    {
        $deposit =  $value + ($value * $this->interest);
        $this->balance = $this->balance + $deposit;
        Trigger::show("Depósito de {$this->toBrl($value)} realizado com sucesso!", Trigger::ACCEPT);
    }

    public function withdrawal($value)
    {
        if ($this->balance >= $value) {
            $this->balance -= abs($value);
            Trigger::show("Saque de {$this->toBrl($value)} realizado com sucesso!", Trigger::ERROR);
        } else {
            Trigger::show("Saldo insuficiente, você tem {$this->toBrl($this->balance)}", Trigger::WARNING);
        }
    }
}