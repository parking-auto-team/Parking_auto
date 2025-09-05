vehicules.js
function updateProgressBar(nouveauNombre) {
    const maxVehicules = 100;
    const pourcentage = (nouveauNombre / maxVehicules) * 100;
    
    document.querySelector('.progress-bar').style.width = `${pourcentage}%`;
    document.querySelector('.title').textContent = nouveauNombre;
}

// Exemple pour simuler un ajout/suppression (à adapter avec des appels AJAX si nécessaire)
document.addEventListener('DOMContentLoaded', () => {
    let compteur = parseInt(document.querySelector('.title').textContent);
    
    // Boutons fictifs pour la démo (à remplacer par votre logique réelle)
    document.getElementById('ajouter').addEventListener('click', () => {
        compteur += 1;
        updateProgressBar(compteur);
    });
    
    document.getElementById('supprimer').addEventListener('click', () => {
        if (compteur > 0) compteur -= 1;
        updateProgressBar(compteur);
    });
});