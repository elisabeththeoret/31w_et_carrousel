<?php
/**
 * 
 * @package 31w ET Carrousel
 * @author Elisabeth Theoret
 * @copyright Collège Maisonneuve
 * @license GLP-2.0-or-later
 * @version 1.0.0
*/
/*
Plugin Name: 31w ET Carrousel
Description: Une extension simple qui permet d'afficher une boîte modale de l'image sélectionnée d'une galerie, pour ensuite accéder à toutes les images de la galerie.
Plugin URI: https://github.com/elisabeththeoret/31w_et_carrousel
Author: Elisabeth Theoret
Author URI: https://github.com/elisabeththeoret
Version: 1.0.0
*/

/**
 * Fonction qui intègre les liens (link:css et script) dans la page
 * @param {string} $version_css // Trouve la dernière version du fichier css
 * @param {string} $version_js // Trouve la dernière version du fichier js
 */
function et_enqueue() {
	// Intégrer le fichier CSS
	$version_css = filemtime( plugin_dir_path( __FILE__ ) . "style.css" );
	wp_enqueue_style(
		'31w_et_carrousel',
		plugin_dir_url( __FILE__ ) . "style.css",
		array(),
		$version_css,
		false
	);

	// Intégrer le script JS
	$version_js = filemtime( plugin_dir_path( __FILE__ ) . "js/carrousel.js" );
	wp_enqueue_script(
		'31w_et_carrousel',
		plugin_dir_url( __FILE__ ) . "js/carrousel.js",
		array(),
		$version_js,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'et_enqueue' );

/**
 * Fonction qui intègre le contenu du carrousel dans la page
 * @param {string} $content // Contenu du carrousel en chaine HTML
 * @return {string}
 */
function et_boite_carrousel() {
	/////////////////////////////////////// HTML
	// Le conteneur d'une boîte de carrousel
	$contenu = '
		<div class="carrousel carrousel--fermer">
			<button class="carrousel__bouton carrousel__bouton--fermer">&#10005;</button>
			<nav class="carrousel__nav">
				<button class="carrousel__bouton carrousel__bouton--precedent" data-nav="precedent">&#9668;</button>
				<form class="carrousel__form"></form>
				<button class="carrousel__bouton carrousel__bouton--suivant" data-nav="suivant">&#9658;</button>
			</nav>
			<figure class="carrousel__figure"></figure>
		</div><!-- /.carrousel -->
	';

	return $contenu;
}
add_shortcode( '31w_et_carrousel', 'et_boite_carrousel' );
