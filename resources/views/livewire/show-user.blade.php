<div>
    <p>Show user</p>


    {{ $message }}
    <p>{{ $user }}</p>
    @hasallroles('admin')
        <p>admin</p>
    @endhasallroles

    @hasallroles('user')
        <p>User</p>
    @endhasallroles
</div>
