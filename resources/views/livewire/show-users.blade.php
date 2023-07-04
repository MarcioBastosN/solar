<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <p>Lista de usuarios registrados</p>
    @foreach ($users as $user)
        <p>{{ $user->name }} - {{ $user->email }} </p>
    @endforeach
</div>
