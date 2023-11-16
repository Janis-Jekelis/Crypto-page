<?php
declare(strict_types=1);
namespace App\Controllers;
use App\Models\CryptoPair;
class MainController

{
    public function index():array
    {
        if($_GET["search"]==null) {
            $cryptoPairs = [
                new CryptoPair("BTC", "ETH"),
                new CryptoPair("BTC", "LTC"),
                new CryptoPair("BTC", "ADA"),
            ];

            return [
                "crypto" => $cryptoPairs
            ];
        }else{
            switch (true){
                case strpos($_GET["search"]," "):
                    $delimiter=" ";
                    break;
                case strpos($_GET["search"],"/"):
                    $delimiter="/";
                    break;
                default:
                    return ["Result"=>"No search results"];
            }
            [$base,$target]= explode($delimiter,$_GET["search"]);
        }
        $cryptoPairs =[new CryptoPair(strtoupper($base), strtoupper($target))];
        if ($cryptoPairs[0]->getRatio()!=0){
            return [
                "crypto" => $cryptoPairs
            ];
        }else {

            return ["Result"=>"No search results"];
        }
    }

}
