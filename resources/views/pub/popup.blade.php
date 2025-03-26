s<!-- resources/views/components/popup.blade.php -->
<div id="ad-popup" class="ad-popup">
    <div class="popup-content">
        <div class="popup-header">
            <h2 class="text-lg font-bold">{{ $companyName }}</h2>
            <button id="close-popup" class="close-btn">&times;</button>
        </div>
        <div class="popup-body">
            <p class="text-sm">Domaine : {{ $domain }}</p>
            <p class="text-sm">Nombre de postes disponibles : {{ $numberOfPosts }}</p>
        </div>
    </div>
</div>

<style>
#ad-popup {
    display: none;
    position: fixed;
    bottom: 20px;
    left: 50%;
    transform: translateX(-50%);
    background-color: white;
    color: black;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    z-index: 9999;
    width: 80%;
    max-width: 400px;
    border-radius: 10px;
    border: 1px solid #66022b;
    text-align: left;
}

.popup-content {
    display: flex;
    flex-direction: column;
}

.popup-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid #ddd;
    padding-bottom: 10px;
    margin-bottom: 10px;
}

.popup-header h2 {
    margin: 0;
    font-size: 1.25rem;
}

.close-btn {
    background: none;
    border: none;
    font-size: 1.5rem;
    cursor: pointer;
    color: #66022b;
}

.popup-body p {
    margin: 5px 0;
    font-size: 1rem;
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
