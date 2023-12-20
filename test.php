<?php
class foo {
    var $bar = 'I am bar.';
    var $arr = array('I  .', 'I .', 'I  .');
    var $r   = 'I am r.';
}

$foo = new foo();
$bar = 'bar';
$baz = array('foo', 'bar', 'baz', 'oskour');
echo "1". $foo->$bar . "\n";
echo "2".$foo->{$baz[1]} . "\n";

$start = 'b';
$end   = 'ar';
echo "3".$foo->{$start . $end} . "\n";

$arr = 'arr';
echo "4".$foo->{$arr[1]} . "\n";
?>