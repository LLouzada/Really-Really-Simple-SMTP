<?php

/**
 * Este arquivo é responsável por criar a página de configuração do plugin no painel de admin do WordPress
 * 
 * @package Really Really Simple SMTP
 * @author LLouzada - Loumad Soft
 * @since 1.1
 */

/** 
 * Alerta no painel de admin que a versão do PHP é menor que 5.4 e que existem plugins melhores disponíveis
 *
 * @return void
 * @since 1.0
 */
function rrs_smtp_php_version_notice()
{
    echo '<div class="error"><p>' . __('The Really Really Simple SMTP Plugin was designed to meet the need for compatibility with PHP versions lower than 5.4. The current PHP version is ' . PHP_VERSION . ' and there are better plugins available!', 'really-really-simple-smtp') . '</p></div>';
}

/**
 * Adiciona a página de configuração do plugin no menu do WordPress
 * 
 * @return void
 * @since 1.1
 */
function rrs_smtp_add_admin_menu()
{
    add_options_page(
        'Really Really Simple SMTP',        // Título da página
        'Really Really Simple SMTP',        // Título do menu
        'manage_options',                   // Capacidade
        'rrs_smtp',                         // Slug da página
        'rrs_smtp_options_page'             // Função de callback para renderizar a página
    );
}

/** 
 * Inicializa as configurações do plugin, incluindo a seção e os campos de configuração
 * 
 * @return void
 * @since 1.1
 */
function rrs_smtp_settings_init()
{
    // Registra uma seção de configuração
    register_setting('rrs_smtp', 'rrs_smtp_settings'); // ID da seção

    // Adiciona uma seção à página de configurações
    add_settings_section(
        'rrs_smtp_section',                      // ID da seção
        __('Configurações SMTP', 'wordpress'),      // Título da seção (traduzível)
        'rrs_smtp_settings_section_callback',    // Função de callback para renderizar a seção
        'rrs_smtp'                               // ID da página a qual a seção pertence
    );

    // Adiciona os campos de configuração
    add_settings_field(
        'rrs_smtp_host',                 // ID do campo
        __('Servidor SMTP', 'wordpress'),   // Título do campo (traduzível)  
        'rrs_smtp_host_render',          // Função de callback para renderizar o campo
        'rrs_smtp',                      // Slug da página
        'rrs_smtp_section'               // ID da seção a qual o campo pertence
    );

    add_settings_field(
        'rrs_smtp_port',
        __('Porta SMTP', 'wordpress'),
        'rrs_smtp_port_render',
        'rrs_smtp',
        'rrs_smtp_section'
    );

    add_settings_field(
        'rrs_smtp_username',
        __('Usuário SMTP', 'wordpress'),
        'rrs_smtp_username_render',
        'rrs_smtp',
        'rrs_smtp_section'
    );

    add_settings_field(
        'rrs_smtp_password',
        __('Senha SMTP', 'wordpress'),
        'rrs_smtp_password_render',
        'rrs_smtp',
        'rrs_smtp_section'
    );

    add_settings_field(
        'rrs_smtp_encryption',
        __('Criptografia', 'wordpress'),
        'rrs_smtp_encryption_render',
        'rrs_smtp',
        'rrs_smtp_section'
    );

    add_settings_field(
        'rrs_smtp_from_name',
        __('Nome do Remetente', 'wordpress'),
        'rrs_smtp_from_name_render',
        'rrs_smtp',
        'rrs_smtp_section'
    );
}

/**
 * Renderiza o campo de configuração do host SMTP
 * 
 * @return void
 * @since 1.1
 */
function rrs_smtp_host_render()
{
    $options = get_option('rrs_smtp_settings');
?>
    <input type='text' name='rrs_smtp_settings[rrs_smtp_host]' value='<?php echo $options['rrs_smtp_host']; ?>'>
<?php
}

/**
 * Renderiza o campo de configuração da porta SMTP
 * 
 * @return void
 * @since 1.1
 */
function rrs_smtp_port_render()
{
    $options = get_option('rrs_smtp_settings');
?>
    <input type='text' name='rrs_smtp_settings[rrs_smtp_port]' value='<?php echo $options['rrs_smtp_port']; ?>'>
<?php
}

/**
 * Renderiza o campo de configuração do usuário SMTP
 *
 * @return void
 * @since 1.1
 */
function rrs_smtp_username_render()
{
    $options = get_option('rrs_smtp_settings');
?>
    <input type='text' name='rrs_smtp_settings[rrs_smtp_username]' value='<?php echo $options['rrs_smtp_username']; ?>'>
<?php
}

/**
 * Renderiza o campo de configuração da senha SMTP
 * 
 * @return void
 * @since 1.1
 */
function rrs_smtp_password_render()
{
    $options = get_option('rrs_smtp_settings');
?>
    <input type='password' name='rrs_smtp_settings[rrs_smtp_password]' value='<?php echo $options['rrs_smtp_password']; ?>'>
<?php
}

/**
 * Renderiza o campo de configuração da criptografia SMTP
 * 
 * @return void
 * @since 1.1
 */
function rrs_smtp_encryption_render()
{
    $options = get_option('rrs_smtp_settings');
?>
    <select name='rrs_smtp_settings[rrs_smtp_encryption]'>
        <option value='none' <?php selected($options['rrs_smtp_encryption'], 'none'); ?>>Nenhuma</option>
        <option value='ssl' <?php selected($options['rrs_smtp_encryption'], 'ssl'); ?>>SSL</option>
        <option value='tls' <?php selected($options['rrs_smtp_encryption'], 'tls'); ?>>TLS</option>
    </select>
<?php
}

/**
 * Renderiza o campo de configuração do nome do remetente
 * 
 * @return void
 * @since 1.1
 */
function rrs_smtp_from_name_render()
{
    $options = get_option('rrs_smtp_settings');
?>
    <input type='text' name='rrs_smtp_settings[rrs_smtp_from_name]' value='<?php echo $options['rrs_smtp_from_name']; ?>'>
<?php
}

/**
 * Renderiza a seção de configuração do plugin
 * 
 * @return void
 * @since 1.1
 */
function rrs_smtp_settings_section_callback()
{
    echo __('Configure as informações do servidor SMTP abaixo:', 'wordpress');
}

/**
 * Renderiza a página de opções do plugin
 * 
 * @return void
 * @since 1.1
 */
function rrs_smtp_options_page()
{
?>
    <form action='options.php' method='post'>
        <h2>
            Really Really Simple SMTP</h2>
        <br>

        <a href="https://github.com/LLouzada/Really-Really-Simple-SMTP"><img src="<?php echo plugins_url('assets/img/loumad-logo.png', __FILE__); ?>" alt="Logo Loumad Soft" width="150"></a>
        <br>

        <?php
        settings_fields('rrs_smtp');
        do_settings_sections('rrs_smtp');
        submit_button();
        ?>
    </form>
    <hr>
    <h2>Testar Envio de E-mail</h2>
    <form method="post" action="">
        <input type="text" name="test_email" placeholder="Digite um e-mail para testar" />
        <?php submit_button('Enviar E-mail de Teste'); ?>
    </form>

<?php
    if (isset($_POST['test_email']) && !empty($_POST['test_email'])) {
        rrs_smtp_send_test_email($_POST['test_email']);
    }
}
