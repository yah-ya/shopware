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
- Docker and Docker Compose

## Docker Setup

1. Clone the repository:
   ```bash
   git clone https://github.com/your-username/shopware.git
   cd shopware
   ```

2. Start the Docker containers:
   ```bash
   docker compose up -d
   ```

3. Wait for all containers to be ready (this may take a few minutes on first run)

4. Access the Shopware installation:
   - Storefront: http://localhost:8000
   - Admin panel: http://localhost:8000/admin
     - Default credentials:
       - Username: admin
       - Password: shopware

## Plugin Installation

1. The plugin is located in `custom/plugins/MinQuantityWarning`
2. Install the plugin using the following command:
   ```bash
   docker exec -it shopware bash -c "cd /var/www/html && bin/console plugin:install --activate MinQuantityWarning"
   ```
3. Clear the cache:
   ```bash
   docker exec -it shopware bash -c "cd /var/www/html && bin/console cache:clear"
   ```
4. Build the storefront:
   ```bash
   docker exec -it shopware bash -c "cd /var/www/html && ./bin/build-storefront.sh"
   ```

## Configuration

1. Go to your Shopware admin panel (http://localhost:8000/admin)
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
docker exec -it shopware bash -c "cd /var/www/html && ./bin/build-storefront.sh"
```

### Testing

The plugin includes both unit and functional tests. Run the tests using:

```bash
docker exec -it shopware bash -c "cd /var/www/html && ./vendor/bin/phpunit"
```

## Development

### Docker Commands

- Start containers:
  ```bash
  docker compose up -d
  ```

- Stop containers:
  ```bash
  docker compose down
  ```

- View logs:
  ```bash
  docker compose logs -f
  ```

- Access PHP container:
  ```bash
  docker exec -it shopware bash
  ```

- Restart containers:
  ```bash
  docker compose restart
  ```

## Troubleshooting

If you encounter issues:

1. Clear the cache:
   ```bash
   docker exec -it shopware bash -c "cd /var/www/html && bin/console cache:clear"
   ```

2. Rebuild the storefront:
   ```bash
   docker exec -it shopware bash -c "cd /var/www/html && ./bin/build-storefront.sh"
   ```

3. Check container logs:
   ```bash
   docker compose logs -f shopware
   ```

4. Restart containers:
   ```bash
   docker compose restart
   ```