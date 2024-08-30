# Really Really Simple SMTP

## Description

This plugin was developed to meet the need for compatibility with PHP 5.3 for legacy systems. It is a simple plugin that allows you to configure the SMTP settings for your old WordPress installation. To set up, simply go to the plugin settings page (Configuration -> Really Really Simple SMTP) and fill in the fields with your SMTP settings.

## Compatibility

- **PHP:** Tested from version 5.3 to 8.3.
- **WordPress:** Tested from version 4.9.6 to 6.6.1.

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

## Changelog

### 1.2.0
- Updated plugin description to clarify usage with custom SMTP servers.
- Minor bug fixes and optimizations.

### 1.1.0
- Added plugin settings section to the WordPress settings menu.
- Added email sending test section to the WordPress settings menu.

### 1.0.0
- Initial release of the plugin.
