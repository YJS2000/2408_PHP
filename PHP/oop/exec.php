<?php
require_once('./FlyingSquirrel.php');
require_once('./Whale.php');
require_once('./GoldFish.php');
use PHP\OOP\Whale;
use PHP\OOP\FlyingSquirrel;
use PHP\oop\GoldFish;

$whale = new Whale('고래', '바다');
echo $whale->printInfo();

$flyingsquirrel = new FlyingSquirrel('날다람쥐', '산');
echo $flyingsquirrel->printInfo();

$goldFish = new GoldFish();
echo $goldFish->printPet();