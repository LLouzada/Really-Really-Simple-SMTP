![RRSSMTP Logo](https://github.com/LLouzada/Really-Really-Simple-SMTP/blob/main/include/assets/img/rrssmtp-logo.webp)
# Really Really Simple SMTP

## Description

This WordPress plugin was developed to meet the need for compatibility with PHP 5.3 for legacy systems. It is a simple plugin that allows you to configure the SMTP settings for your old WordPress installation. To set up, simply go to the plugin settings page (Configuration -> Really Really Simple SMTP) and fill in the fields with your SMTP settings.

## Compatibility

- **PHP:** Tested from version 5.3 to 8.3.
- **WordPress:** Tested from version 4.9.6 to 6.6.1.

## Installation

1. Download the plugin from the WordPress plugin repository or from the [GitHub repository](https://github.com/llouzada/really-really-simple-smtp).
2. Upload the plugin folder to the `/wp-content/plugins/` directory.
3. Activate the plugin through the 'Plugins' menu in WordPress.

## Usage

Once the plugin is activated, you can access the plugin settings page by going to the 'Configuration' menu in WordPress and selecting 'Really Really Simple SMTP'. From there, you can configure the SMTP settings for your old WordPress installation.

## Features

- **SMTP Settings:** Configure the SMTP settings for your old WordPress installation.
- **Test Send Mail:** Test the SMTP settings by sending a test email.

## Setup

To use this plugin, you **must have your own SMTP server**. Unlike other SMTP plugins, Really Really Simple SMTP does not support integration with popular email services like Gmail or Outlook (For now 😎). This plugin is designed specifically for users who need to connect to their own custom SMTP servers.

In order to set up the plugin, you will need to know the following information:

- **SMTP Host:** The hostname or IP address of your SMTP server.
- **SMTP Port:** The port number of your SMTP server.
- **SMTP Username:** The username for your SMTP server.
- **SMTP Password:** The password for your SMTP server.
- **SMTP Encryption:** The encryption method to use for your SMTP server (e.g. TLS, SSL).

Once you have this information, you can configure the plugin by going to the plugin settings page (Configuration -> Really Really Simple SMTP) and filling in the fields with your SMTP settings.

## License

This plugin is licensed under the GPLv2 or later. See the [GPLv2 license](http://www.gnu.org/licenses/gpl-2.0.html) for more details.

## Support

If you need support or have any questions, please open an issue on the [GitHub repository](https://github.com/llouzada/really-really-simple-smtp/issues) or contact me directly at [loumad.soft@gmail.com](mailto:loumad.soft@gmail.com).

## Changelog

### 1.2.0
- Updated plugin description to clarify usage with custom SMTP servers.
- Minor bug fixes and optimizations.

### 1.1.0
- Added plugin settings section to the WordPress settings menu.
- Added email sending test section to the WordPress settings menu.

### 1.0.0
- Initial release of the plugin.
