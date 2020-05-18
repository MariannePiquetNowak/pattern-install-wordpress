<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', '' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', '' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', '' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '');
define('SECURE_AUTH_KEY',  '');
define('LOGGED_IN_KEY',    '');
define('NONCE_KEY',        '');
define('AUTH_SALT',        '');
define('SECURE_AUTH_SALT', '');
define('LOGGED_IN_SALT',   '');
define('NONCE_SALT',       '');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

// Indique à Wordpress l'url du dossier content
define( 'WP_CONTENT_URL', 'http://localhost/__mon-url-à-remplacer__/content');
// Indique à WP le chemin du dossier content (sur le disque dur)
define( 'WP_CONTENT_DIR', dirname(__FILE__) . '/content' ); 
/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false ); // Permet d'afficher les erreurs, à savoir, les révisions lorsque l'on modifie un contenu
// false en prod / true en developpement

if(WP_DEBUG) { // Si le debug est true
  define('WP_DEBUG_LOG', true); // Permet d'avoir le fichier debug.log
  
  define('WP_DEBUG_DISPLAY', true); // Je demande à wp de m'afficher les messages d'erreurs 

  // Désactivation total des révisions de contenus
  define('WP_POST_REVISIONS', false);

  // Vider la corbeille
  define('EMPTY_TRASH_DAYS', 0 );  // 0 days

} else {
  // Je suis en prod, Je désactive l'installation de thème et de plugins automatique
  define('DISALLOW_FILE_MODS', true);

  // JE limite le nombre de versions à 5 (pour éviter de surcharger la BDD quand on revoit un article car tout changement est sauvegardé)
  define('WP_POST_REVISIONS', 5);

  // La corbeille pour le client durera 15 jours avant d'être définitivement supprimé.
  define('EMPTY_TRASH_DAYS', 15 );  // 15 days
}

// J'ordonne à WP d'utiliser la méthode simple pour manipuler les fichiers
// Pas besoin de FTP ni de SSH : la machine est bien configurée et sécurisée
define('FS_METHOD', 'direct');

// désactiver l'éditeur de thème embarqué dans le tableau de bord de Wordpress (vu que l'on possède VSC)
// Pour éviter que votre client ne fasse n'importe quoi avec votre thème :D 
define('DISALLOW_FILE_EDIT', true);

// Alloué (augmenter) la mémoire PHP à 64Mo
define('WP_MEMORY_LIMIT', '64M');

// Paramétrer la langue de wordpress 
define('WPLANG', 'fr_FR');
define('WP_LANG_DIR', $_SERVER['DOCUMENT_ROOT'].'wordpress/languages');

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
