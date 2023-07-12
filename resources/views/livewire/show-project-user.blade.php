<div>
    {{-- Stop trying to control. --}}
    @foreach ($register as $item)
        <p>{{ $item->id }}</p>
        <ul>
            <li>
                <span>cnpj</span>
                @if (!empty($item->cnpj))
                    {{-- <img src="{{ url('storage/' . $item->cnpj) }}" alt=""> --}}
                    <img src="{{ asset('storage/' . $item->cnpj) }}" alt="" class="w-32">
                @endif
                @if (!empty($item->rg_cnh))
                    <img src="{{ asset('storage/' . $item->rg_cnh) }}" alt="" class="w-32">
                    <span>rg cnh</span>
                @endif
            </li>
        </ul>
    @endforeach
</div>
