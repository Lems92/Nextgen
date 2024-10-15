q@extends('app')


@section('title', 'NextGen - Inscription')

@section('content')
@include('header.header')
    <head>
        <style>
            .text-danger {
                color: #ff5454;
            }
        </style>
    </head>
  <div class="login-section">
    <div class="image-layer" style="background-image : url('images/background/signup.png')">
    </div>
    <div class="outer-box">
      <div class="login-form default-form">
        <div class="form-inner">
          <h3>Creer votre compte NextGen</h3>

          <form method="post" action="{{ route('inscription.post') }}">
            @csrf

              <x-text-input id="role" class="block mt-1 w-full" type="hidden" name="role"
                            :value="old('role')" required autocomplete="role" />

            <div class="form-group">
                <div class="btn-box row">
                    <div class="col-sm-4">
                        <a href="#" id="btn-etudiant" class="theme-btn btn-style-four {{ old('role') == 'etudiant' ? 'active' : '' }}" onclick="setRole('etudiant', this)"><i class="la la-user"></i> Étudiant</a>
                    </div>
                    <div class="col-sm-4">
                        <a href="#" id="btn-entreprise" class="theme-btn btn-style-four {{ old('role') == 'entreprise' ? 'active' : '' }}" onclick="setRole('entreprise', this)"><i class="la la-briefcase"></i> Entreprise</a>
                    </div>
                    <div class="col-sm-4">
                        <a href="#" id="btn-service-carriere" class="theme-btn btn-style-four {{ old('role') == 'service-carriere' ? 'active' : '' }}" onclick="setRole('service-carriere', this)"><i class=""></i> Service carrière</a>
                    </div>
                </div>
                <x-input-error :messages="$errors->get('role')" class="mt-2" />
            </div>

              <!-- Email Address -->
              <div class="form-group mt-4">
                  <x-input-label for="email" :value="'Email'" />
                  <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email')" required autocomplete="username" />
                  <x-input-error :messages="$errors->get('email')" class="mt-2" />
              </div>

              <!-- Password -->
              <div class="form-group mt-4">
                  <x-input-label for="password" :value="'Mot de passe'" />

                  <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                                autocomplete="new-password" />

                  <x-input-error :messages="$errors->get('password')" class="mt-2" />
              </div>

              <!-- Confirm Password -->
              <div class="form-group mt-4">
                  <x-input-label for="password_confirmation" :value="'Confirmer le mot de passe'" />

                  <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                name="password_confirmation" required autocomplete="new-password" />

                  <x-input-error class="text-danger" :messages="$errors->get('password_confirmation')" class="mt-2" />
              </div>

            <div class="form-group">
                <button class="theme-btn btn-style-one" type="submit" name="Register">Suivant</button>
            </div>
          </form>

          <div class="bottom-box">
              <div class="text">Vous avez déjà un compte ?<a href="{{route('connexion')}}">Se connecter</a></div>
          </div>
        </div>
      </div>
    </div>
  </div>

<script>

    function setRole(role, element) {
        document.getElementById('role').value = role;
        var buttons = document.querySelectorAll('.theme-btn');
        buttons.forEach(function(btn) {
            btn.classList.remove('active');
        });
        element.classList.add('active');
    }
</script>
@endsection
