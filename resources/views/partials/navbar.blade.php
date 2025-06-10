@php
    $currentUrl = request()->path();
@endphp
<header class="navbar navbar-expand-md d-print-none">
    <div class="container-xl">
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu"
            aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
            <a href=".">
                <svg xmlns="http://www.w3.org/2000/svg" width="132" height="44" fill="none">
                    <path stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.088"
                        d="M32.553 8.787A2.262 2.262 0 0 0 31.42 6.83L23.5 2.303a2.263 2.263 0 0 0-2.263 0L13.316 6.83a2.263 2.263 0 0 0-1.132 1.957v9.053a2.263 2.263 0 0 0 1.132 1.958l7.92 4.526a2.264 2.264 0 0 0 2.264 0l7.921-4.526a2.263 2.263 0 0 0 1.132-1.958V8.787ZM12.524 7.656l9.845 5.658m0 0 9.845-5.658m-9.845 5.658V24.63" />
                    <path stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.088"
                        d="M32.553 8.787A2.262 2.262 0 0 0 31.42 6.83L23.5 2.303a2.263 2.263 0 0 0-2.263 0L13.316 6.83a2.263 2.263 0 0 0-1.132 1.957v9.053a2.263 2.263 0 0 0 1.132 1.958l7.92 4.526a2.264 2.264 0 0 0 2.264 0l7.921-4.526a2.263 2.263 0 0 0 1.132-1.958V8.787ZM12.524 7.656l9.845 5.658m0 0 9.845-5.658m-9.845 5.658V24.63M22.369 26.893a2.264 2.264 0 0 0-1.132-1.958l-7.921-4.526a2.262 2.262 0 0 0-2.263 0L3.05 24.985l.082-.05A2.264 2.264 0 0 0 2 26.893v9.052a2.263 2.263 0 0 0 1.132 1.958l7.92 4.526a2.264 2.264 0 0 0 2.264 0l7.921-4.526a2.264 2.264 0 0 0 1.132-1.958v-9.052ZM2.34 25.761l9.845 5.658m0 0 9.845-5.658m-9.845 5.658v11.316" />
                    <path stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.088"
                        d="M22.369 26.893a2.264 2.264 0 0 0-1.132-1.958l-7.921-4.526a2.262 2.262 0 0 0-2.263 0L3.05 24.985l.082-.05A2.264 2.264 0 0 0 2 26.893v9.052a2.263 2.263 0 0 0 1.132 1.958l7.92 4.526a2.264 2.264 0 0 0 2.264 0l7.921-4.526a2.264 2.264 0 0 0 1.132-1.958v-9.052ZM2.34 25.761l9.845 5.658m0 0 9.845-5.658m-9.845 5.658v11.316" />
                    <path stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.015"
                        d="m26.966 27.393.857-1.71 1.71.856" />
                    <path stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.015"
                        d="M25.788 31.35a3.72 3.72 0 0 0 2.355-4.705l-.32-.963" />
                    <path stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.253"
                        d="m26.966 27.393.857-1.71 1.71.856" />
                    <path stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.253"
                        d="M25.788 31.35a3.72 3.72 0 0 0 2.355-4.705l-.32-.963" />
                    <path stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.015"
                        d="m7.887 17.103-.857 1.711-1.71-.856" />
                    <path stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.015"
                        d="M9.065 13.146a3.72 3.72 0 0 0-2.355 4.705l.32.963" />
                    <path stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.253"
                        d="m7.887 17.103-.857 1.711-1.71-.856" />
                    <path stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.253"
                        d="M9.065 13.146a3.72 3.72 0 0 0-2.355 4.705l.32.963" />
                    <path fill="#000"
                        d="M49.847 32.266v-15.94h2.635v2.313l-.257-.578a4.02 4.02 0 0 1 1.628-1.457c.686-.357 1.479-.536 2.379-.536 1.1 0 2.092.272 2.978.814a5.93 5.93 0 0 1 2.1 2.186c.528.914.792 1.943.792 3.085 0 1.129-.257 2.157-.771 3.086a5.882 5.882 0 0 1-2.1 2.206c-.885.529-1.892.793-3.02.793a5.52 5.52 0 0 1-2.336-.493 4.14 4.14 0 0 1-1.672-1.457l.45-.557v6.535h-2.806Zm6.042-6.599c.643 0 1.214-.15 1.714-.45.5-.3.886-.714 1.157-1.242.286-.529.428-1.136.428-1.822 0-.685-.142-1.285-.428-1.8a3.036 3.036 0 0 0-1.157-1.242c-.5-.314-1.071-.472-1.714-.472-.614 0-1.172.15-1.671.45a3.2 3.2 0 0 0-1.157 1.265c-.272.528-.407 1.128-.407 1.8 0 .685.135 1.292.407 1.82.285.529.67.943 1.157 1.243.5.3 1.057.45 1.67.45ZM68.699 28.238c-1.2 0-2.25-.271-3.15-.814a5.671 5.671 0 0 1-2.1-2.207c-.5-.928-.75-1.957-.75-3.085 0-1.171.25-2.207.75-3.107a5.817 5.817 0 0 1 2.079-2.164c.885-.528 1.871-.793 2.957-.793.914 0 1.714.15 2.4.45.7.3 1.292.714 1.778 1.243a5.536 5.536 0 0 1 1.114 1.821c.257.671.385 1.4.385 2.186 0 .2-.014.407-.042.621-.015.214-.05.4-.108.557h-8.998v-2.143h7.413l-1.329 1.008c.13-.658.093-1.243-.107-1.758a2.435 2.435 0 0 0-.942-1.22c-.429-.3-.95-.45-1.564-.45-.586 0-1.107.15-1.564.45-.458.285-.808.714-1.05 1.285-.229.557-.315 1.235-.257 2.035-.058.715.035 1.35.278 1.907.257.543.629.964 1.114 1.264.5.3 1.072.45 1.714.45.643 0 1.186-.135 1.629-.407a2.912 2.912 0 0 0 1.07-1.093l2.272 1.115a3.97 3.97 0 0 1-1.071 1.478 5.333 5.333 0 0 1-1.736 1.007c-.657.243-1.385.364-2.185.364ZM80.747 28.238c-1.2 0-2.25-.271-3.15-.814a5.671 5.671 0 0 1-2.1-2.207c-.5-.928-.75-1.957-.75-3.085 0-1.171.25-2.207.75-3.107a5.817 5.817 0 0 1 2.079-2.164c.885-.528 1.87-.793 2.957-.793.914 0 1.714.15 2.4.45.7.3 1.292.714 1.778 1.243a5.538 5.538 0 0 1 1.114 1.821c.257.671.385 1.4.385 2.186 0 .2-.014.407-.042.621-.015.214-.05.4-.108.557h-8.999v-2.143h7.414l-1.328 1.008c.128-.658.092-1.243-.108-1.758a2.435 2.435 0 0 0-.942-1.22c-.429-.3-.95-.45-1.564-.45-.586 0-1.108.15-1.565.45-.457.285-.807.714-1.05 1.285-.228.557-.314 1.235-.257 2.035-.057.715.036 1.35.279 1.907.257.543.628.964 1.114 1.264.5.3 1.071.45 1.714.45s1.186-.135 1.629-.407a2.914 2.914 0 0 0 1.07-1.093l2.272 1.115a3.968 3.968 0 0 1-1.071 1.478 5.332 5.332 0 0 1-1.736 1.007c-.657.243-1.385.364-2.185.364ZM87.267 27.981V16.325h2.635v2.293l-.214-.407c.271-.7.714-1.228 1.328-1.586.629-.371 1.357-.557 2.186-.557.857 0 1.614.186 2.27.557a3.924 3.924 0 0 1 1.565 1.564c.371.657.557 1.422.557 2.293v7.5h-2.807v-6.836c0-.514-.1-.957-.3-1.328a2.101 2.101 0 0 0-.835-.857c-.343-.214-.75-.322-1.222-.322-.457 0-.864.108-1.22.322-.358.2-.636.486-.836.857-.2.371-.3.814-.3 1.328v6.835h-2.807Z" />
                    <path fill="#000"
                        d="M97.29 32.716c-.186 0-.38-.007-.58-.021a3.482 3.482 0 0 1-.492-.064v-2.443c.257.043.514.064.771.064.6 0 1.064-.143 1.393-.428.343-.272.514-.693.514-1.264V16.325h2.807V28.56c0 .885-.179 1.635-.536 2.25a3.37 3.37 0 0 1-1.542 1.414c-.657.328-1.436.492-2.336.492Zm1.606-17.698v-3h2.807v3h-2.807ZM106.759 28.238c-.815 0-1.522-.136-2.122-.407-.6-.271-1.064-.657-1.392-1.157-.329-.514-.493-1.107-.493-1.778 0-.643.143-1.214.428-1.714.286-.514.729-.943 1.329-1.286.6-.343 1.357-.585 2.271-.728l3.814-.622v2.143l-3.278.557c-.557.1-.972.279-1.243.536-.271.257-.407.592-.407 1.007 0 .4.15.721.45.964.314.228.7.343 1.157.343.585 0 1.1-.122 1.542-.365a2.647 2.647 0 0 0 1.05-1.05c.257-.442.386-.928.386-1.456v-3c0-.5-.2-.914-.6-1.243-.386-.343-.9-.514-1.543-.514-.6 0-1.135.164-1.607.493a2.758 2.758 0 0 0-1.007 1.264l-2.292-1.114a3.998 3.998 0 0 1 1.071-1.586 5.481 5.481 0 0 1 1.757-1.071 6.059 6.059 0 0 1 2.185-.386c.958 0 1.8.179 2.529.536.728.343 1.292.828 1.692 1.457.415.614.622 1.335.622 2.164v7.756h-2.657v-1.993l.6-.042c-.3.5-.657.921-1.071 1.264a4.844 4.844 0 0 1-1.415.771 5.668 5.668 0 0 1-1.756.257ZM114.581 27.981V16.325h2.635v2.7l-.3-.45c.214-.843.643-1.471 1.286-1.885.642-.415 1.399-.622 2.271-.622.957 0 1.8.25 2.528.75.729.5 1.2 1.157 1.414 1.971l-.793.065c.358-.929.893-1.622 1.607-2.079.715-.471 1.536-.707 2.464-.707.829 0 1.564.186 2.207.557a3.962 3.962 0 0 1 1.543 1.564c.371.657.557 1.422.557 2.293v7.5h-2.807v-6.836c0-.514-.093-.957-.278-1.328a2.048 2.048 0 0 0-.772-.857c-.328-.214-.728-.322-1.2-.322-.442 0-.835.108-1.178.322-.343.2-.607.486-.793.857-.185.371-.278.814-.278 1.328v6.835h-2.807v-6.835c0-.514-.093-.957-.279-1.328a2.003 2.003 0 0 0-.792-.857c-.329-.214-.722-.322-1.179-.322-.443 0-.835.108-1.178.322-.343.2-.607.486-.793.857-.186.371-.279.814-.279 1.328v6.835h-2.806Z" />
                </svg>
            </a>
        </div>

        <!-- Right Side Items -->
        <div class="navbar-nav flex-row order-md-last gap-5">
            <!-- User Dropdown -->
            @if ($user)
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link d-flex lh-1 p-0 px-2" data-bs-toggle="dropdown"
                        aria-label="Open user menu">
                        <span class="avatar avatar-sm" style="background-image: url(./static/avatars/000m.jpg)"></span>
                        <div class="d-none d-xl-block ps-2">
                            <div>{{ $user->name }}</div>
                            <div class="mt-1 small text-secondary">{{ $user->role->name }}</div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <form action="{{ route('auth.logout') }}" method="POST">
                            @csrf
                            <button type="submit"class="dropdown-item">Logout</button>
                        </form>
                    </div>
                </div>
            @endif
            <button class="" style="  all: unset; cursor: pointer; " id="themeToggle"><svg
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-moon">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path
                        d="M12 1.992a10 10 0 1 0 9.236 13.838c.341 -.82 -.476 -1.644 -1.298 -1.31a6.5 6.5 0 0 1 -6.864 -10.787l.077 -.08c.551 -.63 .113 -1.653 -.758 -1.653h-.266l-.068 -.006l-.06 -.002z" />
                </svg>
            </button>
        </div>
    </div>
