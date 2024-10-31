<?php
/**
 * @package ScooterContact
 * @version 1.7.0
 */
/*
Plugin Name: ScooterContact
Description: 🇫🇷 Le plus léger des formulaires de contact ! Utilisez le shortcode [scootercontact] pour l'afficher où vous voulez 🇫🇷 | 🇺🇸 Use shortcode [scootercontact] to display where you want 🇺🇸
Version: 1.7.0
Author: Kapsule Network
Author URI: https://www.kapsulecorp.com/
License: GPLv2
*/

if ( ! defined( 'ABSPATH' ) )
	exit;

define('DONOTCACHEPAGE', true);

	function scooter_form_valid_donnees($donnees){
        $donnees = trim($donnees);
        $donnees = stripslashes($donnees);
        $donnees = htmlspecialchars($donnees);
		$donnees = strip_tags($donnees);
		$donnees = str_replace('"', '', $donnees);
		$donnees = str_replace("'","&#039;",$donnees);
		$donnees = str_replace(">","&gt;",$donnees);
		$donnees = str_replace("<","&lt;",$donnees);
		
		$injections = array('/(\n+)/i',
                '/(\r+)/i',
                '/(\t+)/i',
                '/(%0A+)/i',
                '/(%0D+)/i',
                '/(%08+)/i',
                '/(%09+)/i'
                );
        $donnees = preg_replace($injections,'',$donnees);
			
        return $donnees;
	}
	
	
	function scooter_form_malicious_scan($input) {
	$malicious = false;
	$suspects = array( "\r", "\n", "mime-version", "content-type", "bcc:", "cc:", "to:", "<", ">", "&lt;", "&rt;", "a href", "/a", "/URL", "URL=" );
	foreach ( $suspects as $suspect ) {
		if ( strpos(strtolower($input), strtolower($suspect) ) !== false ) {
			$malicious = true;
			break;
		}
	}
	return $malicious;
	}
	
	function scooter_form_get_ip() {
		if ( isset($_SERVER) ) {
			if ( isset( $_SERVER['HTTP_X_FORWARDED_FOR'])) {
				$ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
			} elseif ( isset( $_SERVER['HTTP_CLIENT_IP'])) {
				$ip_address = $_SERVER['HTTP_CLIENT_IP'];
			} else {
				$ip_address = $_SERVER['REMOTE_ADDR'];
			}
		} else {
			if ( getenv('HTTP_X_FORWARDED_FOR') ) {
				$ip_address = getenv('HTTP_X_FORWARDED_FOR');
			} elseif ( getenv('HTTP_CLIENT_IP') ) {
				$ip_address = getenv('HTTP_CLIENT_IP');
			} else {
				$ip_address = getenv('REMOTE_ADDR');
			}
		}
		return $ip_address;
	}

	function scooter_form_talk2raditz() {
		
			global $type_of_captcha;
			
			if ( 'fr_' === substr( get_user_locale(), 0, 3 ) ) {
			
			$vosinfos = "Vos Infos :";
			$votre_email = "Votre email :";
			$votre_email_p = "Saisissez ici votre adresse mail...";
			$votre_nom = "Votre nom :";
			$votre_nom_p = "Saisissez ici votre nom ou pseudo...";
			$votre_url = "Url de votre site (facultatif) :";
			$votre_url_p = "Saisissez ici l'adresse de votre site web...";
			$votre_message = "Votre message :";
			$votre_message_p = "Saisissez ici le contenu de l'email que vous souhaitez nous adresser...";
			$votre_rgpd = "Ce site respecte le RGPD. Ceci étant, en soumettant ce formulaire, j'accepte que les informations saisies soient exploitées dans le cadre de ma demande afin de pouvoir obtenir une réponse par email dans les plus brefs délais.";
			$envoyer = "✉️ Envoyer";
			
			$captcha = "Répondez à la question de sécurité :";
			$captcha1_1 = "Combien font";
			$captcha2_1 = "J'ai déjà";
			$captcha2_2 = "enfants et ma femme est enceinte de jumeaux. Combien vais-je avoir d'enfants ?";
			$captcha3_1 = "J'ai dans mon panier";
			$captcha3_2 = "haricots magiques. Si j'en mange ";
			$captcha3_3 = ", combien m'en reste-t-il ?";
			
			$bug = "Aie .:. Erreur Détectée !";
			$bug_name = "Merci de saisir votre nom";
			$bug_mail_1 = "Merci de saisir une adresse mail";
			$bug_mail_2 = "Votre adresse mail est incorrecte";
			$bug_content_1 = "Merci de saisir un contenu ";
			$bug_content_2 = "Merci de saisir un texte un peu plus long... car là c'est plutôt suspect 🤔 !";
			$bug_captcha = "La réponse à la question secrète est incorrecte ! Seriez-vous un bot ?";
			$bug_malicious = "Attention ! Vous avez saisi des caractères interdits !";
			$bug_honeypot = "Vous avez un oeil bionique pour voir ce champ ?";
			$retour = "🔙 Retour";
			
			$lang_subject = "Message depuis mon site";
			$lang_contenu = "m'a écrit le message suivant :";
			
			$c_thkx = "Merci";
			$c_ok = "✅ Votre message vient de nous être envoyé";
			$c_ok2 = "Merci pour votre confiance, nous y répondrons dans les plus brefs délais.";
			
			$erreur_serveur = "Ce serveur ne permet pas actuellement d'envoyer de mails. Merci de nous contacter par un autre moyen.";
			
			
		}
		///ANGLAIS
		else {
			
			$vosinfos = "About you";
			$votre_email = "Your email :";
			$votre_email_p = "Enter your email address here...";
			$votre_nom = "Your name :";
			$votre_nom_p = "Enter your name here...";
			$votre_url = "Website URL (optional) :";
			$votre_url_p = "Enter your website address here...";
			$votre_message = "Your message :";
			$votre_message_p = "Enter here the content of the email you wish to send us...";
			$votre_rgpd = "This site respects the GDPR. However, by submitting this form, I accept that the information entered will be used as part of my request in order to be able to obtain an answer by email as soon as possible.";
			$envoyer = "✉️ Send";
			
			$captcha = "Answer the security question :";
			$captcha1_1 = "What is the result of";
			$captcha2_1 = "I already have";
			$captcha2_2 = "children and my wife is pregnant with twins. How many children will I have?";
			$captcha3_1 = "I have";
			$captcha3_2 = "magic beans in my basket. If I eat ";
			$captcha3_3 = ", how much is left?";
			
			$bug = "Ouch there is a problem!";
			$bug_name = "Please enter your name";
			$bug_mail_1 = "Please enter an email address";
			$bug_mail_2 = "Your email address is incorrect";
			$bug_content_1 = "Please enter content";
			$bug_content_2 = "Please enter a slightly longer text ... because this is rather suspicious 🤔!";
			$bug_captcha = "The answer to the secret question is incorrect! Are you a bot?";
			$bug_malicious = "Warning ! You have entered prohibited characters !";
			$bug_honeypot = "Do you have a bionic eye to see this field?";
			$retour = "🔙 Go Back";
			
			$lang_subject = "Message from my site";
			$lang_contenu = "wrote me the following message: ";
			
			$c_thkx = "Thank You";
			$c_ok = "✅ Your message has just been sent to us";
			$c_ok2 = "Thank you for your trust, we will respond as soon as possible.";
			
			$erreur_serveur = "This server does not currently allow you to send emails. Please contact us by another means.";
			
		}
			
		
		wp_enqueue_style( 'scooter2talk', plugin_dir_url( __FILE__ ) . 'scooter2talk.css');
		
		if (isset($_GET['successstory'])) {return "<div style='margin:80px 0;' class='fade-in'><h2 style='text-align:center;'>$c_ok</h2><p style='text-align:center;'>$c_ok2</p></div>";}
		
		global $wp;
		$current_url = home_url( $wp->request );
			
		if (! isset($_POST['submit'])) {
						
			// Captcha minimaliste mais très efficace !
			$mabellebase = $_SERVER['SERVER_NAME'];
			$mabellebase = strlen($mabellebase);
			$mabellebase = str_replace("0", "O", $mabellebase);
			$mabellebase .= "O";
				
				$kap_tcha = Rand (1,3); 
				switch ($kap_tcha) 
				{
					 case 1:
						$id_q = 1; $question_q = "$captcha1_1 $mabellebase x 2 ?";
					 break;
					 
					 case 2:
						$id_q = 2; $question_q = "$captcha2_1 $mabellebase $captcha2_2";
					 break;
					 
					 case 3:
						$id_q = 3; $question_q = "$captcha3_1 $mabellebase $captcha3_2 3$captcha3_3";
				}
				
			$buildcontactform = '<form method="POST" action="'.$current_url.'" id="myscooterform">';
			$buildcontactform .= '<fieldset>';
			$buildcontactform .= "<h3>$vosinfos</h3>";
			$buildcontactform .= '<p><label for="mail"><span>'.$votre_email.'</span><input type="mail" name="mail" placeholder="'.$votre_email_p.'" required="required" autocomplete="off" /></label></p>';
			$buildcontactform .= '<p><label for="nom"><span>'.$votre_nom.'</span><input type="text" name="nom" placeholder="'.$votre_nom_p.'" required="required" autocomplete="off" /></label></p>';
			$buildcontactform .= '<p><label for="url"><span>'.$votre_url.'</span><input type="url" name="url" placeholder="'.$votre_url_p.'" autocomplete="off" /></label></p>';
			$buildcontactform .= '<h3>'.$votre_message.'</h3>';
			$buildcontactform .= '<p><textarea name="contenu" style="font-size:18px;" required="required" placeholder="'.$votre_message_p.'" minlength="35"></textarea></p>';
			$buildcontactform .= '<h3>'.$captcha.'</h3>';
			$buildcontactform .= '<p class="welfont">'.$question_q.'</p>';
			$buildcontactform .= '<p><input id="security_code" name="security_code" type="text" required="required" autocomplete="off" /></p>';
			$buildcontactform .= '<h3>RGPD</h3>';
			$buildcontactform .= '<p id="rgpdline"><input type="checkbox" id="rpgd" name="rpgd" value="RGPD Consent OK" required="required" />';
			$buildcontactform .= '<input name="captchalight" id="scooter-captchalight" value="'.$id_q.'" type="hidden" />';
			$buildcontactform .= '<input type="checkbox" id="scooter-cgv-u" name="cgv" /><label for="rpgd"> '.$votre_rgpd.'</label></p>';
			$buildcontactform .= '<p><input value="'.$envoyer.'" type="submit" name="submit" /></p>';
			$buildcontactform .= '</fieldset></form>';
			
			return $buildcontactform;
			
		}
		
		else {	
		
			$mail = scooter_form_valid_donnees($_POST["mail"]);
			$nom = scooter_form_valid_donnees($_POST["nom"]);
			$url = scooter_form_valid_donnees($_POST["url"]);
			$contenu = scooter_form_valid_donnees($_POST["contenu"]);
			$rgpd = scooter_form_valid_donnees($_POST["rpgd"]);
			
			// Vérification du formulaire
			$errors = []; // you can add errors to this array.

					
			if (empty($nom)){
				$errors[]= $bug_name;
			} else {
				$_SESSION['kap_contactform_name'] = $nom;
			}

				
			if (empty($mail)){
				$errors[]= $bug_mail_1;
			} else {
				$_SESSION['kap_contactform_mail'] = $mail;
			}
				
			if (filter_var($mail, FILTER_VALIDATE_EMAIL) == false) {
				$errors[]= $bug_mail_2;
			} else {
				$_SESSION['kap_contactform_mail'] = $mail;
			}
				

			if (empty($contenu)){
				$errors[]= $bug_content_1;
			} else {
				$_SESSION['kap_contactform_message'] = $contenu;
			}
			
			
			if (strlen($contenu) < 35){
				$errors[]= $bug_content_2;
			} else {
				$_SESSION['kap_contactform_message'] = $contenu;
			}
				
			if (filter_var($contenu, FILTER_VALIDATE_EMAIL) == true) { // Si le message ne contient qu'une email
				$errors[]= $bug_content_2;
			} else {
				$_SESSION['kap_contactform_message'] = $contenu;
			}	
				
			$captchalight_id = scooter_form_valid_donnees($_POST["captchalight"]);
			$mabellebase = $_SERVER['SERVER_NAME'];
			$mabellebase = strlen($mabellebase);
			$mabellebase .= 0;
			
			if ($captchalight_id == 1) {$reponse_attendue = $mabellebase*2;}
			elseif ($captchalight_id == 2) {$reponse_attendue = $mabellebase+2;}
			else {$reponse_attendue = $mabellebase-3;}
			
			if( $reponse_attendue != $_POST['security_code'] ) {$errors[]= $bug_captcha;}
	
			if (scooter_form_malicious_scan($mail) == true) {$errors[]= $bug_malicious;}
			if (scooter_form_malicious_scan($nom) == true) {$errors[]= $bug_malicious;}
			if (scooter_form_malicious_scan($url) == true) {$errors[]= $bug_malicious;}
			if (scooter_form_malicious_scan($contenu) == true) {$errors[]= $bug_malicious;}
			if (isset($_POST['cgv'])){$errors[]= $bug_honeypot;}

			if (!empty($errors)){
				
				$output = "<h2 style='text-align:center;'>$bug</h2><ul id='errormonseignor'>";
			
				foreach($errors as $valeur) 
				{  
					$output .= "<li>$valeur</li>";
				}
				$output .= "</ul><p style='text-align:center;'><a href='javascript:history.back()' class='back2biz'>$retour</a></p>";
				
				return $output;
				
			} else {
					
				/* Get Infos */
				$blogname = get_bloginfo('name');
				$sitename   =  strtolower($_SERVER['SERVER_NAME']);
					if ( substr( $sitename, 0, 4 ) == 'www.' ) {
					$sitename  =  substr( $sitename, 4 );
				}
				$from_email    =  apply_filters( "wp_mail_from", "wordpress@$sitename" );
				$ipduloustic = scooter_form_get_ip();

				$destinataire = get_option('admin_email');
				
				$sujet = "🌍 $lang_subject $blogname";
				$message = "<h2>$nom $lang_contenu</h2><p>$contenu</p><p>IP: $ipduloustic<br />$url<br />RGPD : $rgpd";
				$headers = 'Mime-Version: 1.0'."\r\n";
				$headers .= 'Content-type: text/html; charset=utf-8'."\r\n";
				$headers .= "From: $blogname <$from_email>"."\r\n";
				$headers .= "Reply-To: $nom <$mail>"."\r\n";
				
				if ((in_the_loop()) OR (!is_singular())) { // Empeche le double mail sur certains themes
									
					$email_sent = wp_mail($destinataire, $sujet, $message, $headers);
					if (!$email_sent) {
						return "<h2 style='text-align:center;'>Ouch :(</h2><p style='text-align:center;'>$erreur_serveur</p>";
					}
				
				}
								
				$norefresh = $current_url;
				$norefresh .= '?successstory';
				$redirect_code = '<meta http-equiv="refresh" content="0;URL='. $norefresh .'"><script>window.location = "' .$norefresh. '";</script>';

				return "<div style='margin:80px 0;'><h2 style='text-align:center;' class='fade-out'>$c_thkx</h2></div>$redirect_code";			
					
			}
				
		}
		
	}
	add_shortcode( 'scootercontact', 'scooter_form_talk2raditz' );
	
