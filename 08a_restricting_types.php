<?php

class Animal { }

class Dog extends Animal {
    public function bark(): void {
        echo 'bark';
    }
}

class Cat extends Animal {
    public function meow(): void {
        echo 'meow';
    }
}

class Car {
    public function drive(): void {
        echo 'driving';
    }
}

/** @template T */
interface AnimalGame {

    /** @param T $animal */
    public function play($animal): void;
}

/** @implements AnimalGame<Dog> */
class DogGame implements AnimalGame {

    public function play($animal): void {
        $animal->meow(); // Static analyser should find a bug: Dogs can't meow
    }
}

// No complaint from static analyser, even though this doesn't make sense
/** @implements AnimalGame<Car> */
class CarGame implements AnimalGame {

    public function play($animal): void {
        $animal->drive();
    }
}