</header>

@if (!in_array(request()->path(), ['login', 'register']))
    <header class="navbar-expand-md">
        <div class="navbar-collapse collapse" id="navbar-menu">
            @if (!Request::is('/'))
                <div class="navbar">
                    <div class="container-xl">
                        <div class="row flex-column flex-md-row flex-fill align-items-center">
                            <div class="col">

                                <ul class="navbar-nav">
                                    <li class="nav-item {{ $currentUrl === 'dashboard' ? 'active' : '' }}">
                                        <a class="nav-link" href="/dashboard">
                                            <span class="nav-link-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-layout-dashboard">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M5 4h4a1 1 0 0 1 1 1v6a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-6a1 1 0 0 1 1 -1" />
                                                    <path
                                                        d="M5 16h4a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-2a1 1 0 0 1 1 -1" />
                                                    <path
                                                        d="M15 12h4a1 1 0 0 1 1 1v6a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-6a1 1 0 0 1 1 -1" />
                                                    <path
                                                        d="M15 4h4a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-2a1 1 0 0 1 1 -1" />
                                                </svg>
                                            </span>
                                            <span class="nav-link-title"> Dashboard </span>
                                        </a>
                                    </li>
                                    <!-- Only Home Menu Item -->
                                    @if (($user && $user->role->name === 'admin') || 'user')
                                        <li class="nav-item {{ $currentUrl === 'items' ? 'active' : '' }}">
                                            <a class="nav-link" href="/items">
                                                <span class="nav-link-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-archive">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path
                                                            d="M3 4m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" />
                                                        <path d="M5 8v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-10" />
                                                        <path d="M10 12l4 0" />
                                                    </svg>
                                                </span>
                                                <span class="nav-link-title"> Items </span>
                                            </a>
                                        </li>
                                    @endif
                                    @if ($user && $user->role->name === 'admin')
                                        <li class="nav-item {{ $currentUrl === 'users' ? 'active' : '' }}">
                                            <a class="nav-link" href="/users">
                                                <span class="nav-link-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-users">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                                        <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                                        <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                                                    </svg>
                                                </span>
                                                <span class="nav-link-title"> Users </span>
                                            </a>
                                        </li>
                                        <li class="nav-item {{ $currentUrl === 'categories' ? 'active' : '' }}">
                                            <a class="nav-link" href="/categories">
                                                <span class="nav-link-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-category">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M4 4h6v6h-6z" />
                                                        <path d="M14 4h6v6h-6z" />
                                                        <path d="M4 14h6v6h-6z" />
                                                        <path d="M17 17m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                                    </svg>
                                                </span>
                                                <span class="nav-link-title"> Categories </span>
                                            </a>
                                        </li>
                                    @endif
                                    @if (($user && $user->role->name === 'admin') || 'user')
                                        <li class="nav-item {{ $currentUrl === 'records' ? 'active' : '' }}">
                                            <a class="nav-link" href="/records">
                                                <span class="nav-link-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-report">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M8 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h5.697" />
                                                        <path d="M18 14v4h4" />
                                                        <path d="M18 11v-4a2 2 0 0 0 -2 -2h-2" />
                                                        <path
                                                            d="M8 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                                                        <path d="M18 18m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                                        <path d="M8 11h4" />
                                                        <path d="M8 15h3" />
                                                    </svg>
                                                </span>
                                                <span class="nav-link-title"> Records </span>
                                            </a>
                                        </li>
                                        <li class="nav-item {{ $currentUrl === 'requests' ? 'active' : '' }}">
                                            <a class="nav-link" href="/requests">
                                                <span class="nav-link-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-report">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M8 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h5.697" />
                                                        <path d="M18 14v4h4" />
                                                        <path d="M18 11v-4a2 2 0 0 0 -2 -2h-2" />
                                                        <path
                                                            d="M8 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                                                        <path d="M18 18m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                                        <path d="M8 11h4" />
                                                        <path d="M8 15h3" />
                                                    </svg>
                                                </span>
                                                <span class="nav-link-title"> Request </span>
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </header>
@endif
