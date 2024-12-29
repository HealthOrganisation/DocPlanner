// resources/js/app.js
import { createApp } from 'vue'; // Import Vue
import HomePage from './components/HomePage.vue'; // Use alias to import the component

// Mount HomePage to an element with id="app"
createApp(HomePage).mount('#app');
