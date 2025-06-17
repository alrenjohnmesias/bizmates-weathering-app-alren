# Japan Travel Info API (Laravel)

This is the **backend API** for the Japan Travel Info web app. It provides weather forecasts and top tourist places for major cities in Japan, for consumption by a separate frontend app.

---

## Features

- RESTful API endpoints for:
  - Weather forecast (via OpenWeatherMap)
  - Top places to visit (via Foursquare)
- Easy city-based querying
- Clean, stateless, API-first architecture

---

## Requirements

- PHP >= 8.0 (8.1 recommended for Laravel 8/9/10, or 8.2+ for Laravel 11+)
- Composer
- OpenWeatherMap API key (free)
- Foursquare API key (free)

---

## Setup

1. **Clone the repository**
    ```bash
    git clone <YOUR_BACKEND_REPO_URL>
    cd <project-folder>
    ```

2. **Install dependencies**
    ```bash
    composer install
    ```

3. **Copy and configure your `.env`**
    ```bash
    cp .env.example .env
    ```
    Add your API keys in `.env`:
    ```
    OPENWEATHER_API_KEY=your_openweather_api_key
    FOURSQUARE_API_KEY=your_foursquare_api_key
    ```

4. **Generate Laravel app key**
    ```bash
    php artisan key:generate
    ```

5. **Configure CORS**
    Edit `config/cors.php` and allow your frontend’s origin (e.g. `http://localhost:5173`):
    ```php
    'paths' => ['api/*'],
    'allowed_origins' => ['http://localhost:5173'],
    ```

6. **Run the API server**
    ```bash
    php artisan serve
    ```
    API will be at `http://localhost:8000/api`.

---

## API Endpoints

- `GET /api/weather?city=Tokyo`
- `GET /api/places?city=Tokyo`

Supported cities: **Tokyo, Yokohama, Kyoto, Osaka, Sapporo, Nagoya**

---

## Notes

- Use with the separate frontend (see [Japan Travel Info Frontend](../frontend/README.md)).
- Requires valid OpenWeatherMap and Foursquare API keys.
- Make sure PHP version matches Laravel requirements.

---

**MIT Licensed.**
