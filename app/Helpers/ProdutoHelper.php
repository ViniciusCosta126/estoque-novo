<?php

namespace App\Helpers;

class ProdutoHelper
{
    /**
     * Formata um número como moeda.
     *
     * @param float $amount
     * @param string $currencySymbol
     * @param int $decimals
     * @return string
     */
    public static function formatCurrency(float $amount, string $currencySymbol = 'R$', int $decimals = 2): string
    {
        return $currencySymbol . ' ' . number_format($amount, $decimals, ',', '.');
    }
}
