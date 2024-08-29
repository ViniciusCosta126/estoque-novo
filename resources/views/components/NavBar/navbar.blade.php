<div class="sidebar close bg-dark text-white">
    <div class="logo-details">
        <i class='bx bxl-c-plus-plus'></i>
        <span class="logo_name">SharkSuite</span>
    </div>
    <ul class="nav-links">
        <li>
            <a href="/">
                <i class="fa-solid fa-chart-line"></i>
                <span class="link_name">Home</span>
            </a>
            <ul class="sub-menu blank bg-dark">
                <li><a class="link_name" href="/">Home</a></li>
            </ul>
        </li>
        <li class="active">
            <div class="iocn-link">
                <a>
                    <i class="fa-regular fa-clipboard"></i>
                    <span class="link_name">Adminstrativo</span>
                </a>
                <i class="fa-solid fa-chevron-down arrow"></i>
            </div>
            <ul class="sub-menu bg-dark">
                <li><a class="" href="{{ route('produtos.index') }}">Produtos</a></li>
                <li><a class="" href="{{ route('clientes.index') }}">Clientes</a></li>
                <li><a class="" href="{{ route('categorias.index') }}">Categorias</a></li>
            </ul>
        </li>

</div>

<script>
    let arrow = document.querySelectorAll(".arrow");
    for (var i = 0; i < arrow.length; i++) {
        arrow[i].addEventListener("click", (e) => {
            let arrowParent = e.target.parentElement.parentElement; //selecting main parent of arrow
            arrowParent.classList.toggle("showMenu");
        });
    }
</script>
