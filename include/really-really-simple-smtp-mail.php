<?php
/**
 * Core do plugin Really Really Simple SMTP, responsável por configurar o PHPMailer para usar SMTP com as configurações do plugin.
 * 
 * @package Reeally Really Simple SMTP
 * @author LLouzada - Loumad Soft
 * @since 1.1
 */

 /**
  * Função personalizada para substituir o endereço de e-mail de origem no WordPress
  *
  * @param string $original_email_address
  * @return string
  * @since 1.2
  */
 function rrs_wp_mail_from($original_email_address)
{
    $options = get_option('rrs_smtp_settings');
    $custom_email_address = isset($options['rrs_smtp_from_email']) ? $options['rrs_smtp_from_email'] : $original_email_address;
    return $custom_email_address;
}

/**
 * Configura o PHPMailer para usar SMTP com as configurações do plugin
 * 
 * @param PHPMailer $phpmailer
 * @return void
 * @since 1.0
 */
function rrs_smtp_phpmailer($phpmailer)
{
    $options = get_option('rrs_smtp_settings');

    $phpmailer->isSMTP();
    $phpmailer->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    $phpmailer->CharSet = 'UTF-8';

    $phpmailer->Host = $options['rrs_smtp_host'];
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = $options['rrs_smtp_port'];
    $phpmailer->Username = $options['rrs_smtp_username'];
    $phpmailer->Password = $options['rrs_smtp_password'];
    $phpmailer->SMTPSecure = $options['rrs_smtp_encryption'];
    $phpmailer->From = $options['rrs_smtp_username'];
    $phpmailer->FromName = $options['rrs_smtp_from_name'];
}

/**
 * Permite testar o envio de e-mail 
 * 
 * @param string $to_email O endereço de e-mail para enviar o teste
 * @return void
 * @since 1.0
 */
function rrs_smtp_send_test_email($to_email)
{
    $subject = 'Teste de envio de e-mail SMTP';
    $message = 'Este é um e-mail de teste enviado usando SMTP via plugin Really Really Simple SMTO. If you received, it worked, congratulations!!';
    $headers = array('Content-Type: text/html; charset=UTF-8');

    if (wp_mail($to_email, $subject, $message, $headers)) {
        echo '<div class="notice notice-success is-dismissible"><p>E-mail enviado com sucesso!</p></div>';
    } else {
        echo '<div class="notice notice-error is-dismissible"><p>Falha ao enviar o e-mail.</p></div>';
        echo '<pre>';
        print_r(error_get_last());
        echo '</pre>';
    }
}
