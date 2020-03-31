<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\SendMessage;
use App\Repositories\MessageRepository;

class MessageController extends Controller
{
    private $messageRepository;
    private $sendMessage;

    public function __construct(MessageRepository $messageRepository, SendMessage $sendMessage){
        $this->messageRepository = $messageRepository;
        $this->sendMessage       = $sendMessage;
    }
    public function message(){
        return view('message');
    }

    public function create(Request $request){
        $message = $this->messageRepository->create($request->all());
        broadcast(new \App\Events\SendMessage($message));
        return view('message');
    }

    public function send(){
        broadcast($this->sendMessage);
        return 'done';
    }
}
