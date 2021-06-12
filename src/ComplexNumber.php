<?php

namespace ComplexNumber;

use Exception;

/**
 * Class ComplexNumber
 */
class ComplexNumber
{

    /**
     * @var float
     */
    private float $a;

    /**
     * @var float
     */
    private float $b;

    /**
     * ComplexNumber constructor.
     *
     * @param float $a
     * @param float $b
     */
    public function __construct(float $a, float $b)
    {
        $this->a = $a;
        $this->b = $b;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        $res = [];
        if ($this->a != 0) {
            $res[] = strval($this->a);
        }

        if ($this->b != 0) {
            $res[] = ($this->b > 0 ? '+'.$this->b : $this->b).'i';
        }

        return $res ? implode('', $res) : '0';
    }

    /**
     * @param ComplexNumber $z
     *
     * @return $this
     */
    public function plus(ComplexNumber $z): self
    {
        $this->a += $z->getA();
        $this->b += $z->getB();

        return $this;
    }

    /**
     * @param ComplexNumber $z
     *
     * @return $this
     */
    public function minus(ComplexNumber $z): self
    {
        $this->a -= $z->getA();
        $this->b -= $z->getB();

        return $this;
    }

    /**
     * @param ComplexNumber $z
     *
     * @return $this
     */
    public function multiple(ComplexNumber $z): self
    {
        $a = $this->a;
        $this->a = ($a * $z->getA()) - ($this->b * $z->getB());
        $this->b = ($a * $z->getB()) + ($this->b * $z->getA());

        return $this;
    }

    /**
     * @param ComplexNumber $z
     *
     * @return $this
     * @throws \Exception
     */
    public function divide(ComplexNumber $z): self
    {
        if ((0.0 === $z->getA()) && (0.0 === $z->getB())) {
            throw new Exception('Denominator is zero!', -1);
        }
        $a = $this->a;
        $this->a = (($a * $z->getA()) + ($this->b * $z->getB())) / (($z->getA() ** 2) + ($z->getB() ** 2));
        $this->b = (($this->b * $z->getA()) - ($a * $z->getB())) / (($z->getA() ** 2) + ($z->getB() ** 2));

        return $this;
    }

    /**
     * @return float
     */
    public function getA(): float
    {
        return $this->a;
    }

    /**
     * @return float
     */
    public function getB(): float
    {
        return $this->b;
    }

}