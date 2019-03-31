<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
    <title>Acceuil</title>
</head>

<body>

    <!-- END NAV -->
    <section class="hero is-fullheight is-default is-bold has-background-link">
        <div class="hero-head">
            <nav class="navbar is-transparent">
                <div class="container">
                    <div class="navbar-brand">
                        <a class="navbar-item" href="">
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
                            <a class="navbar-item is-active has-text-white">
                                Home
                            </a>
                            <a href="{{ route('mooc.index')}}" class="navbar-item has-text-white">
                                Mooc
                            </a>
                            <a class="navbar-item has-text-white">
                                Blog
                            </a>
                            
                                @auth
                                    <div class="navbar-item has-dropdown is-hoverable">
                                        <a class="navbar-link has-text-white">
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
        </div>
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="columns is-vcentered">
                    <div class="column is-5">
                        <figure class="image">
                            <div class="wrap">
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 850.4 408.7"
                                    enable-background="new 0 0 850.4 408.7" xml:space="preserve">
                                    <g class="rol">
                                        <g class="rol-rotate rol-rotate--5">
                                            <rect x="32.1" y="50.2" fill="#FFFFFF" width="54.1" height="34.7" />
                                            <path fill="#FBB616"
                                                d="M70.1,68.2c0-6-4.9-10.9-10.9-10.9s-10.9,4.9-10.9,10.9H70.1z" />
                                            <rect x="37" y="72.5" fill="#1D4495" width="43.8" height="7.1" />
                                            <line fill="none" stroke="#444445" stroke-width="3.7947"
                                                stroke-miterlimit="10" x1="86.3" y1="50.2" x2="86.3" y2="129" />
                                        </g>
                                        <g class="rol-rotate rol-rotate--6">
                                            <rect x="765.2" y="51" fill="#FBB616" width="54.1" height="34.7" />
                                            <line fill="none" stroke="#444445" stroke-width="3.7947"
                                                stroke-miterlimit="10" x1="764.2" y1="50.2" x2="764.2" y2="114" />
                                            <polygon fill="#FBB616"
                                                points="796.9,78.6 792.9,71.3 790.2,71.3 790.2,72.5 790.9,72.5 790.9,78.6 781.6,78.6 781.6,72.5 782.9,72.5 782.9,64.2 781.6,64.2 781.6,58.1 798.5,58.1 802.5,61.9 802.5,68 799.9,70 801.3,72.4 803,72.4 803,78.6 				" />
                                            <path fill="#1D4495"
                                                d="M798.1,59.1l3.4,3.2v5.2l-3,2.2l2.2,3.8h1.3v4.1h-4.4l-4.1-7.3h-4.3v3.3h0.7v4h-7.3v-4h1.3V63.2h-1.3v-4.1H798.1 M798.9,57.1h-0.8h-15.5h-2v2v4.1v2h1.3v6.2h-1.3v2v4v2h2h7.3h2v-2v-4v-1.2h0.3l3.5,6.2l0.6,1h1.2h4.4h2v-2v-4.1v-2h-2h-0.1l-0.7-1.2l1.5-1.1l0.8-0.6v-1v-5.2v-0.9l-0.6-0.6l-3.4-3.2L798.9,57.1L798.9,57.1z" />
                                            <polygon fill="#1D4495"
                                                points="788.9,63.3 788.9,66.5 795.5,66.5 796.3,65.6 796.3,64 795.6,63.3 			" />
                                        </g>
                                        <polygon class="rol-slide rol-slide--2" fill="#C1803E"
                                            points="16.1,123.7 86.4,100.5 156.8,123.7 	" />
                                        <polygon class="rol-slide rol-slide--3" fill="#ECD1B5"
                                            points="157.6,132.9 15.3,132.9 8.8,123.9 164,123.9 	" />
                                        <rect class="rol-scaleV rol-scaleV--3" x="15.2" y="132.9" fill="#FFEEDC"
                                            width="142.1" height="275.8" />
                                        <path class="rol-bounce rol-bounce--6" fill="#3F4953"
                                            d="M86.3,182.2c-6.1,0-11.1,5-11.1,11.1v33.4h22.2v-33.4C97.4,187.1,92.4,182.2,86.3,182.2z" />
                                        <rect class="rol-scaleH rol-scaleH--4" x="71.3" y="221.2" fill="#CCC1B5"
                                            width="29.8" height="5.5" />
                                        <path class="rol-bounce rol-bounce--7" fill="#3F4953"
                                            d="M86.3,269.5c-6.1,0-11.1,5-11.1,11.1V314h22.2v-33.4C97.4,274.5,92.4,269.5,86.3,269.5z" />
                                        <rect class="rol-scaleH rol-scaleH--5" x="71.3" y="308.5" fill="#CCC1B5"
                                            width="29.8" height="5.5" />
                                        <polygon class="rol-slide rol-slide--2" fill="#C1803E"
                                            points="693.8,123.7 764.1,100.5 834.4,123.7 	" />
                                        <polygon class="rol-slide rol-slide--3" fill="#ECD1B5"
                                            points="835.3,132.9 692.9,132.9 686.5,123.9 841.7,123.9 	" />
                                        <rect class="rol-scaleV rol-scaleV--4" x="693.1" y="132.9" fill="#FFEEDC"
                                            width="142.1" height="275.8" />
                                        <path class="rol-bounce rol-bounce--6" fill="#3F4953"
                                            d="M764.1,182.2c-6.1,0-11.1,5-11.1,11.1v33.4h22.2v-33.4C775.2,187.1,770.2,182.2,764.1,182.2z" />
                                        <rect class="rol-scaleH rol-scaleH--4" x="749.2" y="221.2" fill="#CCC1B5"
                                            width="29.8" height="5.5" />
                                        <path class="rol-bounce rol-bounce--7" fill="#3F4953"
                                            d="M764.1,269.5c-6.1,0-11.1,5-11.1,11.1V314h22.2v-33.4C775.2,274.5,770.2,269.5,764.1,269.5z" />
                                        <rect class="rol-scaleH rol-scaleH--5" x="749.2" y="308.5" fill="#CCC1B5"
                                            width="29.8" height="5.5" />
                                        <rect class="rol-scaleV rol-scaleV--1" x="157.3" y="201.2" fill="#EEDFCF"
                                            width="535.8" height="207.5" />
                                        <polygon class="rol-scaleV rol-scaleV--11" fill="#C1803E"
                                            points="701.6,201.2 148.8,201.2 157.3,187.5 693.1,187.5 	" />
                                        <path class="rol-rotate rol-rotate--1" fill="#DDC3AA"
                                            d="M210,334.5c-3.1-2.4-7.4-2.4-10.5,0c-6.2,4.7-15.5,13-15.5,19.5v54.8h41.6V354C225.6,347.5,216.2,339.2,210,334.5z" />
                                        <path class="rol-rotate rol-rotate--3" fill="#DDC3AA"
                                            d="M283.5,334.5c-3.1-2.4-7.4-2.4-10.5,0c-6.2,4.7-15.5,13-15.5,19.5v54.8H299V354C299,347.5,289.6,339.2,283.5,334.5z" />
                                        <path class="rol-rotate rol-rotate--4" fill="#DDC3AA"
                                            d="M576.6,334.5c-3.1-2.4-7.4-2.4-10.5,0c-6.2,4.7-15.5,13-15.5,19.5v54.8h41.6V354C592.2,347.5,582.8,339.2,576.6,334.5z" />
                                        <path class="rol-rotate rol-rotate--2" fill="#DDC3AA"
                                            d="M650.1,334.5c-3.1-2.4-7.4-2.4-10.5,0c-6.2,4.7-15.5,13-15.5,19.5v54.8h41.6V354C665.6,347.5,656.2,339.2,650.1,334.5z" />
                                        <circle class="rol-scale rol-scale--1" fill="#A09E86" cx="186.7" cy="250.9"
                                            r="11.5" />
                                        <circle class="rol-scale rol-scale--5" fill="#A09E86" cx="223.8" cy="250.9"
                                            r="11.5" />
                                        <circle class="rol-scale rol-scale--3" fill="#A09E86" cx="261" cy="250.9"
                                            r="11.5" />
                                        <circle class="rol-scale rol-scale--7" fill="#A09E86" cx="298.1" cy="250.9"
                                            r="11.5" />
                                        <path class="rol-scaleV rol-scaleV--9" fill="#FFEEDC"
                                            d="M329.7,204.4v23.8h-11.9V224c0-4.9-4-8.8-8.8-8.8c-4.9,0-8.8,3.9-8.8,8.8v4.2h-14.3V224c0-4.9-3.9-8.8-8.8-8.8s-8.8,3.9-8.8,8.8v4.2h-14.3V224c0-4.9-4-8.8-8.8-8.8s-8.8,3.9-8.8,8.8v4.2H222V224c0-4.9-4-8.8-8.8-8.8s-8.8,3.9-8.8,8.8v4.2H190V224c0-4.9-4-8.8-8.8-8.8s-8.8,3.9-8.8,8.8v4.2h-15.1v-23.8H329.7z" />
                                        <circle class="rol-scale rol-scale--4" fill="#A09E86" cx="550.6" cy="250.9"
                                            r="11.5" />
                                        <circle class="rol-scale rol-scale--8" fill="#A09E86" cx="587.7" cy="250.9"
                                            r="11.5" />
                                        <circle class="rol-scale rol-scale--2" fill="#A09E86" cx="624.9" cy="250.9"
                                            r="11.5" />
                                        <circle class="rol-scale rol-scale--6" fill="#A09E86" cx="662" cy="250.9"
                                            r="11.5" />
                                        <path class="rol-scaleV rol-scaleV--10" fill="#FFEEDC"
                                            d="M520.6,204.4v23.8h11.9V224c0-4.9,4-8.8,8.8-8.8c4.9,0,8.8,3.9,8.8,8.8v4.2h14.3V224c0-4.9,3.9-8.8,8.8-8.8s8.8,3.9,8.8,8.8v4.2h14.3V224c0-4.9,4-8.8,8.8-8.8s8.8,3.9,8.8,8.8v4.2h14.3V224c0-4.9,4-8.8,8.8-8.8s8.8,3.9,8.8,8.8v4.2h14.3V224c0-4.9,4-8.8,8.8-8.8s8.8,3.9,8.8,8.8v4.2h15.1v-23.8H520.6z" />
                                        <rect class="rol-scaleH rol-scaleH--6" x="156" y="281.1" fill="#C1803E"
                                            width="537.1" height="12.5" />
                                        <polygon class="rol-slide rol-slide--1" fill="#C1803E"
                                            points="330.4,31.3 425.2,0 519.9,31.3 	" />
                                        <rect class="rol-scaleV rol-scaleV--2" x="329.7" y="43.7" fill="#FFEEDC"
                                            width="190.9" height="365" />
                                        <path class="rol-scale rol-scale--10" fill="#EEDFCF"
                                            d="M424.5,270.8c0,0-41.5,36.9-41.5,52v85.9h84.2v-85.9C467.3,307.7,424.5,270.8,424.5,270.8z" />
                                        <circle class="rol-scale rol-scale--9" fill="#C6C5B6" cx="424.5" cy="239.4"
                                            r="13.2" />
                                        <rect class="rol-scaleV rol-scaleV--13" x="398.3" y="124.4" fill="#A09E86"
                                            width="53.7" height="74" />
                                        <rect class="rol-scaleH rol-scaleH--7" x="393.6" y="195.4" fill="#CCC1B5"
                                            width="63.1" height="5.7" />
                                        <polygon class="rol-slide rol-slide--4" fill="#ECD1B5"
                                            points="521.1,43.7 329.3,43.7 320.6,31.5 529.7,31.5 	" />
                                        <path class="rol-bounce rol-bounce--1" fill="#3F4953"
                                            d="M359.2,69.2c-5,0-9.1,4.1-9.1,9.1v11.3h18.2V78.3C368.3,73.2,364.2,69.2,359.2,69.2z" />
                                        <path class="rol-bounce rol-bounce--2" fill="#3F4953"
                                            d="M392.2,69.2c-5,0-9.1,4.1-9.1,9.1v11.3h18.2V78.3C401.3,73.2,397.2,69.2,392.2,69.2z" />
                                        <path class="rol-bounce rol-bounce--3" fill="#3F4953"
                                            d="M425.2,69.2c-5,0-9.1,4.1-9.1,9.1v11.3h18.2V78.3C434.3,73.2,430.2,69.2,425.2,69.2z" />
                                        <path class="rol-bounce rol-bounce--4" fill="#3F4953"
                                            d="M458.2,69.2c-5,0-9.1,4.1-9.1,9.1v11.3h18.2V78.3C467.3,73.2,463.2,69.2,458.2,69.2z" />
                                        <path class="rol-bounce rol-bounce--5" fill="#3F4953"
                                            d="M491.2,69.2c-5,0-9.1,4.1-9.1,9.1v11.3h18.2V78.3C500.3,73.2,496.2,69.2,491.2,69.2z" />
                                        <rect class="rol-scaleH rol-scaleH--3" x="343.8" y="89.6" fill="#CCC1B5"
                                            width="162.7" height="5.7" />
                                        <rect class="rol-scaleH rol-scaleH--1" y="378" fill="#A5A739" width="351.3"
                                            height="30.7" />
                                        <rect class="rol-scaleH rol-scaleH--2" x="499.1" y="378" fill="#A5A739"
                                            width="351.3" height="30.7" />
                                        <rect class="rol-scaleV rol-scaleV--12" x="520.6" y="201.2" fill="#EEDFCF"
                                            width="181" height="6.7" />
                                        <rect class="rol-scaleV rol-scaleV--12" x="148.8" y="201.2" fill="#EEDFCF"
                                            width="181" height="6.7" />
                                        <g class="rol-scaleV rol-scaleV--8">
                                            <rect x="628.2" y="170" fill="#FFEEDC" width="30.2" height="24.4" />
                                            <rect x="633.7" y="170" fill="#C6C5B6" width="19.2" height="24.4" />
                                            <polygon fill="#C1803E" points="628.2,170 643.4,158.7 658.6,170 		" />
                                        </g>
                                        <g class="rol-scaleV rol-scaleV--7">
                                            <rect x="561" y="170" fill="#FFEEDC" width="30.2" height="24.4" />
                                            <rect x="566.5" y="170" fill="#C6C5B6" width="19.2" height="24.4" />
                                            <polygon fill="#C1803E" points="561,170 576.2,158.7 591.4,170 		" />
                                        </g>
                                        <g class="rol-scaleV rol-scaleV--6">
                                            <rect x="259.3" y="170" fill="#FFEEDC" width="30.2" height="24.4" />
                                            <rect x="264.8" y="170" fill="#C6C5B6" width="19.2" height="24.4" />
                                            <polygon fill="#C1803E" points="259.3,170 274.4,158.7 289.6,170 		" />
                                        </g>
                                        <g class="rol-scaleV rol-scaleV--5">
                                            <rect x="192.1" y="170" fill="#FFEEDC" width="30.2" height="24.4" />
                                            <rect x="197.6" y="170" fill="#C6C5B6" width="19.2" height="24.4" />
                                            <polygon fill="#C1803E" points="192.1,170 207.3,158.7 222.5,170 		" />
                                        </g>
                                    </g>
                                </svg>
                            </div>
                        </figure>
                    </div>
                    <div class="column is-6 is-offset-1">
                            <h1 class="title is-2">
                                <img src="{{asset('img/TAFITA.png')}}" alt="logo2">
                            </h1>
                            <h2 class="subtitle is-4">
                                Travailler plus facilement.
                            </h2>
                            <br>
                           
                        </div>
                </div>
            </div>
        </div>

    </section>
    <div class="box cta">
        <p class="has-text-centered">
            <span class="tag is-info">Beta 0.1.1</span>
            tafita.mg version beta, Dds nouvelles fonctionnalités sont en cours de developpement ainsi que
            la correction des eventuelle bug,
            aider nous à améliorer l'application sur <a href="https://github.com/team-dev-esti/tafita.mg">GitHub</a>

        </p>
    </div>
    <section class="container">
        <div class="columns features">
            <div class="column is-4">
                <div class="card is-shady">
                    <div class="card-image has-text-centered">
                        <img src="{{asset('img/objects3.png')}}" alt="">
                       
                    </div>
                    <div class="card-content">
                        <div class="content">
                            <h4>Facilité votre inscription sur les institutions supérieur ou formation</h4>
                            <p>Vous en avez marre de faire la queue lors des inscription à des évènements, vous pouvez
                                desormais s'inscrire en ligne à des évenements et reutilisée vos dossier numériques</p>
                            <p><a href="#">Learn more</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column is-4">
                <div class="card is-shady">
                    <div class="card-image has-text-centered">
                        <img height="348px" src="{{asset('img/OBJECTS.svg')}}" alt="">
                    </div>
                    <div class="card-content">
                        <div class="content">
                            <h4>Partager vos connaissances</h4>
                            <p>A traves notre Mooc vous pouvez partager vos connaissances sur notre Mooc</p>
                            <p><a href="#">Learn more</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column is-4">
                <div class="card is-shady">
                    <div class="card-image has-text-centered">
                        <img src="{{asset('img/OBJECTS2.png')}}" alt="">
                    </div>
                    <div class="card-content">
                        <div class="content">
                            <h4>Etes vous une institution</h4>
                            <p>Par notre application, vous pouvez gérer les inscription à des évènement que vous
                                préparez, et optimisez votre temps et ressource</p>
                            <p><a href="#">Learn more</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="intro column is-8 is-offset-2">
            <h2 class="title">Mooc</h2><br>
            <p class="subtitle">

                <blockquote>La connaissance, c'est partager le savoir qui nous fait grandir.</blockquote>
                partager vos connaissance sur notre plateforme
            </p>
        </div>
        <div class="sandbox">
            <div class="tile is-ancestor">
                <div class="tile is-parent is-shady">
                    <article class="tile is-child notification is-white">
                        <p class="title">Hello World</p>
                        <p class="subtitle">What is up?</p>
                    </article>
                </div>
                <div class="tile is-parent is-shady">
                    <article class="tile is-child notification is-white">
                        <p class="title">Foo</p>
                        <p class="subtitle">Bar</p>
                    </article>
                </div>
                <div class="tile is-parent is-shady">
                    <article class="tile is-child notification is-white">
                        <p class="title">Third column</p>
                        <p class="subtitle">With some content</p>
                        <div class="content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare magna eros, eu
                                pellentesque tortor vestibulum ut. Maecenas non massa sem. Etiam finibus odio quis
                                feugiat
                                facilisis.</p>
                        </div>
                    </article>
                </div>
            </div>

        </div>
    </section>
    <section class="section hero is-light testimonials">
        <div class="columns">
            <div class="column is-one-quarter">
                <div class="card is-shady">
                    <div class="card-image">
                        <figure class="image is-4by3">
                            <img src="https://source.unsplash.com/RWnpyGtY1aU" alt="Placeholder image"
                                class="modal-button" data-target="modal-image2">
                        </figure>
                    </div>
                    <div class="card-content">
                        <div class="content">
                            <h4>Jonathan</h4>
                            <small>Graphic designer</small>
                            <p>
                                <a href="#"><i class="fa fa-github"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column is-one-quarter">
                <div class="card is-shady">
                    <div class="card-image">
                        <figure class="image is-4by3">
                            <img src="https://source.unsplash.com/RWnpyGtY1aU" alt="Placeholder image"
                                class="modal-button" data-target="modal-image2">
                        </figure>
                    </div>
                    <div class="card-content">
                        <div class="content">
                            <h4>Haga</h4>
                            <small>Community Manager</small>
                            <p>
                                <a href="#"><i class="fa fa-github"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column is-one-quarter">
                <div class="card is-shady">
                    <div class="card-image">
                        <figure class="image is-4by3">
                            <img src="https://source.unsplash.com/RWnpyGtY1aU" alt="Placeholder image"
                                class="modal-button" data-target="modal-image2">
                        </figure>
                    </div>
                    <div class="card-content">
                        <div class="content">
                            <h4>Hasina</h4>
                            <small>Web Developper</small>
                            <p>
                                <a href="#"><i class="fa fa-github"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column is-one-quarter">
                <div class="card is-shady">
                    <div class="card-image">
                        <figure class="image is-4by3">
                            <img src="https://source.unsplash.com/RWnpyGtY1aU" alt="Placeholder image"
                                class="modal-button" data-target="modal-image2">
                        </figure>
                    </div>
                    <div class="card-content">
                        <div class="content">
                            <h4>Christian</h4>
                            <small>Front-end Developper</small>
                            <p>
                                <a href="#"><i class="fa fa-github"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <footer class="footer">
        <div class="container">
            <div class="columns">
                <div class="column is-3 is-offset-2">
                    <h2><strong>Contact</strong></h2>
                    <ul>
                        <li><a href="#">contact@tafita.mg</a></li>
                        <li><a href="#"><i class="fa fa-github"></i></a></li>
                        <li>Designed by team esti</li>
                    </ul>
                </div>
            </div>

        </div>
    </footer>




    <script src="js/app.js"></script>
</body>

</html>