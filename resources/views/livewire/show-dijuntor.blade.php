<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <p>exibe os disjuntores</p>
    {{-- <x-dropdown :content="{{ $dijuntores }}"> --}}
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    @foreach ($dijuntores as $dijuntor)
        <p>{{ $dijuntor->name }}</p>
    @endforeach
</div>
