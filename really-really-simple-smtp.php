<?php
/*
* Plugin Name: Really Really Simple SMTP
* Description: This plugin was developed to meet the need for compatibility with PHP 5.3 for legacy systems. It is a simple plugin that allows you to configure the SMTP settings for your Old WordPress installation. To setup, simply go to the plugin settings page (Configuration -> Really Really Simple SMTP) and fill in the fields with your SMTP settings.
* Version: 1.2
* Author: LLouzada - Loumad Soft 
* Author URI: https://github.com/LLouzada/
* License: GPLv2 or later
* License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

// Caso acessado diretamente, aborta
if (!defined('ABSPATH')) {
    exit;
}

//todo - adicionar opção de ativar / desativar alerta
define('RRS_SMTP_SHOW_VERSION_ALERT', true);
// Caso a versão do PHP for maior ou igual a 5.4 exibe alerta no painel de admin 
if (version_compare(PHP_VERSION, '5.4', '>=') && RRS_SMTP_SHOW_VERSION_ALERT) {
    add_action('admin_notices', 'rrs_smtp_php_version_notice');
}

// Define o diretório do plugin
if (!defined('RRS_SMTP_PLUGIN_DIR')) {
    define('RRS_SMTP_PLUGIN_DIR', plugin_dir_path(__FILE__));
}

// Inclui os arquivos necessários
require_once(RRS_SMTP_PLUGIN_DIR . 'include/really-really-simple-smtp-mail.php');
require_once(RRS_SMTP_PLUGIN_DIR . 'include/really-really-simple-smtp-wp-admin.php');

// Adiciona a página de configuração no menu do WordPress
add_action('admin_menu', 'rrs_smtp_add_admin_menu');
add_action('admin_init', 'rrs_smtp_settings_init');

// Adiciona nossa função personalizada ao hook 'wp_mail_from' para substituir o endereço de e-mail de remetente
add_filter('wp_mail_from', 'rrs_wp_mail_from');

// Adiciona nossa função personalizada ao hook 'phpmailer_init' para configurar o PHPMailer
add_action('phpmailer_init', 'rrs_smtp_phpmailer');

// Adiciona nossa função personalizada ao hook 'wp_mail_failed' para registrar erros de envio de e-mail
add_action('wp_mail_failed', 'rrs_smtp_mail_failed');
