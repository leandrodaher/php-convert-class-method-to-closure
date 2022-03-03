<?php

// https://www.php.net/manual/pt_BR/closure.bind.php
// https://www.php.net/manual/pt_BR/closure.bindto.php
// https://stackoverflow.com/questions/41701482/convert-a-php-method-to-a-closure

class A {
    function __construct($val) {
        $this->val = $val;
    }
    function getClosure() {
        //returns closure bound to this object and scope
        $method = new ReflectionMethod($this, 'getValue');
        $closure = $method->getClosure($this); 

        return $closure->bindTo($this);
    }

    private function getValue()
    {
        return $this->val;
    }
}

$ob1 = new A(1);
$ob2 = new A(2);

$cl = $ob1->getClosure();
echo $cl(), "\n";

$cl2 = $ob2->getClosure();
echo $cl2(), "\n";

?>
