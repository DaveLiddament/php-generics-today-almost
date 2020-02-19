<?php

/**
 * @template T
 * @param T $value
 * @return array<T>
 */
function asArray($value) { return [$value]; }

/** @param array<int> $a */
function takesInts(array $a): void {
    echo $a[0];
}

takesInts(asArray(5));
takesInts(asArray("hello")); // Static analyser should find issue
