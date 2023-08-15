<script  lang="ts">
import { useLoginStore } from '../stores/user_data'

export default {
  data() {
    return {
      email: '',
      password: '',
      message: {
        type: '',
        text: ''
      }
    }

  },

  methods: {
    login() {
      if (this.email === '' || this.password === '') {
        this.message = {
          type: 'error',
          text: 'Usuario y contraseña son requeridos'
        }
        return
      }

      useLoginStore().login(this.email, this.password)
        .then(() => {
          this.$router.push({ name: 'home' })
        })
        .catch((error) => {
          this.message = {
            type: 'error',
            text: error.message
          }
        })
    }
  }

}

</script>
<template>
  <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm ">

      <v-icon name="fa-layer-group" scale="1.5" class="text-primary mx-auto h-10 w-auto             dark:text-primaryWhite
" />

      <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-primary             dark:text-primaryWhite
">
        Iniciar sesión
      </h2>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
      <div v-if="message.text" class="bg-red-600 border border-red-600 text-white px-4 py-3 rounded relative"
        role="alert">
        <strong class="font-bold"></strong>
        <span class="block sm:inline">{{ message.text }}</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
          <svg class="fill-current h-6 w-6 text-white" role="button" xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 20">
            <title>Close</title>
            <path
              d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
          </svg>
        </span>
      </div>
      <form class="space-y-6" @submit.prevent="login">
        <div>
          <label for="email" class="block text-sm font-medium             dark:text-primaryWhite
 leading-6 text-gray-900">Email address</label>
          <div class="mt-2">
            <input id="email" name="email" type="email" autocomplete="email" required v-model="email"
              class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6">
          </div>
        </div>

        <div>
          <div class="flex items-center justify-between">
            <label for="password" class="block text-sm font-medium 
            dark:text-primaryWhite
            leading-6 text-gray-900">Password</label>
            <div class="text-sm">
              <a href="#" class="font-semibold text-primary hover:text-primaryLight             dark:text-primaryWhite
">Forgot password?</a>
            </div>
          </div>
          <div class="mt-2">
            <input id="password" name="password" type="password" autocomplete="current-password" v-model="password"
              class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6">
          </div>
        </div>

        <div>
          <button type="submit"
            class="flex w-full justify-center rounded-md bg-primary px-3 py-1.5 
            dark:bg-primaryWhite dark:text-primaryLight
            text-sm font-semibold leading-6 text-white shadow-sm hover:bg-primaryLight focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign
            in</button>
        </div>
      </form>

      <p class="mt-10 text-center text-sm text-gray-500">

      </p>
    </div>
  </div>
</template>
