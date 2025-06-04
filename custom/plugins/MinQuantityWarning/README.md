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

## Development

### File Structure

```
MinQuantityWarning/
├── src/
│   ├── Resources/
│   │   ├── app/
│   │   │   └── storefront/
│   │   │       ├── src/
│   │   │       │   ├── main.js
│   │   │       │   ├── min-quantity-warning.js
│   │   │       │   └── scss/
│   │   │       │       └── base.scss
│   │   ├── config/
│   │   │   ├── config.xml
│   │   │   └── services.xml
│   │   ├── views/
│   │   │   └── storefront/
│   │   │       ├── min-quantity-warning.html.twig
│   │   │       └── page/
│   │   │           └── product-detail/
│   │   │               └── buy-widget-form.html.twig
│   │   └── snippet/
│   │       └── storefront/
│   │           └── en-GB/
│   │               └── MinQuantityWarning.storefront.json
│   └── Storefront/
│       └── Controller/
│           └── MinQuantityWarningController.php
```

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

## Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## License

This project is licensed under the MIT License - see the LICENSE file for details.

## Support

If you encounter any issues or have questions, please open an issue in the GitHub repository. 