--TEST--
testing @ and error_reporting - 6
--FILE--
<?php

error_reporting(E_ALL & ~E_STRICT);
	
function foo1($arg) {
}

function foo2($arg) {
}

function foo3($arg) {
	echo $undef3;
	throw new Exception("test");
}

try {
	@foo1(@foo2(@foo3()));
} catch (Exception $e) {
}

var_dump(error_reporting());

echo "Done\n";
?>
--EXPECTF--	
int(6143)
Done
