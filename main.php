<?php declare(strict_types=1);

require_once "vendor/autoload.php";

use App\CryptoApiClient;
use App\Models\CryptoInfo;

$cryptoApiClient = new CryptoApiClient();

$cryptoInfo = $cryptoApiClient->getCryptoInfo();

if ($cryptoInfo != null) {
    foreach ($cryptoInfo as $currency) {
        /** @var CryptoInfo $currency */
        echo "ID: " . $currency->getId() . PHP_EOL;
        echo "NAME: " . $currency->getName() . PHP_EOL;
        echo "SYMBOL: " . $currency->getSymbol() . PHP_EOL;
        echo "DATE ADDED: " . (new DateTime($currency->getDateAdded()))->format('F j, Y') . PHP_EOL;
        echo "CIRCULATING SUPPLY: " . $currency->getCirculatingSupply() . PHP_EOL;
        echo "CMC RANK: " . $currency->getCmcRank() . PHP_EOL;
        echo "PRICE(USD): " . $currency->getPriceUsd() . PHP_EOL;
        echo "--------------------------------------------------------------------------------------" . PHP_EOL;
    }
} else {
    echo "Cant get data from Crypto Api. Please Try again later!" . PHP_EOL;
}
