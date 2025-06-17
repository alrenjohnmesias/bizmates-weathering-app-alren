<template>
  <div class="container">
    <h1>Japan Travel Info</h1>
    <div>
      <label>Select City:</label>
      <select v-model="selectedCity" @change="fetchAll">
        <option v-for="city in cities" :key="city" :value="city">{{ city }}</option>
      </select>
    </div>
    <div v-if="loading" class="loader">Loading...</div>
    <div v-if="error" class="error">{{ error }}</div>
    <div v-if="weather">
      <h2>Weather in {{ selectedCity }}</h2>
      <ul>
        <li v-for="(item, idx) in weather.list.slice(0, 5)" :key="item.dt">
          {{ item.dt_txt }} - {{ item.main.temp }}°C ({{ item.weather[0].main }})
        </li>
      </ul>
    </div>
    <div v-if="places">
      <h2>Top Places in {{ selectedCity }}</h2>
      <ul>
        <li v-for="place in places.results || places" :key="place.fsq_id">
          {{ place.name }} - {{ place.location?.address || place.location?.formatted_address }}
        </li>
      </ul>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'

const cities = ['Tokyo', 'Yokohama', 'Kyoto', 'Osaka', 'Sapporo', 'Nagoya']
const selectedCity = ref('Tokyo')
const weather = ref(null)
const places = ref(null)
const loading = ref(false)
const error = ref('')

const backendUrl = 'http://localhost:8000/api' // point to your Laravel backend

const fetchAll = async () => {
  loading.value = true
  error.value = ''
  weather.value = null
  places.value = null
  try {
    const weatherRes = await axios.get(`${backendUrl}/weather`, { params: { city: selectedCity.value } })
    weather.value = weatherRes.data
    const placesRes = await axios.get(`${backendUrl}/places`, { params: { city: selectedCity.value } })
    places.value = placesRes.data
  } catch (err) {
    error.value = 'Could not fetch data. Check your backend/API keys and CORS settings.'
  }
  loading.value = false
}

onMounted(fetchAll)
</script>

<style scoped>
.container {
  max-width: 450px;
  margin: 2rem auto;
  padding: 2rem;
  border-radius: 20px;
  background: #f4f8fa;
  box-shadow: 0 6px 20px #0001;
  font-family: 'Segoe UI', Arial, sans-serif;
}
h1 { text-align: center; }
select { margin: 1rem 0; }
.loader { margin: 1rem 0; }
.error { color: #d00; font-weight: bold; }
@media (max-width: 600px) {
  .container { max-width: 98vw; padding: 1rem; }
}
</style>
