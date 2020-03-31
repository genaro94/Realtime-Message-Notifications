<?php

namespace App\Repositories;

use App\User;

class UserRepository {

    private $modelUser;

    public function __construct(User $modelUser){
        $this->modelUser = $modelUser;
    }

    public function search($id){
        return $this->modelUser->find($id);
    }
}
