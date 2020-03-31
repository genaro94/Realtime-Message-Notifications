<?php

namespace App\Repositories;

use App\Message;

class MessageRepository {

    private $modelMessage;

    public function __construct(Message $modelMessage){
        $this->modelMessage = $modelMessage;
    }

    public function create($data){
        return $this->modelMessage->create($data);
    }
}
