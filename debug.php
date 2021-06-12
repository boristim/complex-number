<?php

use ComplexNumber\ComplexNumber;
require_once 'vendor/autoload.php';

$n1 = new ComplexNumber(4, 4);
$n2 = new ComplexNumber(2, 2);

print "$n1 / $n2 = ".$n1->divide($n2);
print PHP_EOL;
print "$n1 + $n2 = ".$n1->plus($n2);
print PHP_EOL;
print "$n1 * $n2 = ".$n1->multiple($n2);
print PHP_EOL;
print "$n1 - $n2 = ".$n1->minus($n2);
print PHP_EOL;
print (new ComplexNumber(1,2));
print PHP_EOL;
print (new ComplexNumber(2, 7))->multiple(new ComplexNumber(3, -2));
print PHP_EOL;
print (new ComplexNumber(4, 4))->divide(new ComplexNumber(2, 2));
print PHP_EOL;