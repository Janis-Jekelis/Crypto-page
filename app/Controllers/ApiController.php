<?php
declare(strict_types=1);
namespace App\Controllers;
use App\Models\CryptoPair;
class ApiController

{
    public function index():array
    {
        $cryptoPairs=[
            new CryptoPair("BTC","ETH"),
            new CryptoPair("BTC","LTC"),
            new CryptoPair("BTC","ADA"),
        ];

      return  [
            "crypto"=>$cryptoPairs
        ];
    }
}
