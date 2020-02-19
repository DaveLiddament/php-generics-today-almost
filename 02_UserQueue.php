<?php

declare(strict_types=1);

class Queue
{
    /**
     * @var array
     */
    private $items;

    public function __construct()
    {
        $this->items = [];
    }

    public function add($item): void
    {
        $this->items[] = $item;
    }

    public function getNext()
    {
        return array_shift($this->items);
    }
}



class UserQueue
{
    /**
     * @var Queue
     */
    private $queue;

    public function __construct()
    {
        $this->queue = new Queue();
    }

    public function add(User $item): void
    {
        $this->queue->add($item);
    }

    public function getNext(): User
    {
        return $this->queue->getNext();
    }

}


class User {}

$userQueue = new UserQueue();
$userQueue->add(new User());
echo get_class($userQueue->getNext());


$userQueue->add("Bob"); // Should fail here if executed
