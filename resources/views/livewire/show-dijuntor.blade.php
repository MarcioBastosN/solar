<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <p>exibe os disjuntores</p>
    @foreach ($dijuntores as $dijuntor)
        <p>{{ $dijuntor->name }}</p>
    @endforeach
</div>
