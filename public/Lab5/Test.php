<?php
require_once __DIR__ . '/SavingsAccount.php';

$user1 = new SavingsAccount();
$user2 = new SavingsAccount();
$user3 = new SavingsAccount();

$user4 = new BankAccount();

try{
    echo $user1->getBalance() . "<br>";
    $user1->deposit(10);
    echo $user1->getBalance() . "<br>";
    $user1->applyInterest();
    echo $user1->getBalance() . "<br>";

    echo $user4->getBalance() . "<br>";
    $user4->deposit(10);
    echo $user4->getBalance() . "<br>";

    //examples of exception
    //$user2->deposit(-10);
    //$user3->withdraw(10);
}catch(Exception $e){
    echo($e->getMessage() . "<br>");
}
