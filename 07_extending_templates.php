<?php

class User {
    public function getName(): string {
        return "name";
    }
}


/** @template T */
abstract class Repository {

    /** @return array<T> */
    public function findAll(): array {
        return [];
    }

    /** @return T|null */
    public function findById(int $id) {
        return null;
    }
}

/** @extends Repository<User> */
class UserRepository extends Repository {
    // Add User specific methods here
}



function takesUser(?User $user): void
{
    echo $user ? $user->getName() : 'No user';
}

$userRepository = new UserRepository();

$user = $userRepository->findById(1);
takesUser($user);
