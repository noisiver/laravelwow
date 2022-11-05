<p align="center"><img src="https://i.imgur.com/SffC7kf.png" alt="Screenshot of this mini-project"></p>

## About WoWRegPage

Very simple one-page website for your World of Warcraft server on Laravel.

- [All features from Laravel](https://github.com/laravel/laravel).
- Fast, secure and simple.
- [Tested on AzerothCore](https://github.com/azerothcore/azerothcore-wotlk).


## Installation

- Step 1. Copy `.env.example` and paste in the same location and then rename to `.env` 
- Step 2. Launch CLI and run the command `php artisan key:generate`
- Step 3. Open `config/database.php` and provide your database information in `wow_auth` and `wow_char`. 
- Step 4. Open `.env` and find `SERVER_REALMLIST`specify the realmlist of your server.
- Step 5. Go to **Google Recaptcha Admin](https://www.google.com/recaptcha/admin/create)** and crete recaptcha v2 for your domain with checkbox "I'm not a robot". Then specify the secret and client key inside the .env file for `NOCAPTCHA_SECRET` and `NOCAPTCHA_SITEKEY`

### Useful links

- **[AzerothCore](https://github.com/azerothcore/azerothcore-wotlk)**
- **[TrinityCore](https://github.com/TrinityCore/TrinityCore)**
