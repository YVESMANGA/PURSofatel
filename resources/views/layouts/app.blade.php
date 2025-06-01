<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- AdminLTE -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/plugins/jquery/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="#" class="brand-link">
        <span class="block mx-auto text-center text-2xl font-bold">
  <span class="text-orange-500">SOF</span><span class="text-white">Atel</span>
</span>

            
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
    <nav class="mt-6">
        <ul class="nav nav-pills nav-sidebar flex-column space-y-2" data-widget="treeview" role="menu">

        @if (Auth::check() && Auth::user()->role === 'bo')
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-file-import text-orange"></i>
                    <p>Fichier Importer</p>
                </a>
            </li>
            <li class="nav-item mt-4">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-truck text-orange"></i>
                    <p>Dispatching Demandes</p>
                </a>
            </li>
            <li class="nav-item mt-4">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-users text-orange"></i>
                    <p>Liste Equipe Dispo</p>
                </a>
            </li>
            <li class="nav-item mt-4">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-list text-orange"></i>
                    <p>Créer Liste</p>
                </a>
            </li>
        @endif
        </ul>
    </nav>
</div>

        <!-- /.sidebar -->
    </aside>

    @include('layouts.navigation')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @isset($header)
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $header }}</h1>
                    </div>
                </div>
            </div>
        </div>
        @endisset

        <div class="content">
            <div class="container-fluid">
                {{ $slot }}
            </div>
        </div>
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer text-sm">
        <strong>&copy; {{ date('Y') }} PUR.</strong> Tous droits réservés.
    </footer>
</div>
</body>
</html>
