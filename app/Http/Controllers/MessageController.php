<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\SendMessage;
use App\Repositories\MessageRepository;
use App\Repositories\UserRepository;

class MessageController extends Controller
{
    private $messageRepository;
    private $sendMessage;
    private $userRepository;

    public function __construct(MessageRepository $messageRepository, SendMessage $sendMessage,
                                UserRepository $userRepository){
        $this->messageRepository = $messageRepository;
        $this->sendMessage       = $sendMessage;
        $this->userRepository    = $userRepository;
    }
    public function message(){
        return view('message');
    }

    public function create(Request $request){
        $message = $this->messageRepository->create($request->all());
        $user    = $this->userRepository->search($request->user_id);
        broadcast(new \App\Events\SendMessage($message, $user));
        return redirect('message');
    }

    public function send(){
        broadcast($this->sendMessage);
        return 'done';
    }
}
