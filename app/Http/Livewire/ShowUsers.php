<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ShowUsers extends Component
{
    use WithPagination;

    public $search_email;
    public $sortField = 'id';
    public $sortDirection = 'asc';

    public function sortBy($field)
    {
        $this->sortField = $field;
    }

    public function render()
    {
        sleep(1);
        return view('livewire.show-users', [
            // 'users' => User::paginate(10)
            'users' => User::search($this->search_email)->orderBy($this->sortField, $this->sortDirection)->paginate(10),
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
