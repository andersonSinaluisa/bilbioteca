<script  lang="ts">
import BookList from '../components/BookList.vue';
import api from '../api';
import Breadcrumb from '../components/Breadcrumb.vue';
import BookFilterVue from '../components/BookFilter.vue';
export default {
  data() {
    return {
      books: [],
      perPage: 10,
      currentPage: 1,
      total: 0,
      lastPage: 0,
      message: {
        type: '',
        text: ''
      }
    }

  },

  methods: {
    async getList(page: Number = 1) {
      try {
        console.log('getList');
        const res = await api.get('/books?per_page=' + this.perPage + '&page=' + page);
        this.books = res.data.data;
        this.perPage = res.data.meta.per_page;
        this.currentPage = res.data.meta.current_page;
        this.total = res.data.meta.total;
        this.lastPage = res.data.meta.last_page;
      } catch (error: any) {
        this.message = {
          type: 'error',
          text: error?.response?.data?.message || 'Error al obtener los libros'
        }
      }

    },
  },
  components: {
    BookList,
    Breadcrumb,
    BookFilterVue
  },

  mounted() {
    this.getList();
  }
};
</script>
<template>
  <header class="bg-purple-100 shadow dark:bg-gray-700">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

      <div class="xl:flex justify-between">
        <div class="flex justify-start items-center py-7 relative">
          <input
            class="text-sm leading-none text-left text-gray-600 px-4 py-3 w-full border rounded border-gray-300 outline-none"
            type="text" placeholder="Search" />
          <svg class="absolute right-3 z-10 cursor-pointer" width="24" height="24" viewBox="0 0 24 24" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path
              d="M10 17C13.866 17 17 13.866 17 10C17 6.13401 13.866 3 10 3C6.13401 3 3 6.13401 3 10C3 13.866 6.13401 17 10 17Z"
              stroke="#4B5563" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M21 21L15 15" stroke="#4B5563" stroke-width="1.66667" stroke-linecap="round"
              stroke-linejoin="round" />
          </svg>
        </div>
        <BookFilterVue />
      </div>

    </div>
    <div class="flex justify-between mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <breadcrumb />

    </div>

  </header>
  <main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
      <!-- Your content -->
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

      <BookList :books="books" :total="total" :per-page="perPage" :current-page="currentPage" :lastPage="lastPage"
        :change-page="getList" />

    </div>
  </main>
</template>