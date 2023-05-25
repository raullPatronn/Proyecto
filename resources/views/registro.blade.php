<!-- registro.blade.php -->
<form action="{{ route('registro.post') }}" method="POST">
    @csrf

    <div>
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" required>
    </div>

    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
    </div>

    <div>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
    </div>

    <div>
        <label for="password_confirmation">Confirmar Contraseña:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required>
    </div>

    <button type="submit">Registrar</button>
</form>
