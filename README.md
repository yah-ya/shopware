# Minimum Quantity Warning Plugin for Shopware 6

This plugin adds a warning message when customers try to add a product to their cart with a quantity below the configured minimum threshold.

## Features

- Configurable minimum quantity per product
- Real-time warning messages on the product detail page
- AJAX-based quantity validation
- Customizable warning messages
- Support for multiple languages

## Requirements

- Shopware 6.4 or higher
- PHP 7.4 or higher

## Installation

1. Download the plugin and upload it to your Shopware installation in the `custom/plugins` directory
2. Install the plugin using the following command:
   ```bash
   bin/console plugin:install --activate MinQuantityWarning
   ```
3. Clear the cache:
   ```bash
   bin/console cache:clear
   ```
4. Build the storefront:
   ```bash
   ./bin/build-storefront.sh
   ```

## Configuration

1. Go to your Shopware admin panel
2. Navigate to Settings > MinQuantityWarning
3. Configure the following settings:
   - Minimum Quantity: Set the minimum quantity threshold
   - Enable Warning: Toggle the warning feature on/off

## Usage

The warning message will automatically appear on the product detail page when:
- The quantity input is changed to a value below the minimum threshold
- The page is loaded with a quantity below the minimum threshold

### Building the Storefront

After making changes to the JavaScript or SCSS files, rebuild the storefront:

```bash
./bin/build-storefront.sh
```

### Testing

The plugin includes both unit and functional tests. Run the tests using:

```bash
./vendor/bin/phpunit
```

