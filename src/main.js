import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import vuetify from './plugins/vuetify'
import { loadFonts } from './plugins/webfontloader'
import axios from 'axios'
import '@vueup/vue-quill/dist/vue-quill.snow.css';
import '@vueup/vue-quill/dist/vue-quill.bubble.css';

axios.defaults.baseURL = "http://cityjournal.test/"

loadFonts()

createApp(App)
  .use(router)
  .use(vuetify)
  .mount('#app')
