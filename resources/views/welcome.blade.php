<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>


    <nav class="main-header navbar navbar-expand navbar-white navbar-light">

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                        class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Home</a>
            </li>
        </ul>

    </nav>


    <aside class="main-sidebar sidebar-dark-primary elevation-4">

        <a href="/" class="brand-link">
            <img src="https://adminlte.io/themes/v3/dist/img/AdminLTELogo.png" alt="Demo"
                class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Welcome</span>
        </a>

        <div class="sidebar">

            <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            </div>

            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">


                    <li class="nav-item">
                        <router-link to="/" active-class="active" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Welcome
                            </p>
                        </router-link>
                    </li>
                </ul>
            </nav>

        </div>

    </aside>

    <div class="content-wrapper">
        <div id="app"></div>
        <router-view></router-view>

    </div>


    <aside class="control-sidebar control-sidebar-dark">

        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>
</div>
</body>

</html>
