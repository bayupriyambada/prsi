<?php

namespace App\Livewire\Front;

use App\Models\Membership as ModelsMembership;
use Livewire\Component;
use Livewire\WithFileUploads;

class Membership extends Component
{
    public $full_name, $email, $birthdate, $job, $photo, $ktp, $address, $phone, $reason, $shirt_size;

    use WithFileUploads;

    public $ktpPreview;
    public $photoPreview;

    public function updatedKtp()
    {
        // Set path untuk preview sementara
        $this->ktpPreview = $this->ktp->temporaryUrl();
    }
    public function updatedPhoto()
    {
        // Set path untuk preview sementara
        $this->photoPreview = $this->photo->temporaryUrl();
    }
    public function resetFields(){
        $this->full_name = null;
        $this->email = null;
        $this->birthdate = null;
        $this->photo = null;
        $this->job = null;
        $this->ktp = null;
        $this->address = null;
        $this->phone = null;
        $this->reason = null;
        $this->shirt_size = null;
    }
    public function save(){
        $this->validate([
            "full_name"=> "required",
            "email"=> "required",
            "birthdate"=> "required",
            "job"=> "required",
            "photo"=> "required|max:2048",
            "ktp"=> "required|max:2048",
            "address"=> "required",
            "phone"=> "required",
            "reason"=> "required",
            "shirt_size"=> "required|in:s,m,l,xl,xxl,xxxl",
        ]);

        if($this->photo){
            $photoPath = $this->photo->store('memberships/photos', 'public');
        }

        if($this->ktp){
            $ktpPath = $this->ktp->store('memberships/ktp', 'public');
        }

        ModelsMembership::create([
            "full_name" => $this->full_name,
            "email" => $this->email,
            "birthdate" => $this->birthdate,
            "job" => $this->job,
            "photo"=> $photoPath,
            "ktp"=> $ktpPath,
            "address"=> $this->address,
            "phone"=> $this->phone,
            "reason"=> $this->reason,
            "shirt_size"=> $this->shirt_size,
            ]);

        $this->resetFields();
        session()->flash('message', 'Terima kasih, data anda akan kami proses.');
        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.front.membership');
    }
}
