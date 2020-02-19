<?php

class Person {
    public function sayHello(): void
    {
        echo "hello";
    }
}

class DIContainer
{
    /**
     * @template T
     * @param class-string<T> $className
     * @return T
     */
    public function make(string $className): object {
        return new $className;
    }

}

function takesPerson(Person $person): void
{
    $person->sayHello();
}

$diContainer = new DIContainer();
$person = $diContainer->make(Person::class);

takesPerson($person);
