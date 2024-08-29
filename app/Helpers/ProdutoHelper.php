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

    public static function formatPorcentage(float $precoCusto, float $preco, int $decimals = 2): string
    {
        $val = ((float) $preco) / (float) $precoCusto  * 100;
        return  number_format($val, $decimals, ',', '.') . '%';
    }
}
