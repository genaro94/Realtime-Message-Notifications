<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\MessageRepository;

class MessageController extends Controller
{
    private $messageRepository;

    public function __construct(MessageRepository $messageRepository){
        $this->messageRepository = $messageRepository;
    }
    public function message(){
        return view('message');
    }

    public function create(Request $request){
        $message = $this->messageRepository->create($request->all());
        return view('message');
    }
}
