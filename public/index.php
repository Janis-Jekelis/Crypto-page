<?php
declare(strict_types=1);
require_once  __DIR__."/../vendor/autoload.php";


$x=new \App\Models\CryptoPair("BTC","ETH");
echo $x->getRatio();