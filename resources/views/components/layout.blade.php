<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>{{ $title ?? 'Teste Pagina' }}</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @vite(['resources/js/app.js'])
</head>

<body class="min-vh-100 ">
    <x-NavBar.navbar />
    <div class="bg-light vh-100 pt-4">
        <div class="container-lg h-100">
            {{ $slot }}
        </div>
    </div>

</body>

</html>
