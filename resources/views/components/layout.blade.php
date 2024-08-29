<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>{{ $title ?? 'Teste Pagina' }}</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>

<body class="min-vh-100 ">
    <x-NavBar.navbar />
    <div class="home-section bg-light vh-100 pt-2">
        <div class="home-content vh-100 ">
            <div>
                <i class="fa-solid fa-bars"></i>
            </div>
            {{ $slot }}
        </div>

    </div>
    <script>
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".fa-bars");
        console.log(sidebarBtn);
        sidebarBtn.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        });
    </script>
</body>

</html>
