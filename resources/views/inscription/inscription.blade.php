@extends('app')


@section('title', 'NextGen - Inscription')

@section('content')
@include('header.header')
  <div class="login-section">
    <div class="image-layer" style="background-image : url('images/background/signup.png')">
    </div>
    <div class="outer-box">
      <div class="login-form default-form">
        <div class="form-inner">
          <h3>Creer votre compte NextGen</h3>

          <form method="post" action="{{ route('inscription') }}">
            @csrf
            <input type="hidden" id="role" name="role" required>
            <div class="form-group">
                <div class="btn-box row">
                    <div class="col-sm-4">
                        <a href="#" id="btn-etudiant" class="theme-btn btn-style-four" onclick="setRole('etudiant', this)"><i class="la la-user"></i> Étudiant</a>
                    </div>
                    <div class="col-sm-4">
                        <a href="#" id="btn-entreprise" class="theme-btn btn-style-four" onclick="setRole('entreprise', this)"><i class="la la-briefcase"></i> Entreprise</a>
                    </div>
                    <div class="col-sm-4">
                        <a href="#" id="btn-service-carriere" class="theme-btn btn-style-four" onclick="setRole('service-carriere', this)"><i class=""></i> Service carrière</a>
                    </div>
                </div>
            </div>
        
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" placeholder="Email" required>
            </div>
        
            <div class="form-group">
                <label>Mot de passe</label>
                <input id="password-field" type="password" name="password" placeholder="Mot de passe" required>
            </div>

            <div class="form-group">
              <label>Confirmer Mot de passe</label>
              <input id="password-field-confirmation" type="password" name="password_confirmation" placeholder="Mot de passe" required>
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
