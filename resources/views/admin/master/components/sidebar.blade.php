<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('admin.banks.index') }}">
                <i class="bi bi-newspaper"></i>
                <span>Financeiras</span>
            </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('admin.auctions.index') }}">
                <i class="bi bi-receipt-cutoff"></i>
                <span>Leilões</span>
            </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('admin.vehicles.index') }}">
                <i class="bi bi-truck"></i>
                <span>Veículos</span>
            </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('admin.properties.index') }}">
                <i class="bi bi-house"></i>
                <span>Imóveis</span>
            </a>
        </li><!-- End Profile Page Nav -->


    </ul>

</aside><!-- End Sidebar-->
