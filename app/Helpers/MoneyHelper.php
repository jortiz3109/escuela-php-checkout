<?php

namespace App\Helpers;

use App\Models\Currency;

class MoneyHelper
{
    public static function fromInteger(int $integer, Currency $currency): float
    {
        $minorUnit = $currency->minor_unit;
        return bcdiv($integer, bcpow(10, $minorUnit), $minorUnit);
    }

    public static function toInteger(float $value, Currency $currency): int
    {
        $minorUnit = $currency->minor_unit;
        return bcmul($value, bcpow(10, $minorUnit), $minorUnit);
    }

    public static function formattedAmountFromInteger(int $amount, Currency $currency, ?bool $withSymbol = true): string
    {
        return self::formattedAmount(self::fromInteger($amount, $currency), $currency, $withSymbol);
    }

    public static function formattedAmount(float $amount, Currency $currency, ?bool $withSymbol = true): string
    {
        $minorUnit = $currency->minor_unit;
        $symbol = $withSymbol ? $currency->symbol.' ' : '';

        return $symbol.number_format($amount, $minorUnit);
    }
}
