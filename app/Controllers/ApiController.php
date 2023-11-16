<?php
declare(strict_types=1);
namespace App\Controllers;
use App\Models\CryptoPair;
class ApiController

{
    public function index()
    {
        $cryptoPairs=[
            new CryptoPair("BTC","ETH"),
            new CryptoPair("BTC","LTC"),
            new CryptoPair("BTC","ADA"),
        ];

        [
            "crypto"=>[
                "base"=>$btcEth->getBaseCurrency(),
                "target"=>$btcEth->getTargetCurrency(),
                "ratio
                "
            ]

        ]
    }
}
