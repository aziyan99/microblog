<?php

namespace App\Http\Livewire\Backend\Message;

use App\Models\Message;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Gate;

class Index extends Component
{
    public $users;
    public $senderId;
    public $receiverId;
    public $subject;
    public $message;
    public $isOutboxOpen;
    public $isInboxOpen;
    public $inboxMessage;
    public $outboxMessage;

    protected $rules = [
        'receiverId' => 'required',
        'subject' => 'required',
        'message' => 'required'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount()
    {
        $this->senderId = auth()->user()->id;
        $this->users = User::all();
    }

    public function render()
    {
        return view('livewire.backend.message.index', [
            'outBoxs' => Message::where('sender_id', $this->senderId)
                ->latest()
                ->get(),
            'inBoxs' => Message::where('receiver_id', $this->senderId)
                ->latest()
                ->get()
        ]);
    }

    public function sendMessage()
    {
        $validatedData = $this->validate();
        Message::create([
            'receiver_id' => $validatedData['receiverId'],
            'subject' => $validatedData['subject'],
            'message' => $validatedData['message'],
            'sender_id' => $this->senderId
        ]);
        $this->resetForm();
        session()->flash('message', 'Message successfully send.');
    }

    public function resetForm()
    {
        $this->message = "";
        $this->subject = "";
        $this->receiverId = "";
    }

    public function openOutBox($id)
    {
        $this->isInboxOpen = false;
        $this->outboxMessage = Message::find($id);
        $this->isOutboxOpen = true;
    }

    public function openInBox($id)
    {
        $this->isOutboxOpen = false;
        $this->inboxMessage = Message::find($id);
        if ($this->inboxMessage->is_read == 0) {
            $this->inboxMessage->update([
                'is_read' => 1
            ]);
        }
        $this->isInboxOpen = true;
    }

    public function closeAllBox()
    {
        $this->isInboxOpen = false;
        $this->isOutboxOpen = false;
        $this->inboxMessage = "";
        $this->outboxMessage = "";
    }

    public function clearAllMessage()
    {
        if (!Gate::allows('isAdmin')) {
            abort(403);
        }
        \DB::table('messages')->truncate();
        session()->flash('message', 'Messages was clear.');
    }
}
