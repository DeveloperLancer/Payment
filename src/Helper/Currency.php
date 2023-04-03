<?php declare(strict_types=1);
/**
 * @author Jakub Gniecki <kubuspl@onet.eu>
 * @copyright
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


namespace DevLancer\Payment\Helper;

use DevLancer\Payment\Exception\InvalidCurrencyException;

/**
 * Definiuje kod waluty
 */
class Currency
{

    /**
     * Lista dostępnych walut zgodne z ISO 4217
     */
    public const CURRENCIES = [
        'AED',
        'AFN',
        'ALL',
        'AMD',
        'ANG',
        'AOA',
        'ARS',
        'AUD',
        'AWG',
        'AZN',
        'BAM',
        'BBD',
        'BDT',
        'BGN',
        'BHD',
        'BIF',
        'BMD',
        'BND',
        'BOB',
        'BOV',
        'BRL',
        'BSD',
        'BTN',
        'BWP',
        'BYN',
        'BZD',
        'CAD',
        'CDF',
        'CHE',
        'CHF',
        'CHW',
        'CLF',
        'CLP',
        'CNY',
        'COP',
        'COU',
        'CRC',
        'CUC',
        'CUP',
        'CVE',
        'CZK',
        'DJF',
        'DKK',
        'DOP',
        'DZD',
        'EGP',
        'ERN',
        'ETB',
        'EUR',
        'FJD',
        'FKP',
        'GBP',
        'GEL',
        'GHS',
        'GIP',
        'GMD',
        'GNF',
        'GTQ',
        'GYD',
        'HKD',
        'HNL',
        'HRK',
        'HTG',
        'HUF',
        'IDR',
        'ILS',
        'INR',
        'IQD',
        'IRR',
        'ISK',
        'JMD',
        'JOD',
        'JPY',
        'KES',
        'KGS',
        'KHR',
        'KMF',
        'KPW',
        'KRW',
        'KWD',
        'KYD',
        'KZT',
        'LAK',
        'LBP',
        'LKR',
        'LRD',
        'LSL',
        'LYD',
        'MAD',
        'MDL',
        'MGA',
        'MKD',
        'MMK',
        'MNT',
        'MOP',
        'MUR',
        'MVR',
        'MWK',
        'MXN',
        'MXV',
        'MYR',
        'MZN',
        'NAD',
        'NGN',
        'NIO',
        'NOK',
        'NPR',
        'NZD',
        'OMR',
        'PAB',
        'PEN',
        'PGK',
        'PHP',
        'PKR',
        'PLN',
        'PYG',
        'QAR',
        'RON',
        'RSD',
        'RUB',
        'RWF',
        'SAR',
        'SBD',
        'SCR',
        'SDG',
        'SEK',
        'SGD',
        'SHP',
        'SLL',
        'SOS',
        'SRD',
        'SSP',
        'SVC',
        'SYP',
        'SZL',
        'THB',
        'TJS',
        'TMT',
        'TND',
        'TOP',
        'TRY',
        'TTD',
        'TWD',
        'TZS',
        'UAH',
        'UGX',
        'USD',
        'USN',
        'UYI',
        'UYU',
        'UYW',
        'UZS',
        'VES',
        'VND',
        'VUV',
        'WST',
        'XAF',
        'XAG',
        'XAU',
        'XBA',
        'XBB',
        'XBC',
        'XBD',
        'XCD',
        'XDR',
        'XOF',
        'XPD',
        'XPF',
        'XPT',
        'XSU',
        'XTS',
        'XUA',
        'XXX',
        'YER',
        'ZAR',
        'ZMW',
        'ZWL',
    ];

    /**
     * Walut zgodna z ISO 4217
     */
    private string $currency;

    /**
     * @param string $currency
     * @param bool $strictWeight Jeżeli true wielkość znaków w kodzie waluty ma znaczenie
     * @throws InvalidCurrencyException
     */
    public function __construct(string $currency, bool $strictWeight = false)
    {
        if (!self::check($currency, $strictWeight)) {
            $c = strtoupper($currency);
            if ($strictWeight && self::check($c, $strictWeight))
                throw new InvalidCurrencyException(sprintf("The %s currency doesn't exist. Probably use %s", $currency, $c));

            throw new InvalidCurrencyException(sprintf("The %s currency doesn't exist.", $currency));
        }

        $this->currency = $currency;
    }

    /**
     * @return string Zwraca kod waluty
     */
    public function __toString()
    {
        return $this->currency;
    }

    /**
     * Sprawdza poprawność kodu waluty
     *
     * @param string $currency Kod waluty
     * @param bool $strictWeight Jeżeli true wielkość znaków w kodzie waluty ma znaczenie
     * @return bool
     */
    public static function check(string $currency, bool $strictWeight = false): bool
    {
        if (!$strictWeight)
            $currency = strtoupper($currency);

        return in_array($currency, self::CURRENCIES);
    }
}