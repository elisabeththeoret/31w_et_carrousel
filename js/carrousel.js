/**
 * Fonction qui initialise le carrousel
 */
function Initialisation() {
	console.log( "carrousel" );

	const carrousel = document.querySelector( ".carrousel" );
	const boutonOuvrir = document.querySelector( ".carrousel__bouton--ouvrir" );
	const boutonFermer = document.querySelector( ".carrousel__bouton--fermer" );

	/**
	 * Écouteur d'événement au click du bouton ouvrir
	 */
	boutonOuvrir.addEventListener( "click", function() {
		console.log( "ouvrir carrousel" );
		carrousel.classList.remove( "carrousel--fermer" );
		carrousel.classList.add( "carrousel--ouvrir" );
	} );

	/**
	 * Écouteur d'événement au click du bouton fermer
	 */
	boutonFermer.addEventListener( "click", function() {
		console.log( "fermer carrousel" );
		carrousel.classList.remove( "carrousel--ouvrir" );
		carrousel.classList.add( "carrousel--fermer" );
	} );
}

/**
 * Écouteur d'événement au chargement de la fenêtre
 */
window.addEventListener( "load", Initialisation );
