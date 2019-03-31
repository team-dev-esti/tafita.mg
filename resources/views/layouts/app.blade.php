<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.head')
    <title>Tafita</title>
</head>
<body>
    <div>
            <nav class="navbar bordered">
                    <div class="container">
                        <div class="navbar-brand">
                            <a href="/" class="navbar-item" href="">
                                <img src="{{asset('img/loho_header.png')}}" alt="Logo">
                            </a>
                            <span class="navbar-burger burger" data-target="navbarMenu">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </div>
                        <div id="navbarMenu" class="navbar-menu">
                            <div class="navbar-end">
                                <a href="/" class="navbar-item is-active">
                                    Acceuil
                                </a>
                                <a href="{{ route('mooc.index')}}" class="navbar-item">
                                    Mooc
                                </a>
                                <a  href="{{ route('events.index')}}" class="navbar-item">
                                    Evènements
                                </a>
                                
                                    @auth
                                        <div class="navbar-item has-dropdown is-hoverable">
                                            <a class="navbar-link">
                                                @if(Auth::user()->avatar === null)
                                                <img style="border-radius:28%" src="https://api.adorable.io/avatars/100/{{Auth::user()->name}}@adorable.png">
                                                @else
                                                @endif
                                            </a>
                                            <div class="navbar-dropdown">
                                                    <a href="{{ url('/home') }}" class="navbar-item">
                                                        Home
                                                    </a>
                                                    <a class="navbar-item">
                                                        Profile
                                                    </a>
                                                    <a class="navbar-item">
                                                        Settings
                                                    </a>
                                                    <hr class="navbar-divider">
                                                    <div class="navbar-item">
                                                        <a href="{{ route('logout') }}"
                                                            onclick="event.preventDefault();
                                                                          document.getElementById('logout-form').submit();">
                                                             Déconnexion
                                                         </a>
                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none">
                                                            @csrf
                                                            <button type="submit">Deconnexion</button>
                                                        </form>
                                                    </div>
                                            </div>
                                        </div>
                                    @else
                                    <span class="navbar-item">
                                    <a class="button is-danger is-outlined" href="{{ route('login') }}"
                                        style="margin-right: 10px">
    
                                        <span>Se connecter</span>
                                    </a>
                                    <a class="button is-danger is-full" href="{{ route('register') }}">
    
                                        <span>S'inscrire</span>
                                    </a>
                                    </span>
                                    @endauth
    
    
                               
    
                                <!-- <div class="navbar-item has-dropdown is-hoverable">
                                    <a class="navbar-link">
                                        Account
                                    </a>
                                    <div class="navbar-dropdown">
                                        <a class="navbar-item">
                                            Dashboard
                                        </a>
                                        <a class="navbar-item">
                                            Profile
                                        </a>
                                        <a class="navbar-item">
                                            Settings
                                        </a>
                                        <hr class="navbar-divider">
                                        <div class="navbar-item">
                                            Logout
                                        </div>
                                    </div>
                                </div> -->
    
                            </div>
                        </div>
                    </div>
                </nav>
        <main>
            @yield('content')
        </main>
    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script>
        ClassicEditor
            .create(document.getElementById('editor'))
            .catch( error => {
                console.error( error );
            } );
    </script>
</body>
</html>
