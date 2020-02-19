<?php

/**
 * @template T
 * @param T $input
 * @return T
 */
function mirror($input) { return $input; }


function takesInt(int $a): void {
    echo $a;
}

takesInt(mirror(1));
takesInt(mirror("hello")); // Static analysis should complain here
