<?php

namespace Tests\Unit;

use App\Helpers\MoneyHelper;
use App\Models\Currency;
use PHPUnit\Framework\TestCase;

class MoneyHelperTest extends TestCase
{
    private Currency $currency;

    protected function setUp(): void
    {
        parent::setUp();

        $this->currency = new Currency();
        $this->currency->name = 'Brazilian real';
        $this->currency->minor_unit = 2;
        $this->currency->alphabetic_code = 'BRL';
        $this->currency->numeric_code = '986';
        $this->currency->symbol = 'R$';
    }

    public function testItCanGetAmountFromInteger(): void
    {
        $this->assertEquals(123.45, MoneyHelper::fromInteger(12345, $this->currency));
    }

    public function testItCanGetAmountToInteger(): void
    {
        $this->assertEquals(12345, MoneyHelper::toInteger(123.45, $this->currency));
    }

    public function testItCanFormatAnAmount(): void
    {
        $this->assertEquals('R$ 1,234.50', MoneyHelper::formattedAmount(1234.5, $this->currency));
    }

    public function testItCanFormatAnAmountWithoutSymbol(): void
    {
        $this->assertEquals('1,234.50', MoneyHelper::formattedAmount(1234.5, $this->currency, false));
    }

    public function testItCanFormatAnAmountFromInteger(): void
    {
        $this->assertEquals('R$ 1,234.50', MoneyHelper::formattedAmountFromInteger(123450, $this->currency));
    }

    public function testItCanFormatAnAmountFromIntegerWithoutSymbol(): void
    {
        $this->assertEquals('1,234.50', MoneyHelper::formattedAmountFromInteger(123450, $this->currency, false));
    }
}