// Function POWERED
	
	$scooter_form_option_powered_check = get_option('scooter_form_option_powered');
	if ($scooter_form_option_powered_check == "oui") {
			function scooter_form_powa() {
				echo "<p style='text-align:center;'>Plugin <a href='https://www.kapsulecorp.com/' target='_blank' rel='noopener'>Kapsule Corp</a></p>";
				}
				add_action( 'wp_footer', 'scooter_form_powa' );
	}
	
	
// Partie ADMIN	
	
if ( is_admin() ){
	
	add_action( 'admin_init', 'scooter_form_batarang' );
		function scooter_form_batarang() {
			register_setting( 'scooter_form-settings-group', 'scooter_form_option_powered' );
		}	
		
	add_action('admin_menu','scooter_form_setupmenu');
	function scooter_form_setupmenu(){
		  add_menu_page('Configuration de ScooterContact', 'ScooterContact', 'administrator', 'scootercontact-plugin', 'scooter_form_init_cave', '  data:image/svg+xml;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAATCAYAAACQjC21AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyNpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMTQ4IDc5LjE2NDAzNiwgMjAxOS8wOC8xMy0wMTowNjo1NyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIDIxLjAgKFdpbmRvd3MpIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjQ2MDFGRjY0MDYwNzExRUI4MjRCQjNCNzFDQzk0QkM4IiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjQ2MDFGRjY1MDYwNzExRUI4MjRCQjNCNzFDQzk0QkM4Ij4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6NDYwMUZGNjIwNjA3MTFFQjgyNEJCM0I3MUNDOTRCQzgiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6NDYwMUZGNjMwNjA3MTFFQjgyNEJCM0I3MUNDOTRCQzgiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz4AIAe1AAACdUlEQVR42pRUv2sUQRT+3uzs5hJiIP5IwMCBCoqghVjZWFgpIoiClSB2WljEf8DSQku1s7JTBBu1EKuAYGMV0cYmlSjnD7jzdu925/nNzqwm8e4S53i7N2/e+/b9+N7IrXclKghQ6Rnj9IJa9EQlV8Bg8nJ0y2i3Qxxecv/MDY2zEg7P0v0uRA7SIOe+osgWgMpfIooWLU/5/5QntjQ4npR44IC2EoIGM9ju0vgW7OfzPv2/mS7kEk/a0hjoOsPtgYVUBHu05S7b2VxmnNWgddFQ8JPPIWVqBLy3LFgin+68P9WotcC0tSW6VRbAxJ9k8khVb6NERqPWOEBV9Ai6zIZcbyz4v2u/9IGFWeK5mK3FJ4J/kHJ8tuJJwXOt8DG14Qu1r0CspDFVryVRTKHLPLzIvdekG6rlaoYNqSiM4U5xQDfFb5faQO8rrU0QdTJNp90Rx0Z6KHUDSbBIgMwf+ShHEcsM0sjgWENp4R6s7vVfp/Yo5UiUtmZyjha/ZAIL7Fs+TtZtY1tZhCR0biFGNxcnwhfFuAKLDCphpGOpZatB3c0QJj+tOa5wf55SrauhF2dU56hPdXyEU/ZYRwe5ibMWOGgo86PbO5noIjIwO62+IAN+SHMbTHD6p3a6gQM5+fvUsHYrNLxGxWfdeto6fK39gZFwUXF1WP4bfD9vbpvHQ8F7qB5uqQ5LQamuGdFGpF8lZpdAbxplxwORV5jWHak4DKil7qR38HVepcGquHFpq+fpPk7QUh2fqVXfOfGvyclCo4/ZdHFMXoI1Ol6trLwxwelEkeJQnvzFMPi/5Wv2yglOk68P1Y+0IfWIUhC0z3x/CzAAlKD5jA20LNcAAAAASUVORK5CYII=' );
	}
	

	function scooter_form_monjsdansladmin() {
		
	echo "<style>
		.gotham_scooter_wrap{margin: 10px 20px 0 2px;}
		.gotham_scooter_form{float: left;width: 59%;}
		.gotham_scooter_credit{float: left;width:17%;background:#fff;box-shadow: 0 0 0 1px rgba(0,0,0,0.05);padding:1%;margin-left:1%;}
		.gotham_scooter_wrap #batbaseadmin tr td.libelle{font-weight:bold;width:250px;}
		.gotham_scooter_wrap #batbaseadmin input, #batbaseadmin select, #batbaseadmin textarea {width:280px;float:left;}
		.gotham_scooter_wrap .explain {background:white;box-shadow: 0 0 0 1px rgba(0,0,0,0.05);}
		.gotham_scooter_wrap .explain p{padding: 10px;background: white;color: black;}
		.gotham_scooter_wrap .explain ul{padding: 0 10px;list-style: square inside;}
		.gotham_scooter_wrap .explain li{padding:10px 0;}
		.gotham_scooter_wrap .explain h3 {padding:6px 10px;border-bottom:1px solid #eee;}
		.gotham_scooter_wrap .explain p.shortcode {text-align: center;background: #181818;color: #56ff56;font-style: italic;font-size: 20px;}
	</style>";
		
		 
	}
	add_action('admin_enqueue_scripts', 'scooter_form_monjsdansladmin');
	
	
	// Ajout du Bouton de ShortCode dans la toolbar TinyMCE
	function scooter_form_tinymce_button() {
		if ( ! current_user_can('edit_posts') 
		  && ! current_user_can('edit_pages') ) {
			return false;
		}

		if ( get_user_option('rich_editing') == 'true') {
			add_filter( 'mce_external_plugins', 'scooter_form_script_tiny' );
			add_filter( 'mce_buttons', 'scooter_form_register_button' );
		}
	}

	function scooter_form_register_button( $buttons ) {
		array_push( $buttons, '|', 'kapsule_scooter_form_bouton' );
		return $buttons;
	}
	add_action( 'admin_init', 'scooter_form_tinymce_button' );

	function scooter_form_script_tiny( $plugin_array ) {
		$plugin_array['kapsule_scooter_form_toolbar'] = plugins_url( '/tinymscript.js', __FILE__ );
		return $plugin_array;
	}
	
	// ! Fin de la zone d'ajout du Bouton de ShortCode dans la toolbar TinyMCE
	
	// Ajout du Block Gutemberg
	
	function scootercontact_render_block() {
		
		return do_shortcode( '[scootercontact]' );
		
	}
	

	function scootercontact_register_block() {
		wp_register_script(
			'scootercontact-script', // handle
			plugins_url( 'scootercontact_gutemblock.js', __FILE__ ), // script URL
			array( 'wp-blocks', 'wp-block-editor' ), // dependencies
			filemtime( plugin_dir_path( __FILE__ ) . 'scootercontact_gutemblock.js' ) // filemtime - pour le versionnage
		);

		register_block_type( 'scootercontact/block', array(
			'editor_script' => 'scootercontact-script',
			'render_callback' => 'scootercontact_render_block'
		) );
	}

	add_action( 'init', 'scootercontact_register_block' );
	
	//! Fin du Block Gutemberg
	
	
	// Module de test de la fonction mail
	add_action('wp_ajax_test_send_email', 'handle_test_email_send');
	
	function handle_test_email_send() {
		$email_address = sanitize_email($_POST['email']);
		if ( !is_email($email_address) ) {
			wp_send_json_error('Adresse mail non valide');
		}

		$mail_sent = wp_mail($email_address, 'Scooter Form .: Mail Tester :.', 'Ceci est un test de Scooter Form. Les mails partent bien ;) / Everything works perfectly');
		
		if ($mail_sent) {
			wp_send_json_success('Succes :)');
		} else {
			wp_send_json_error('Echec :(');
		}
	}
	// !Fin du Module de test de la fonction mail
	
	function scooter_form_init_cave(){
	
		if ( 'fr_' === substr( get_user_locale(), 0, 3 ) ) {
			$txt_adwin_welcome = "Paramétrage du Formulaire de Contact";
			$txt_adwin_yes = "Oui";
			$txt_adwin_no = "Non";
			$txt_shortcodeainserer = "➡️ Pour afficher le formulaire de contact, insérez tout simplement le shortcode suivant à l'endroit où vous le désirez : <strong>[scootercontact]</strong>.";
			$txt_adwin_helpkapsule = "Je soutiens l'éditeur de ce plugin car je suis quelqu'un de bien :";
			$txt_adwin_helpkapsule_p = "👍 En sélectionnant OUI, un lien hypertexte discret vers notre site web sera inséré en bas de page.<br />💡 Vous pouvez bien sûr également faire un lien vers notre site https://www.kapsulecorp.com depuis votre page partenaire par exemple.";
			$txt_adwin_helpkapsule_label = "J'accepte le deal";
			$txt_adwin_blokright_title = "Besoin d’aide ?";
			$txt_adwin_blokright_corpus_1 = "Si vous rencontrez un problème avec cette extension, vous trouverez probablement des réponses dans ces deux pages :";
			$txt_adwin_blokright_corpus_2 = "Documentation";
			$txt_adwin_blokright_corpus_3 = "Forum de Support";
			$txt_adwin_blokright_aime = "Vous aimez cette extension ?";
			$txt_adwin_blokright_vote = "Notez nous 5/5";
			$txt_adwin_blokright_sur = "sur";
		}  else { ///ANGLAIS
			$txt_adwin_welcome = "Configuration of the Contact Form";
			$txt_adwin_yes = "Yes";
			$txt_adwin_no = "No";
			$txt_shortcodeainserer = "➡️ To display the contact form, simply insert the following shortcode where you want it: <strong> [scootercontact] </strong>.";
			$txt_adwin_helpkapsule = "I support the editor of this plugin for my karma :";
			$txt_adwin_helpkapsule_p = "👍 By selecting YES, a discreet hypertext link to our website will be inserted at the bottom of your page. <br /> 💡 If you prefer, you can also make a backlink to our site https://www.kapsulecorp.com from your partner page for example.";
			$txt_adwin_helpkapsule_label = "I accept the deal";
			$txt_adwin_blokright_title = "Need help ?";
			$txt_adwin_blokright_corpus_1 = "If you have a problem with this plugin, you will probably find answers on these two pages:";
			$txt_adwin_blokright_corpus_2 = "Documentation";
			$txt_adwin_blokright_corpus_3 = "Support (Board)";
			$txt_adwin_blokright_aime = "Do you like this extension ?";
			$txt_adwin_blokright_vote = "Rate us 5/5";
			$txt_adwin_blokright_sur = "on";
		}
	
		
	?>
<div class="gotham_scooter_wrap">
  <h1><?php echo $txt_adwin_welcome; ?></h1>

  <div class="gotham_scooter_form">
  <form method="post" action="options.php">
  
  <?php settings_fields( 'scooter_form-settings-group' ); ?>
  <?php do_settings_sections('scooter_form-settings-group'); ?>

	  <table id="batbaseadmin">
			<tr class="explain">
			<td colspan="2">
				<h3>👀 Shortcode 👀</h3>
				<p><?php echo $txt_shortcodeainserer; ?></p>
				<p class="shortcode">[scootercontact]</p>
				</td>
			</tr>		  
		  
		  <tr class="explain">
			<td colspan="2">
		  <h3>🚀 <?php echo $txt_adwin_helpkapsule; ?></h3>
		  <p><?php echo $txt_adwin_helpkapsule_p; ?></p>
			</td>
			</tr>
		  <tr>
			  <td class="libelle"><label for="scooter_form_option_powered"><?php echo $txt_adwin_helpkapsule_label; ?> :</label></td>
			  <td>
				<?php $scooter_form_option_powered = get_option('scooter_form_option_powered'); ?>
				<select id="scooter_form_option_powered" name="scooter_form_option_powered" value="<?php echo get_option('scooter_form_option_powered'); ?>">
					<option value="non" <?php selected( $scooter_form_option_powered, 'non' ); ?>><?php echo $txt_adwin_no; ?></option>
					<option value="oui" <?php selected( $scooter_form_option_powered, 'oui' ); ?>><?php echo $txt_adwin_yes; ?></option>
				</select>
			  </td>
		  </tr>
	  </table>

  <?php submit_button(); ?>
  
  </form>
  </div>
  
   <div class="gotham_scooter_credit">
				<h4>✅ Server Tester</h4>
				 <div id="test-email-form"><?php $destinataire = get_option('admin_email'); ?>
					<input type="email" id="test-email-address" placeholder="test@yourdomain.com" value="<?php echo $destinataire; ?>" onfocus="javascript:this.value=''">
					<button id="submit-email-tester">Test</button>
					<div id="response-message"></div>
					</div><script>jQuery(document).ready(function($) {
						$('#submit-email-tester').click(function(e) {
							e.preventDefault();
							var emailAddress = $('#test-email-address').val();
							$.ajax({
								url: ajaxurl,
								type: 'POST',
								data: {
									action: 'test_send_email',
									email: emailAddress
								},
								success: function(response) {
											
									if (response.success) {
										$('#response-message')
											.text(response.data)
											.css('color', 'green');
									} else {
										$('#response-message')
											.text(response.data)
											.css('color', 'red');
									}
								},
								error: function() {
									$('#response-message')
										.text('Error')
										.css('color', 'red'); 
								}
							});
						});
					});</script>
					
					<h3>📆 Scooter Contact</h3>
					<div class="inside">
						<h4 class="inner"><?php echo $txt_adwin_blokright_title; ?></h4>
						<p class="inner"><?php echo $txt_adwin_blokright_corpus_1; ?></p>
						<ul>
							<li>- <a href="https://wordpress.org/plugins/scootercontact/"><?php echo $txt_adwin_blokright_corpus_2; ?></a></li>
							<li>- <a href="https://wordpress.org/support/plugin/scootercontact/"><?php echo $txt_adwin_blokright_corpus_3; ?></a></li>
						</ul>
						<hr>
						<h4 class="inner">🏆 <?php echo $txt_adwin_blokright_aime; ?></h4>
						<p class="inner">⭐ <a href="https://wordpress.org/support/plugin/scootercontact/reviews/?filter=5#new-post" target="_blank"><?php echo $txt_adwin_blokright_vote; ?></a> <?php echo $txt_adwin_blokright_sur; ?> WordPress.org</p>
						<hr>
						<p class="inner">© Copyright <a href="https://www.kapsulecorp.com/">Kapsule Corp</a></p>
					</div>
	</div>
</div>

<?php } 


} 
