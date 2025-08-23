# Environment Variables Setup Guide

## Required Environment Variables

This Laravel application requires the following environment variables to be set in your `.env` file:

### API Configuration
- `API_URL`: The base URL for the API (default: `http://pupt-registration.site`)
- `API_KEY`: Your API key for authentication

### Application Configuration (Standard Laravel)
- `APP_NAME`: Your application name
- `APP_ENV`: Application environment (`local`, `production`, `testing`)
- `APP_KEY`: Application encryption key
- `APP_DEBUG`: Debug mode (`true` or `false`)
- `APP_URL`: Application URL

### Database Configuration
- `DB_CONNECTION`: Database driver (`mysql`, `sqlite`, `pgsql`, etc.)
- `DB_HOST`: Database host
- `DB_PORT`: Database port
- `DB_DATABASE`: Database name
- `DB_USERNAME`: Database username
- `DB_PASSWORD`: Database password

### Mail Configuration (Optional)
- `MAIL_MAILER`: Mail driver
- `MAIL_HOST`: Mail host
- `MAIL_PORT`: Mail port
- `MAIL_USERNAME`: Mail username
- `MAIL_PASSWORD`: Mail password
- `MAIL_ENCRYPTION`: Mail encryption

## Setup Instructions

1. **Copy the environment file:**
   ```bash
   cp .env.example .env
   ```

2. **Generate application key:**
   ```bash
   php artisan key:generate
   ```

3. **Set your API credentials:**
   ```env
   API_URL=http://pupt-registration.site
   API_KEY=your_actual_api_key_here
   ```

4. **Configure database:**
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_username
   DB_PASSWORD=your_database_password
   ```

5. **Configure application settings:**
   ```env
   APP_NAME="PUP Club Organization"
   APP_ENV=local
   APP_DEBUG=true
   APP_URL=http://localhost:8000
   ```

## Usage in Code

Environment variables are accessed using Laravel's `env()` function:

```php
$apiUrl = env('API_URL', 'http://pupt-registration.site');
$apiKey = env('API_KEY');
```

## Security Notes

- Never commit your `.env` file to version control
- Keep your API keys and database credentials secure
- Use different environment configurations for development, staging, and production
- Rotate API keys regularly for security

## Troubleshooting

If you encounter issues:
1. Ensure all required environment variables are set
2. Verify the API URL is accessible
3. Check that the API key is valid
4. Run `php artisan config:clear` to clear cached configuration
