<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
    <style>
        /* Wrapper for full height */
        .wrapper {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Content wrapper spacing according to sidebar and navbar */
        .content-wrapper {
            flex: 1;
            margin-left: 250px; /* default sidebar width */
            padding-top: 70px; /* navbar height */
            transition: margin-left 0.3s ease;
        }

        /* Sidebar collapsed (Quantum Able adds class 'sidebar-collapsed') */
        .sidebar-collapsed ~ .content-wrapper {
            margin-left: 80px;
        }

        /* Footer styling */
        .admin-footer {
            background-color: #f8f9fa;
            border-top: 1px solid #e0e0e0;
            width: 100%;
            text-align: center;
            padding: 15px 0;
            font-size: 0.9rem;
            color: #6c757d;
        }

        /* Responsive adjustments */
        @media (max-width: 991px) {
            .content-wrapper {
                margin-left: 0;
                padding: 20px 15px;
            }

            .admin-footer {
                font-size: 0.85rem;
                padding: 10px 0;
            }
        }
    </style>
</head>

<body class="sidebar-mini fixed">
    <div class="loader-bg">
        <div class="loader-bar"></div>
    </div>

    <div class="wrapper">
        <!-- Navbar -->
        @include('admin.navbar')

        <!-- Sidebar -->
        <aside class="main-sidebar hidden-print">
            <section class="sidebar" id="sidebar-scroll">
                @include('admin.sidebar')
            </section>
        </aside>

        <!-- Sidebar chat -->
        @include('admin.chat')

        <!-- Main content -->
        <div class="content-wrapper">

             @if(session('success'))
                <div class="alert alert-success mt-3">{{ session('success') }}</div>
            @endif

            @yield('admin_layout')

           
        </div>

       
        <footer class="admin-footer">
            &copy; {{ date('Y') }} <strong>MyAdminPanel</strong>. All Rights Reserved.
        </footer>

        <!-- Fixed button -->
        <div class="fixed-button">
            <a href="#!" class="btn btn-md btn-primary">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i> Upgrade To Pro
            </a>
        </div>
    </div>

    <!-- Scripts -->
    @include('admin.script')
</body>

</html>
