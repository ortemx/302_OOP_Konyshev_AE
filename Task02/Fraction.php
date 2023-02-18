<?php

class Fraction
{
    private int $numerator;
    private int $denominator;

    private function greatest_common_divisor(int $n, int $m): int
    {
        while (true) {
            if ($n == $m) {
                return $m;
            }
            if ($n > $m) {
                $n -= $m;
            } else {
                $m -= $n;
            }
        }
    }

    public function __construct(int $numerator, int $denominator)
    {
        try {
            if (!is_int($numerator)) {
                throw new Exception("Числитель должен быть типа INTEGER", 1);
            } elseif (!is_int($denominator)) {
                throw new Exception("Знаменатель должен быть типа INTEGER", 1);
            }
            if ($denominator == 0) {
                throw new Exception("Знаменатель не должен быть равен 0", 1);
            }

            if ($numerator == 0) {
                $this->numerator = 0;
                $this->denominator = 1;
                return;
            }

            if ($numerator < 0 and $denominator < 0) {
                $this->numerator = -$numerator;
                $this->denominator = -$denominator;
            } elseif ($numerator > 0 and $denominator < 0) {
                $this->numerator = -$numerator;
                $this->denominator = -$denominator;
            } else {
                $this->numerator = $numerator;
                $this->denominator = $denominator;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }

        $n = $this->numerator < 0 ? -$this->numerator : $this->numerator;
        $m = $this->denominator < 0 ? -$this->denominator : $this->denominator;

        $gcd = $this->greatest_common_divisor($n, $m);
        $this->numerator /= $gcd;
        $this->denominator /= $gcd;
    }

    public function getNumer(): int
    {
        return $this->numerator;
    }

    public function getDenom(): int
    {
        return $this->denominator;
    }


    public function add(Fraction $frac): Fraction
    {
        $numerator = $this->numerator * $frac->getDenom() + $this->denominator * $frac->getNumer();
        $denominator = $this->denominator * $frac->getDenom();

        return new Fraction($numerator, $denominator);
    }

    public function sub(Fraction $frac): Fraction
    {
        $numerator = $this->numerator * $frac->getDenom() - $this->denominator * $frac->getNumer();
        $denominator = $this->denominator * $frac->getDenom();

        return new Fraction($numerator, $denominator);
    }

    public function mult(Fraction $frac): Fraction
    {
        return new Fraction($this->numerator * $frac->getNumer(), $this->denominator * $frac->getDenom());
    }

    public function div(Fraction $frac): Fraction
    {
        return new Fraction($this->numerator * $frac->getDenom(), $this->denominator * $frac->getNumer());
    }

    public function pow(int $exp): Fraction
    {
        return new Fraction($this->numerator ** $exp, $this->denominator ** $exp);
    }

    public function __toString(): string
    {
        if ($this->numerator == 0) {
            return 0 . "'";
        }

        $integer_part = (int) ($this->numerator / $this->denominator);

        if ($integer_part == 0) {
            return $this->numerator . "/" . $this->denominator;
        } else {
            if ($this->numerator % $this->denominator != 0) {
                return $integer_part . "'" . abs($this->numerator % $this->denominator) . "/" . $this->denominator;
            } else {
                return $integer_part . "'";
            }
        }
    }
}
