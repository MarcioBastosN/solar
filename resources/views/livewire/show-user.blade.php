<div>
    <p>Show user</p>

    <p>{{ $user }}</p>
    <p>Caminho</p>{{ $path }}
    @hasallroles('admin')
        <p>admin</p>
        <form wire:submit.prevent="save">
            <input type="file" wire:model="photo">

            @if ($photo)
                Photo Preview:
                <img src="{{ $photo->temporaryUrl() }}" width="100" height="100">
            @endif

            @error('photo')
                <span class="error">{{ $message }}</span>
            @enderror

            <button type="submit">Save Photo</button>
            <div wire:loading wire:target="photo">Uploading...</div>
        </form>

        @if ($path)
            <button wire:click="export">
                Download File
            </button>
            <img src="{{ $path }}" width="100" height="100">
        @endif
    @endhasallroles

    @hasallroles('user')
        <p>User</p>
    @endhasallroles
</div>
