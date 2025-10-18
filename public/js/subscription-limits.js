/**
 * Gestion des limites d'abonnement côté client
 */
class SubscriptionLimits {
    constructor() {
        this.init();
    }

    init() {
        this.bindEvents();
        this.checkLimits();
    }

    bindEvents() {
        // Vérifier les limites avant soumission de formulaire
        const forms = document.querySelectorAll('form[data-subscription-check]');
        forms.forEach(form => {
            form.addEventListener('submit', (e) => {
                if (!this.canSubmitForm(form)) {
                    e.preventDefault();
                    this.showLimitError();
                }
            });
        });

        // Vérifier la mise en avant des annonces
        const featuredCheckbox = document.querySelector('input[name="mise_en_avant"]');
        if (featuredCheckbox) {
            featuredCheckbox.addEventListener('change', (e) => {
                this.checkFeaturedLimit(e.target);
            });
        }
    }

    checkLimits() {
        // Vérifier si l'utilisateur peut publier des annonces
        const publishButton = document.querySelector('[data-action="publish-offer"]');
        if (publishButton && !this.canPublishOffers()) {
            publishButton.disabled = true;
            publishButton.title = 'Limite d\'annonces atteinte';
            this.showLimitWarning();
        }

        // Vérifier les limites de mise en avant
        const featuredCheckbox = document.querySelector('input[name="mise_en_avant"]');
        if (featuredCheckbox && !this.canFeatureOffer()) {
            featuredCheckbox.disabled = true;
            this.addTooltip(featuredCheckbox, 'Limite de mise en avant atteinte');
        }
    }

    canSubmitForm(form) {
        const action = form.getAttribute('action');
        
        if (action && action.includes('offres')) {
            return this.canPublishOffers();
        }
        
        return true;
    }

    canPublishOffers() {
        // Cette fonction devrait être alimentée par des données du serveur
        const limitData = window.subscriptionLimits || {};
        return limitData.canPublish !== false;
    }

    canFeatureOffer() {
        const limitData = window.subscriptionLimits || {};
        return limitData.canFeature !== false;
    }

    checkFeaturedLimit(checkbox) {
        if (checkbox.checked && !this.canFeatureOffer()) {
            checkbox.checked = false;
            this.showFeaturedLimitError();
        }
    }

    showLimitError() {
        this.showNotification(
            'Limite d\'annonces atteinte',
            'Vous avez atteint la limite d\'annonces pour votre abonnement actuel.',
            'warning'
        );
    }

    showFeaturedLimitError() {
        this.showNotification(
            'Limite de mise en avant atteinte',
            'Vous ne pouvez avoir qu\'une seule annonce mise en avant par mois avec votre abonnement.',
            'warning'
        );
    }

    showLimitWarning() {
        const warningDiv = document.createElement('div');
        warningDiv.className = 'alert alert-warning subscription-limit-warning';
        warningDiv.innerHTML = `
            <strong>Limite d'annonces atteinte !</strong>
            <p>Vous avez atteint la limite d'annonces pour votre abonnement actuel.</p>
        `;
        
        const container = document.querySelector('.upper-title-box');
        if (container) {
            container.appendChild(warningDiv);
        }
    }

    showNotification(title, message, type = 'info') {
        // Utiliser SweetAlert2 si disponible, sinon alert standard
        if (typeof Swal !== 'undefined') {
            Swal.fire({
                title: title,
                text: message,
                icon: type,
                confirmButtonText: 'OK'
            });
        } else {
            alert(`${title}: ${message}`);
        }
    }

    addTooltip(element, text) {
        element.title = text;
        element.setAttribute('data-toggle', 'tooltip');
        element.setAttribute('data-placement', 'top');
    }
}

// Initialiser quand le DOM est prêt
document.addEventListener('DOMContentLoaded', () => {
    new SubscriptionLimits();
});

// Exporter pour utilisation globale
window.SubscriptionLimits = SubscriptionLimits;
