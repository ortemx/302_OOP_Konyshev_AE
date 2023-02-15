<?php
	class Fraction
	{
		private $numerator;
		private $denominator;

		public function reduction(){

		}


		public function __construct($numerator, $denominator)
		{
			try {
				if (!is_int($numerator))
				{
					throw new Exception("Числитель должен быть типа INTEGER", 1);	
				}
				elseif (!is_int($denominator))
				{
					throw new Exception("Знаменатель должен быть типа INTEGER", 1);	
				}
				if ($denominator == 0)
				{
					throw new Exception("Знаменатель не должен быть равен 0", 1);
				}

				if ($numerator == 0)
				{
					$this -> numerator = 0;
					$this -> denominator = 1;
				}

				if ($numerator < 0 and $denominator < 0)
				{
					$this -> numerator = -$numerator;
					$this -> denominator = -$denominator;					
				}
				elseif ($numerator > 0 and $denominator < 0) 
				{
					$this -> numerator = -$numerator;
					$this -> denominator = -$denominator;	
				}
				else
				{
					$this -> numerator = $numerator;
					$this -> denominator = $denominator;						
				}
				
			} catch (Exception $e) {
				echo $e->getMessage();
				die();
			}


			function gcd($n, $m) {
			    while(true) {
			        if($n == $m) {
			            return $m;
			        }
			        if($n > $m) {
			            $n -= $m;
			        } else {
			            $m -= $n;
			        }
			    }
			}

			$n = $this -> numerator < 0 ? -$this -> numerator : $this -> numerator;
			$m = $this -> denominator < 0 ? -$this -> denominator : $this -> denominator;

			$gcd = gcd($n, $m);
			$this -> numerator /= $gcd;
			$this -> denominator /= $gcd;
		}

		public function getNumer()
		{
			return $this -> numerator;
		}

		public function getDenom()
		{
			return $this -> denominator;
		}


		public function add($frac)
		{
			$numerator = $this -> numerator * $frac -> getDenom() + $this -> denominator * $frac -> getNumer();
			$denominator = $this -> denominator * $frac -> getDenom();
			return new Fraction($numerator, $denominator);
		}	

		public function sub($frac)
		{
			$numerator = $this -> numerator * $frac -> getDenom() - $this -> denominator * $frac -> getNumer();
			$denominator = $this -> denominator * $frac -> getDenom();
			return new Fraction($numerator, $denominator);
		}	

		public function mult($frac)
		{
			return new Fraction($this -> numerator * $frac -> getNumer(), $this -> denominator * $frac -> getDenom());
		}


		public function div($frac)
		{
			return new Fraction($this -> numerator * $frac -> getDenom(), $this -> denominator * $frac -> getNumer());
		}

		public function pow($exp)
		{
			return new Fraction($this -> numerator ** $exp, $this -> denominator ** $exp);
		}

		public function __toString()
		{
			$integer_part =  (int)($this -> numerator / $this -> denominator);

			if ($integer_part == 0)
			{
				return $this -> numerator . "/" . $this -> denominator;
			}
			else
			{
				return $integer_part . "'" . abs($this -> numerator % $this -> denominator) . "/" . $this -> denominator;
			}
		}

	}

	$f = new Fraction(51, 17);
	echo $f -> __toString();

?>
