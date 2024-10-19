<?php

namespace App\Livewire;

use App\Models\Position;
use Livewire\Component;

class OrganizationalStructure extends Component
{
    public function render()
    {
        $positions = Position::with('employees')->orderBy('position', 'asc')->get();
        // dd($positions);
        return view('livewire.organizational-structure', compact('positions'));
    }
}
