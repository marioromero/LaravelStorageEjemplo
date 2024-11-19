<!-- resources/views/user_images.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imágenes del Usuario</title>
</head>
<body>
    <h1>Imágenes del Usuario</h1>

    @if(count($userFiles) > 0)
        @foreach($userFiles as $file)
            <div>
                <img src="{{ asset('storage/' . $file) }}" alt="Imagen del usuario" style="max-width: 300px; margin-bottom: 10px;">
            </div>
        @endforeach
    @else
        <p>No hay imágenes para este usuario.</p>
    @endif

</body>
</html>
