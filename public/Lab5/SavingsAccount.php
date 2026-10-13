<?php
require_once __DIR__ . '/BankAccount.php';
class SavingsAccount extends BankAccount {
    static private float $interestRate = 0.03;

    public function applyInterest(): void
    {
        $this->balance += $this->balance * self::$interestRate;
    }
}
