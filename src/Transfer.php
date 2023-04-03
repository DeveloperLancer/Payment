<?php declare(strict_types=1);
/**
 * @author Jakub Gniecki <kubuspl@onet.eu>
 * @copyright
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


namespace DevLancer\Payment;

use DevLancer\Payment\Helper\TestModeTrait;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

abstract class Transfer implements TransferInterface
{
    use TestModeTrait;

    protected Client $httpClient;

    protected ResponseInterface|null $fromRequest = null;


    public function __construct(?Client $httpClient = null)
    {
        $this->httpClient = $httpClient ?? new Client();
    }

    /**
     * @inheritDoc
     * @return ResponseInterface
     */
    public function getResponse(): ResponseInterface
    {
        return clone $this->fromRequest;
    }

    /**
     * Zwraca adres żądania w zależności od trybu działania
     *
     * @return string Adres żądania
     */
    abstract public function getRequestUrl(): string;
}