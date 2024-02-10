<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <main class="d-flex flex-nowrap">
        <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark sticky-top" style="width: 280px; height: 100vh">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <span class="display-6">Admin Page</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item ">
                    <a href="/admin" class="nav-link text-white {{ $active === 'home' ? 'active bg-primary' : '' }}">
                        <img src="{{ URL::to('/') }}/images/admin/home.svg" alt="" class="pe-none me-2 mb-1">
                        Home
                    </a>
                </li>
                <li class="mb-1">
                    <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 text-white"
                        data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="true">
                        <img src="{{ URL::to('/') }}/images/admin/thunder.svg" width="16" height="16"
                            class="pe-none me-3 ms-1 mt-1">
                        Espers
                    </button>
                    <div class="collapse show" id="dashboard-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ">
                            <li><a href="../espers/show.html"
                                    class="link-body-emphasis text-white d-inline-flex text-decoration-none rounded {{ $active === 'espers' ? 'bg-primary ps-3 pe-3' : '' }}">
                                    Espers
                                </a>
                            </li>
                            <li><a href="show.html"
                                    class="link-body-emphasis text-white d-inline-flex text-decoration-none rounded {{ $active === 'elements' ? 'bg-primary ps-3 pe-3' : '' }}">
                                    Element
                                </a>
                            </li>
                            <li><a href="#"
                                    class="link-body-emphasis text-white d-inline-flex text-decoration-none rounded {{ $active === 'ability' ? 'bg-primary ps-3 pe-3' : '' }}">
                                    Ability
                                </a>
                            </li>
                            <li><a href="#"
                                    class="link-body-emphasis text-white d-inline-flex text-decoration-none rounded {{ $active === 'captain' ? 'bg-primary ps-3 pe-3' : '' }}">
                                    Captain ability</a></li>
                            <li><a href="#"
                                    class="link-body-emphasis text-white d-inline-flex text-decoration-none rounded {{ $active === 'buff' ? 'bg-primary ps-3 pe-3' : '' }}">
                                    Buff/debuff</a></li>
                            <li><a href="#"
                                    class="link-body-emphasis text-white d-inline-flex text-decoration-none rounded {{ $active === 'equipment' ? 'bg-primary ps-3 pe-3' : '' }}">Equipment</a>
                            </li>
                            <li><a href="#"
                                    class="link-body-emphasis text-white d-inline-flex text-decoration-none rounded {{ $active === 'gallery' ? 'bg-primary ps-3 pe-3' : '' }}">Gallery</a>
                            </li>
                            <li><a href="#"
                                    class="link-body-emphasis text-white d-inline-flex text-decoration-none rounded {{ $active === 'history' ? 'bg-primary ps-3 pe-3' : '' }}">History</a>
                            </li>
                            <li><a href="#"
                                    class="link-body-emphasis text-white d-inline-flex text-decoration-none rounded {{ $active === 'divinate' ? 'bg-primary ps-3 pe-3' : '' }}">Divinate
                                    cards</a></li>
                            <li><a href="#"
                                    class="link-body-emphasis text-white d-inline-flex text-decoration-none rounded {{ $active === 'skins' ? 'bg-primary ps-3 pe-3' : '' }}">Skins</a>
                            </li>
                            <li><a href="#"
                                    class="link-body-emphasis text-white d-inline-flex text-decoration-none rounded {{ $active === 'relations' ? 'bg-primary ps-3 pe-3' : '' }}">Relations</a>
                            </li>

                        </ul>
                    </div>

                </li>
                <li>
                    <a href="#" class="nav-link text-white">
                        <img src="{{ URL::to('/') }}/images/admin/bloquote-left.svg" alt=""
                            class="pe-none me-2 mb-1 {{ $active === 'blog' ? 'active bg-primary' : '' }}">
                        Blog
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white {{ $active === 'users' ? 'active bg-primary' : '' }}">
                        <img src="{{ URL::to('/') }}/images/admin/person-fill.svg" alt=""
                            class="pe-none me-2 mb-1">
                        Users
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="nav-link text-white {{ $active === 'analysis' ? 'active bg-primary' : '' }}">
                        <img src="{{ URL::to('/') }}/images/admin/bar-chart-fill.svg" alt=""
                            class="pe-none me-2 mb-1">
                        Analysis
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="nav-link text-white {{ $active === 'admins' ? 'active bg-primary' : '' }}">
                        <img src="{{ URL::to('/') }}/images/admin/person-admin.svg" alt=""
                            class="pe-none me-2 mb-1">
                        Admins
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white {{ $active === 'other' ? 'active bg-primary' : '' }}">
                        <img src="{{ URL::to('/') }}/images/admin/three-dots.svg" alt=""
                            class="pe-none me-2 mb-1">
                        Other
                    </a>
                </li>
            </ul>
            <hr>
            <div class="dropdown">

                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ URL::to('/') }}/images/admin/icon.webp" alt="" width="32" height="32"
                        class="rounded-circle me-2">
                    <strong>admin</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item link-danger link-underline link-underline-opacity-0" href="#">Sign
                            out</a></li>
                </ul>
            </div>
        </div>
        <div class=" d-flex flex-column flex-shrink-1 container py-4 h-100 bg-white">
            @yield('content')
        </div>

    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    @yield('scripts')
</body>

</html>
