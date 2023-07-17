<div>
    @foreach ($register as $item)
        <div>
            <p>{{ $item->id }}</p>
            <ul>
                @if ($item->tipo_pessoa == 'pj')
                    <span>cnpj</span>
                    @if (!empty($item->cnpj))
                        <img src="{{ asset('storage/' . $item->cnpj) }}" alt="" class="w-32">
                    @endif
                @else
                    @if (!empty($item->rg_cnh))
                        <img src="{{ asset('storage/' . $item->rg_cnh) }}" alt="" class="w-32">
                        <span>rg cnh</span>
                    @endif
                @endif
            </ul>
        </div>
    @endforeach
</div>


<li>


</li>
