<?php declare(strict_types=1);
/**
 * @author Jakub Gniecki <kubuspl@onet.eu>
 * @copyright
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


namespace DevLancer\Payment;

use Psr\Http\Message\ResponseInterface;

interface TransferInterface
{
    /**
     * Wykonuje żądanie
     *
     * @param mixed $data Dane wymagane do wykonania żądania
     * @return void
     */
    public function sendRequest($data): void;

    /**
     * Zwraca odpowiedź po wykonaniu żądania, które zostało obsłużone.
     *
     * @return ResponseInterface Bezpośrednia odpowiedź po żądaniu
     */
    public function getResponse(): ResponseInterface;

    /**
     * Zwraca true po wykonaniu żądania, które zostało obsłużone,
     * ale uzyskało wynik, który nie jest oczekiwaną wartością.
     *
     * @return bool
     */
    public function isError(): bool;
}