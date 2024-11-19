<!-- resources/views/upload.blade.php -->
<form action="{{ route('upload.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label>ID Usuario:</label>
    <input type="number" name="user_id" required>
    <label>Imagen del servicio (máx 20MB):</label>
    <input type="file" name="image" accept="image/jpeg,image/png" required>
    <button type="submit">Subir</button>
</form>

@if(session('success'))
    <p>{{ session('success') }}</p>
    <img src="{{ asset('storage/uploads/' . session('filename')) }}" alt="Imagen del servicio">
@endif
