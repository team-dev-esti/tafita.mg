<!DOCTYPE html>
<html lang="fr">
<head>
    @include('partials.head')
    <title>S'inscrire</title>
</head>
<body class="register">
    <section class="hero is-info is-fullheight">
        <div class="hero-body">
            <div class="container as-text-grey has-text-centered">
                <div class="column is-6" style="margin:0 auto">
                    <div class="box">
                            <h3 class="" style="color:black;font-size:25px;font-weight:bold;margin-bottom:50px">Crée un compte</h3>
                            <div class="has-text-grey">
                                <form method="post" action="{{ route('register') }}">
                                    @csrf
                                   
                                    <div class="field">
                                        <div class="control">
                                            <input name="name" class="input is-large" type="text" placeholder="Votre nom" value="{{ old('name') }}" required autofocus>
                                            @if ($errors->has('name'))
                                                <span class="has-text-danger" role="alert">
                                                    {{ $errors->first('name') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
        
                                    <div class="field">
                                        <div class="control">
                                            <input  name="lastname" class="input is-large" type="text" placeholder="Votre prénom"  value="{{ old('lastname') }}">
                                            @if ($errors->has('lastname'))
                                                <span class="has-text-danger" role="alert">
                                                    {{ $errors->first('lastname') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
        
                                    <div class="field">
                                        <div class="control">
                                            <div class="columns">
                                                <div class="column">
                                                    <label class="label">Date de naissance</label>
                                                </div>
                                                <div class="column">
                                                    <input name="birth" class="input is-large" type="date"  value="{{ old('birth') }}" required>
                                                    @if ($errors->has('birth'))
                                                        <span class="has-text-danger" role="alert">
                                                            {{ $errors->first('birth') }}
                                                        </span>
                                                    @endif
                                                </div>    
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="control">
                                        <label class="radio">
                                            <input type="radio" name="gender" value="M" checked>
                                            Masculin
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="gender" value="F">
                                            Féminin
                                        </label>
                                    </div>
                                    
                                    <div class="field">
                                        <div class="control">
                                            <input class="input is-large" name="email" type="email" placeholder="Votre Adresse Email"  value="{{ old('email') }}" required>
                                            @if ($errors->has('email'))
                                                <span class="has-text-danger" role="alert">
                                                    {{ $errors->first('email') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
        
                                    <div class="field">
                                        <div class="control">
                                            <input class="input is-large" type="password" placeholder="Votre mot de passe" name="password" required>
                                            @if ($errors->has('password'))
                                                <span class="has-text-danger" role="alert">
                                                    {{ $errors->first('password') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
        
                                    <div class="field">
                                        <div class="control">
                                            <input class="input is-large" type="password" placeholder="Confirmer votre mot de passe" name="password_confirmation" required>
                                        </div>
                                    </div>
                                    
                                    <button type="submit" class="button is-block is-info is-large is-fullwidth">S'enregistrer</button>
        
                                    <button type="button" class="google-button">
                                            <a href="{{ route('google.login') }}">
                                                <span class="google-button__icon">
                                                    <svg viewBox="0 0 366 372" xmlns="http://www.w3.org/2000/svg"><path d="M125.9 10.2c40.2-13.9 85.3-13.6 125.3 1.1 22.2 8.2 42.5 21 59.9 37.1-5.8 6.3-12.1 12.2-18.1 18.3l-34.2 34.2c-11.3-10.8-25.1-19-40.1-23.6-17.6-5.3-36.6-6.1-54.6-2.2-21 4.5-40.5 15.5-55.6 30.9-12.2 12.3-21.4 27.5-27 43.9-20.3-15.8-40.6-31.5-61-47.3 21.5-43 60.1-76.9 105.4-92.4z" id="Shape" fill="#EA4335"/><path d="M20.6 102.4c20.3 15.8 40.6 31.5 61 47.3-8 23.3-8 49.2 0 72.4-20.3 15.8-40.6 31.6-60.9 47.3C1.9 232.7-3.8 189.6 4.4 149.2c3.3-16.2 8.7-32 16.2-46.8z" id="Shape" fill="#FBBC05"/><path d="M361.7 151.1c5.8 32.7 4.5 66.8-4.7 98.8-8.5 29.3-24.6 56.5-47.1 77.2l-59.1-45.9c19.5-13.1 33.3-34.3 37.2-57.5H186.6c.1-24.2.1-48.4.1-72.6h175z" id="Shape" fill="#4285F4"/><path d="M81.4 222.2c7.8 22.9 22.8 43.2 42.6 57.1 12.4 8.7 26.6 14.9 41.4 17.9 14.6 3 29.7 2.6 44.4.1 14.6-2.6 28.7-7.9 41-16.2l59.1 45.9c-21.3 19.7-48 33.1-76.2 39.6-31.2 7.1-64.2 7.3-95.2-1-24.6-6.5-47.7-18.2-67.6-34.1-20.9-16.6-38.3-38-50.4-62 20.3-15.7 40.6-31.5 60.9-47.3z" fill="#34A853"/></svg>
                                                </span>
                                                <span class="google-button__text">Se connecter avec Google</span>
                                            </a>
                                    </button>
        
                                </form>
                            </div>
                    </div>
                    <p class="has-text-white">
                        <a href="{{route('login')}}">Se connecter</a> &nbsp;·&nbsp;
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Mot de passe oublié
                            </a> &nbsp;·&nbsp;
                        @endif
                        
                        <a href="#">Aide</a>
                    </p>
                </div>
            </div>
        </div>
    </section>    

    <script src="js/app.js"></script>
</body>
</html>