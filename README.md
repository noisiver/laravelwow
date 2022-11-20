<p align="center"><img src="https://i.imgur.com/SffC7kf.png" alt="Screenshot of this mini-project"></p>

## About LaravelWoW

Very simple website for your World of Warcraft server on Laravel.

- [All features from Laravel](https://github.com/laravel/laravel).
- Fast, secure and simple.
- SEO Friendly 
- Responsive
- [Tested on AzerothCore](https://github.com/azerothcore/azerothcore-wotlk).

This registration form has several validations on the backend side:

- All fields is required 
- <img src="https://i.imgur.com/aKiNuEw.png" alt="All fields is required">
- Username must not be shorter than 3 characters and not more than 20. Must be unique
- E-mail checking for existing domain zones. Must be unique
- Password must not be shorter than 4 characters. Must match password confirmation
- <img src="https://i.imgur.com/2NHqLM0.png" alt="Username and email must be unique">

## Requirements

- PHP >= 8.0
- gmp extension

## Installation

- Step 1. Copy `.env.example` and paste in the same location and then rename to `.env` 
- Step 2. Launch CLI and run the command `php artisan key:generate`
- Step 3. Open `config/database.php` and provide your database information in `wow_auth` and `wow_char`. 
- Step 4. Open `.env` and find `SERVER_REALMLIST`specify the realmlist of your server.
- Step 5. Go to **[Google Recaptcha Admin](https://www.google.com/recaptcha/admin/create)** and create recaptcha v2 for your domain with checkbox "I'm not a robot". Then specify the secret and client key inside the .env file for `NOCAPTCHA_SECRET` and `NOCAPTCHA_SITEKEY`

### Useful links

- **[AzerothCore](https://github.com/azerothcore/azerothcore-wotlk)**
- **[TrinityCore](https://github.com/TrinityCore/TrinityCore)**
