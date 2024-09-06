<!-- resources/views/components/popup.blade.php -->
<div id="ad-popup" class="ad-popup">
    <div class="flex justify-between items-center">
        <div>
            <h2 class="text-lg font-bold">{{ $companyName }}</h2>
            <p class="text-sm">Domaine : {{ $domain }}</p>
            <p class="text-sm">Nombre de postes disponibles : {{ $numberOfPosts }}</p>
        </div>
    </div>
</div>


<style>

#ad-popup {
    display: none;
    position: fixed;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    background-color: white;
    color: black;
    padding: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    z-index: 9999;
    width: 80%; 
    max-width: 500px; 
    border: #66022b 1px solid; 
    text-align: center;
}


</style>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    const popup = document.getElementById('ad-popup');
    const closeButton = document.getElementById('close-popup');
    let isPopupVisible = false;

    // Fonction pour afficher le popup
    function showPopup() {
        popup.style.display = 'block';
        isPopupVisible = true;
    }

    // Fonction pour cacher le popup et programmer sa réapparition
    function hidePopup() {
        popup.style.display = 'none';
        isPopupVisible = false;
        // Afficher le popup après 10 secondes
        setTimeout(function () {
            if (!isPopupVisible) {
                showPopup();
            }
        }, 10000); // 10000 ms = 10 secondes
    }

    // Afficher le popup après 3 secondes
    setTimeout(showPopup, 3000);

    // Fermer le popup lorsqu'on clique sur le bouton "X"
    closeButton.addEventListener('click', hidePopup);
});
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
