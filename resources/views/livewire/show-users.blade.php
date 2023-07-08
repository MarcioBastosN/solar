<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <input wire:model="search" type="search" placeholder="Search posts by title...">
    <p>Lista de usuarios registrados</p>

    @foreach ($users as $user)
        <p>{{ $user->name }} - {{ $user->email }} - Level
            {{ !empty($user->roles->first()) ? $user->roles->first()->name : 'ops' }}</p>
    @endforeach
</div>
