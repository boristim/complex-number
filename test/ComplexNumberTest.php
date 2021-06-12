<?php

use PHPUnit\Framework\TestCase;
use ComplexNumber\ComplexNumber;

class ComplexNumberTest extends TestCase
{

    public function testPlus(): void
    {
        $x = (new ComplexNumber(2, 2))->plus(new ComplexNumber(3, 1));

        $this->assertEquals('5+3i', strval($x), ' (2+2i) + (3+i) != (5+3i), summation ERROR.');
    }

    public function testMinus(): void
    {
        $x = (new ComplexNumber(5, 5))->minus(new ComplexNumber(3, 7));

        $this->assertEquals('2-2i', strval($x), ' (5+5i) - (3+7i) != (2-2i), subtraction ERROR.');
    }

    public function testMultiple(): void
    {
        $x = (new ComplexNumber(2, 7))->multiple(new ComplexNumber(3, -2));

        $this->assertEquals('20+17i', strval($x), ' (2+7i) * (3-2i) != (20+17i), multiple ERROR.');
    }

    public function testDivide(): void
    {
        $x = (new ComplexNumber(4, 4))->divide(new ComplexNumber(2, 2));

        $this->assertEquals('2', strval($x), ' (4+4i) / (2+2i) != 2, divide ERROR');
    }

    public function testException(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionCode(-1);
        $this->expectDeprecationMessageMatches('/De[a-z]*\sis zero!/');
        (new ComplexNumber(4, 4))->divide(new ComplexNumber(0, 0));
        throw new Exception('Wrong exception');
    }

}