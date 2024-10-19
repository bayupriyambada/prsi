<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactUs extends Component
{
    public $name, $email, $subject, $message;

    public function resetFields(){
        $this->name = null;
        $this->email = null;
        $this->subject = null;
        $this->message = null;
    }

    public function save(){
        $this->validate([
            "name"=> "required",
            "email"=> "required",
            "subject"=> "required",
            "message"=> "required",
            ], [
                'required' => ':attribute wajib diisi.',
            ]);
        Contact::create([
            "name"=> $this->name,
            "email"=> $this->email,
            "subject"=> $this->subject,
            "message"=> $this->message
        ]);

        $this->resetFields();
        session()->flash('message', 'Terima kasih, data anda akan kami proses.');
        return redirect()->back();
    }
    public function render()
    {
        return view('livewire.contact-us');
    }
}
