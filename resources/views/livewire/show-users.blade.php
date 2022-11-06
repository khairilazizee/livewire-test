<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12 flex-col space-y-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('sukses'))
                <div class="py-2 px-3 w-full bg-green-400 rounded-md mb-4 text-white font-bold">
                    {{ session('sukses') }}
                </div>
            @endif
            <div class="flex flex-row">
                <div class="mb-4 w-1/2">
                    <x-input type="text" id="name" class="w-full mt-1 block px-3" placeholder="Search" wire:model="search_email"/>
                </div>
                <div class="mb-4 text-right w-1/2" style="text-align:right;">
                    <x-button onclick="location.href='{{ route('user.create') }}'">
                        {{__('Create New User')}}
                    </x-button>
                </div>
            </div>
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table wire:loading.class="opacity-50" style="width:100%;margin-bottom:5px;">
                        <thead>
                            <tr>
                                <th class="text-left">Id</th>
                                <th class="text-left"><a wire:click="sortBy('name')">Name</a></th>
                                <th class="text-left"><a wire:click="sortBy('email')">Email</a></th>
                                <th class="text-left">Edit</th>
                                <th class="text-left">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $bil => $user)
                                <tr>
                                    <td>{{ $bil + 1}}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <x-button onclick="location.href='{{ route('user.edit', $user->id) }}'">
                                            {{ __('Edit')}}
                                        </x-button>
                                    </td>
                                    <td>
                                        <x-button wire:click="deleteUser({{$user->id}})">
                                            {{ __('Delete')}}
                                        </x-button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    
                </div>
            </div>

            <div class="mt-5">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
