<?php declare(strict_types=1);

namespace App;

use GuzzleHttp\Client;
use App\Models\CryptoInfo;
use GuzzleHttp\Exception\GuzzleException;

class CryptoApiClient
{
    private Client $client;
    private const API_KEY = '34317bd8-529c-41cb-9f5b-41aa73109659';

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/',
            'headers' => [
                'X-CMC_PRO_API_KEY' => self::API_KEY,
                'Accept' => 'application/json'
            ]
        ]);
    }

    public function getCryptoInfo(): ?array
    {
        $cryptoData = $this->fetch();
        if (!empty($cryptoData)) {
            $cryptoCurrencies = [];
            foreach ($cryptoData->data as $currency) {
                $cryptoCurrencies[] = new CryptoInfo(
                    $currency->id,
                    $currency->name,
                    $currency->symbol,
                    $currency->date_added,
                    $currency->circulating_supply,
                    $currency->cmc_rank,
                    $currency->quote->USD->price
                );
            }
            return $cryptoCurrencies;
        }
        return null;
    }

    private function fetch(): ?\stdClass
    {
        try {
            $response = $this->client->request('GET', 'listings/latest', [
                'query' => [
                    'limit' => '10',
                    'convert' => 'USD'
                ]
            ]);
            return json_decode($response->getBody()->getContents());
        } catch (GuzzleException $e) {
            $e->getMessage();
        }
        return null;
    }
}