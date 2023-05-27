<div>
 <div>
    <h2>Usuarios relacionados</h2>
    <ul>
        @foreach ($relatedUsers as $user)
            <li>{{ $user->name }}</li>
        @endforeach
    </ul>
</div>

</div>
