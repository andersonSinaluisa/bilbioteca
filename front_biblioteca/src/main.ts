import './assets/main.css'

import { createApp } from 'vue'
import { createPinia } from 'pinia'

import App from './App.vue'
import router from './router'
import './index.css'
import * as FaIcons from "oh-vue-icons/icons/fa";
import { OhVueIcon, addIcons } from "oh-vue-icons";
const Fa = Object.values({ ...FaIcons });

addIcons(...Fa);

const app = createApp(App)

app.use(createPinia())
app.component("v-icon", OhVueIcon);

app.use(router)

app.mount('#app')
