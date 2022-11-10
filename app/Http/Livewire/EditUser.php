<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class EditUser extends Component
{

    Public User $user;

    protected $rules = [
        'name' => 'required|max:255|string',
        'email' => 'required|email'
    ];

    public function mount($user)
    {
        $this->user_id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function editUser(){

        $this->validate();

        User::where('id', $this->user_id)->update([
            'name' => $this->name,
            'email' => $this->email
        ]);

        
        
        return redirect()->route('user.index')->with('sukses', 'User information have been updated');
    }

    public function render()
    {
        return view('livewire.edit-user');
    }
}
