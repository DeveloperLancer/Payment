<?php declare(strict_types=1);
/**
 * @author Jakub Gniecki <kubuspl@onet.eu>
 * @copyright
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


namespace DevLancer\Payment\Helper;

trait TestModeTrait
{
    private bool $testMode = false;

    /**
     * @param bool $testMode Tryb działania
     * @return void
     */
    public function setTestMode(bool $testMode): void
    {
        $this->testMode = $testMode;
    }

    /**
     * Tryb działania
     * * true - testowy
     * * false - produkcyjny
     *
     * @return bool Tryb działania
     */
    public function isTestMode(): bool
    {
        return $this->testMode;
    }
}