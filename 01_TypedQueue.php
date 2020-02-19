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



class TypedQueue
{
    /**
     * @var string
     */
    private $type;

    /**
     * @var Queue
     */
    private $queue;

    public function __construct(string $type)
    {
        $this->type = $type;
        $this->queue = new Queue();
    }

    public function add($item): void
    {
        if (!$item instanceof $this->type) {
            throw new TypeError();
        }
        $this->queue->add($item);
    }

    public function getNext()
    {
        return $this->queue->getNext();
    }

}


class User {}

$userQueue = new TypedQueue(User::class);
$userQueue->add(new User());
echo get_class($userQueue->getNext());


$userQueue->add("Bob"); // Should fail here if executed
