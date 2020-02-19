<?php


class Employee
{
    public function sayHello(): void
    {
        echo "Hello";
    }
}

class Business
{
    /** @return array<string, Employee> */
    public function getEmployees(): array
    {
        return [
            'jane' => new Employee(),
        ];
    }
}

function promote(Employee $employee): void
{
    $employee->sayHello();
}

function welcome(string $name): void
{
    echo "Welcome {$name}";
}

$business = new Business();

foreach ($business->getEmployees() as $name => $employee) {
    promote($employee);
    welcome($name);
}
