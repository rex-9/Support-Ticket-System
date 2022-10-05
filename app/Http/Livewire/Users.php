<?php

namespace App\Http\Livewire;

use App\Models\Ticket;
use Livewire\Component;

class Users extends Component
{
    public $tickets, $ticket_id, $subject, $message, $department;

    public function render()
    {
        $this->tickets = Ticket::all();
        return view('livewire.users');
    }

    private function resetInputFields()
    {
        $this->subject = '';
        $this->message = '';
    }

    public function store()
    {
        $validatedData = $this->validate([
            'subject' => 'required',
            'message' => 'required',
        ]);

        Ticket::create($validatedData);

        session()->flash('message', 'Ticket Created Successfully.');

        $this->resetInputFields();
    }
}
