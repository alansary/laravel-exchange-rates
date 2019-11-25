<?php

namespace AshAllenDesign\LaravelExchangeRates\Tests\Unit;

use AshAllenDesign\LaravelExchangeRates\classes\RequestBuilder;
use AshAllenDesign\LaravelExchangeRates\ExchangeRate;
use Mockery;

class CurrenciesTest extends TestCase
{
    /** @test */
    public function currencies_are_returned_as_an_array()
    {
        $requestBuilderMock = Mockery::mock(RequestBuilder::class)->makePartial();
        $requestBuilderMock->expects('makeRequest')
            ->withArgs(['/latest', []])
            ->once()
            ->andReturn($this->mockResponse());

        $exchangeRate = new ExchangeRate($requestBuilderMock);
        $currencies = $exchangeRate->currencies();

        $this->assertEquals($this->expectedResponse(), $currencies);
    }

    private function mockResponse()
    {
        return [
            'rates' => [
                'CAD' => 1.4682,
                'HKD' => 8.7298,
                'ISK' => 138.1,
                'PHP' => 56.286,
                'DKK' => 7.4712,
                'HUF' => 328.33,
                'CZK' => 25.514,
                'AUD' => 1.6151,
                'RON' => 4.7547,
                'SEK' => 10.6993,
                'IDR' => 15640.93,
                'INR' => 78.816,
                'BRL' => 4.4437,
                'RUB' => 71.0786,
                'HRK' => 7.46,
                'JPY' => 120.43,
                'THB' => 33.623,
                'CHF' => 1.1013,
                'SGD' => 1.5129,
                'PLN' => 4.2535,
                'BGN' => 1.9558,
                'TRY' => 6.3761,
                'CNY' => 7.844,
                'NOK' => 10.1638,
                'NZD' => 1.7326,
                'ZAR' => 16.828,
                'USD' => 1.1139,
                'MXN' => 21.3164,
                'ILS' => 3.9272,
                'GBP' => 0.86008,
                'KRW' => 1300.09,
                'MYR' => 4.64,
            ],
            'base'  => 'EUR',
            'date'  => '2019-11-01',
        ];
    }

    private function expectedResponse()
    {
        return [
            'EUR',
            'CAD',
            'HKD',
            'ISK',
            'PHP',
            'DKK',
            'HUF',
            'CZK',
            'AUD',
            'RON',
            'SEK',
            'IDR',
            'INR',
            'BRL',
            'RUB',
            'HRK',
            'JPY',
            'THB',
            'CHF',
            'SGD',
            'PLN',
            'BGN',
            'TRY',
            'CNY',
            'NOK',
            'NZD',
            'ZAR',
            'USD',
            'MXN',
            'ILS',
            'GBP',
            'KRW',
            'MYR',
        ];
    }
}