<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class ShowUsers extends Component
{
    public $search_email;

   

    public function render()
    {
        sleep(2);
        return view('livewire.show-users', [
            // 'users' => User::paginate(10)
            'users' => User::search($this->search_email)->paginate(10),
        ]);
    }

    public function deleteUser($id)
    {
        // dd($id);
        $user = User::findOrFail($id);
        $user->delete();

        session()->flash('sukses', 'User have been deleted!');

    }

}
