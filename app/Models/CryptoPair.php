<?php
declare(strict_types=1);
namespace App\Models;
use App\Api;
class CryptoPair
{
    private string $baseCurrency;
    private string $targetCurrency;
    private object $response;
    public function __construct(string $baseCurrency, string $targetCurrency)
    {
        $this->baseCurrency=$baseCurrency;
        $this->targetCurrency=$targetCurrency;
        $this->response=(new Api())->getResponse();
    }

    public function getBaseCurrency(): string
    {
        return $this->baseCurrency;
    }


    public function getTargetCurrency(): string
    {
        return $this->targetCurrency;
    }

    public function getRatio(): ?string
    {
        $baseValue=0;
        $targetValue=0;
        foreach ($this->response->data as $currency){
            if($currency->symbol==$this->baseCurrency)$baseValue=$currency->quote->USD->price;
            if($currency->symbol==$this->targetCurrency)$targetValue=$currency->quote->USD->price;
        }
        if($baseValue==0 || $targetValue==0){
            return null;
        }else{
            return number_format(($baseValue*100)/($targetValue*100),2);
        }
    }
}