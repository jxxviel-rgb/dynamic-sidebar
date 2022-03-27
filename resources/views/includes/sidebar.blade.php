<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown active">
                <a href="tambah-fitur" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Tambah
                        Fitur</span></a>
            </li>
            <li class="nav-item dropdown active">
                <a href="features" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Fitur
                    </span></a>
            </li>
            @foreach ($sidebars as $sidebar)
                {!! $sidebar->html !!}
            @endforeach
            <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                    <i class="fas fa-rocket"></i> Documentation
                </a>
            </div>
    </aside>
</div>
