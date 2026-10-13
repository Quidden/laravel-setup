<?php
require_once __DIR__ . '/AccountInterface.php';

class BankAccount implements AccountInterface {
    protected const MIN_BALANCE = 0;
    protected float $balance = 0;
    protected $currency = "USD";

    public function deposit(float $amount): void{
        if ($amount <= 0){
            throw new Exception("Cannot deposit negative amount");
        }else{
            $this->balance += $amount;
        }
    }
    public function withdraw(float $amount): void{
        if ($amount > $this->balance){
            throw new Exception("Cannot withdraw more than balance");
        }elseif ($amount <= 0){
            throw new Exception("Cannot withdraw negative amount");
        }else{
            $this->balance -= $amount;
        }
    }
    public function getBalance(): float{
        return $this->balance;
    }
}
