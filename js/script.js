// Animation de neige tombant
const snowfallContainer = document.querySelector(".snowfall-container");
const snowflake = document.querySelector(".snowflake");

function appendSnowflake() {
    const newSnowflake = snowflake.cloneNode(true);

    // Chaque flocon a une taille différente
    newSnowflake.style.paddingLeft = Math.random() * 10 + 'px';
    newSnowflake.style.animationDuration = Math.random() * 5 + 3 + 's';
    newSnowflake.style.opacity = Math.random() * 1;

    snowfallContainer.append(newSnowflake);
}
const interval = setInterval(appendSnowflake, 80);
setTimeout(() => {
    clearInterval(interval);
}, 3000);

// Animation pour les bouton Offrir/ Déjà offert
const offerButtons = document.querySelectorAll('.offer-button');

offerButtons.forEach(button => {
    button.addEventListener('click', () => {
        if(button.dataset.status === 'available') {
            button.textContent = 'Déjà offert';
            button.dataset.status = 'offered';
            button.style.backgroundColor = '#ccc';
            button.style.color = '#C60303';
            button.disabled = true;
        }
    })
});