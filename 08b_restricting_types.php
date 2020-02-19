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

/** @template T of Animal */
interface AnimalGame {

    /** @param T $animal */
    public function play($animal): void;
}

/** @implements AnimalGame<Dog> */
class DogGame implements AnimalGame {

    public function play($animal): void {
        $animal->bark(); // We know $animal is a dog
    }
}

// Static analyser should now highlight this as a bug...
/** @implements AnimalGame<Car> */
class CarGame implements AnimalGame {

    public function play($animal): void {
        $animal->drive();
    }
}

