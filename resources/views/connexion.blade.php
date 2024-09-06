@extends('app')


@section('title', 'NextGen - Inscription')

@section('content')
@include('header.header')
<div class="login-section">
    <div class="image-layer" style="background-image : url('images/background/signin.png');"></div>
    <div class="outer-box">
      <!-- Login Form -->
      <div class="login-form default-form">
        <div class="form-inner">
          <h3>Se connecter à NextGen</h3>
          <!--Login Form-->
          <form method="post" action="add-parcel.html">
            <div class="form-group">
              <label>Email</label>
              <input type="text" name="email" placeholder="email" required>
            </div>

            <div class="form-group">
              <label>Mot de passe</label>
              <input id="password-field" type="password" name="password" value="" placeholder="Mot de passe">
            </div>

            <div class="form-group">
              <div class="field-outer">
                <div class="input-group checkboxes square">
                  <input type="checkbox" name="remember-me" value="" id="remember">
                  <label for="remember" class="remember"><span class="custom-checkbox"></span>Se souvenir de moi</label>
                </div>
                <a href="#" class="pwd">Mot de passe oublié ?</a>
              </div>
            </div>

            <div class="form-group">
              <button class="theme-btn btn-style-one" type="submit" name="log-in">Se connecter</button>
            </div>
          </form>

          <div class="bottom-box">
            <div class="text">Ne possède pas encore de compte ?<a href="{{route('inscription')}}">S'inscrire</a></div>
          </div>
        </div>
      </div>
      <!--End Login Form -->
    </div>
  </div>
<<<<<<< HEAD
@endsection
=======
@endsection
>>>>>>> master
