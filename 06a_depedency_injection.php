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
     *
     * @param string $className
     * @return object
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

takesPerson($person); // Static analyser should complain. It doesn't know a person is created.
