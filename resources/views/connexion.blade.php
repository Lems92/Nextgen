@extends('app')


@section('title', 'NextGen - Connexion')

@section('content')
@include('header.header')
<div class="login-section">
    <div class="image-layer" style="background-image : url('images/inscription1.jpg');"></div>
    <div class="outer-box">
      <!-- Login Form -->
      <div class="login-form default-form">
        <div class="form-inner">
          <h3>Se connecter à NextGen</h3>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
          <!--Login Form-->
          <form method="post" action="{{ route('login.submit') }}">
            @csrf
            <div class="form-group">
              <label for="email">Email</label>
              <input id="email" type="text" value="{{old('email')}}" name="email" placeholder="email" autocomplete autofocus required>
            </div>

            <div class="form-group">
              <label for="password">Mot de passe</label>
              <input id="password" type="password" name="password" value="" placeholder="Mot de passe">
            </div>

            <div class="form-group">
              <div class="field-outer">
                <div class="input-group checkboxes square">
                  <input type="checkbox" name="remember-me" value="" id="remember">
                  <label for="remember" class="remember"><span class="custom-checkbox"></span>Se souvenir de moi</label>
                </div>
                <a href="#" class="pwd" onclick="showForgotPasswordModal()">Mot de passe oublié ?</a>
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

<!-- Modal Mot de passe oublié -->
<div id="forgotPasswordModal" style="display: none; position: fixed; z-index: 9999; left: 0; top: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.5);">
    <div style="background-color: #fefefe; margin: 15% auto; padding: 20px; border: 1px solid #888; width: 80%; max-width: 500px; border-radius: 5px; position: relative;">
        <span onclick="closeForgotPasswordModal()" style="position: absolute; right: 10px; top: 10px; cursor: pointer; font-size: 20px;">&times;</span>
        <h3>Réinitialisation du mot de passe</h3>
        
        <form method="post" action="{{ route('password.email') }}" id="resetPasswordForm">
            @csrf
            <div class="form-group">
                <label for="reset-email">Email</label>
                <input type="email" class="form-control" id="reset-email" name="email" required>
            </div>
            <div style="margin-top: 20px; text-align: right;">
                <button type="button" class="btn btn-secondary" onclick="closeForgotPasswordModal()" style="background-color: #6c757d; color: white; border: none; padding: 8px 16px; border-radius: 4px; margin-right: 10px;">Fermer</button>
                <button type="submit" class="btn btn-primary" style="background-color: #66022b; color: white; border: none; padding: 8px 16px; border-radius: 4px;">Envoyer le lien de réinitialisation</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Message de confirmation -->
<div id="confirmationModal" style="display: none; position: fixed; z-index: 10000; left: 0; top: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.5);">
    <div style="background-color: #fefefe; margin: 15% auto; padding: 20px; border: 1px solid #888; width: 80%; max-width: 500px; border-radius: 5px; position: relative;">
        <span onclick="closeConfirmationModal()" style="position: absolute; right: 10px; top: 10px; cursor: pointer; font-size: 20px;">&times;</span>
        <h3>Message de confirmation</h3>
        <div id="confirmationMessage" style="margin: 20px 0;"></div>
        <div style="text-align: right;">
            <button onclick="closeConfirmationModal()" style="background-color: #66022b; color: white; border: none; padding: 8px 16px; border-radius: 4px;">Fermer</button>
        </div>
    </div>
</div>

@push('scripts')
<script>
function showForgotPasswordModal() {
    document.getElementById('forgotPasswordModal').style.display = 'block';
}

function closeForgotPasswordModal() {
    document.getElementById('forgotPasswordModal').style.display = 'none';
}

function showConfirmationModal(message) {
    document.getElementById('confirmationMessage').innerHTML = message;
    document.getElementById('confirmationModal').style.display = 'block';
}

function closeConfirmationModal() {
    document.getElementById('confirmationModal').style.display = 'none';
}

// Gestion du formulaire de réinitialisation
document.getElementById('resetPasswordForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    
    fetch(this.action, {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        closeForgotPasswordModal();
        showConfirmationModal(data.message);
    })
    .catch(error => {
        closeForgotPasswordModal();
        showConfirmationModal('Une erreur est survenue. Veuillez réessayer.');
    });
});

// Fermer les modals si on clique en dehors
window.onclick = function(event) {
    var forgotPasswordModal = document.getElementById('forgotPasswordModal');
    var confirmationModal = document.getElementById('confirmationModal');
    
    if (event.target == forgotPasswordModal) {
        forgotPasswordModal.style.display = 'none';
    }
    if (event.target == confirmationModal) {
        confirmationModal.style.display = 'none';
    }
}
</script>
@endpush
@endsection
