# Japan Travel Info Frontend (Vue 3 + Vite)

This is the **frontend SPA** for the Japan Travel Info web app. It displays weather and tourist place recommendations for Japanese cities, using data from a separate Laravel API backend.

---

## Features

- Select from major Japanese cities
- View weather forecast and top recommended places
- Responsive design for mobile & desktop
- Clean and modern Vue 3 + Vite setup

---

## Requirements

- Node.js >= 16.x
- Backend API running (see [Japan Travel Info API](../backend/README.md))

---

## Setup

1. **Clone the repository**
    ```bash
    git clone <YOUR_FRONTEND_REPO_URL>
    cd <project-folder>
    ```

2. **Install dependencies**
    ```bash
    npm install
    ```

3. **Configure backend API URL**
    - By default, requests are sent to `http://localhost:8000/api`.
    - To change, open `src/components/TravelInfo.vue` and update:
      ```js
      const backendUrl = 'http://localhost:8000/api'
      ```

4. **Run the dev server**
    ```bash
    npm run dev
    ```
    App will be at `http://localhost:5173`.

---

## Usage

- Select a city to view the weather and recommended tourist places.
- Data is loaded in real-time from the backend API.

---

## Notes

- Make sure your backend is running and CORS is enabled for the frontend’s origin.
- API keys are only needed for the backend.

---

**MIT Licensed.**
