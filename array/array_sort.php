<?php
declare(strict_types=1);

class User {
    public $id;
    public $email;
    public function __construct (int $id, string $email) {
        $this->id = $id;
        $this->email = $email;
    }
}
 $user1 = new User (25695455, 'jon2@gmail.com');
 $user2 = new User (21588548, 'jon1@gmail.com');
 $user3 = new User (26694585, 'jon3@gmail.com');
 $users = [$user1, $user2, $user3];

 usort($users, function ($value1, $value2) {
    return $value1->id <=> $value2->id;
 });
 var_dump($users);

 usort($users, function ($value1, $value2) {
    return $value2->id <=> $value1->id;
 });
 var_dump($users);