<script lang="ts">
import type { Book } from '../api/models/book';
import Pagination from './Pagination.vue';
import Card from './Card.vue';
export default {
  name: 'BookList',
  props: {
    books: Array<Book>,
    total: Number,
    perPage: Number,
    currentPage: Number,
    lastPage: Number,
    changePage: Function,
  },

  data() {
    return {
      pages: Array<number>

    }
  },

  beforeMount() {

  },

  methods: {

  },
  components: {
    Pagination,
    Card,
  }

}

</script>
<template>
  <div class="bg-white dark:bg-gray-800">

    <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
      <div class="flex justify-between">
        <h1 class="text-3xl font-bold tracking-tight text-gray-600 dark:text-slate-200">
          Libros
        </h1>
        <a href="/books/new"
          class="inline-flex items-center px-6 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-primaryLight hover:bg-primaryWhite">
          Add Book
        </a>
      </div>

      <p class="mt-4 max-w-3xl text-lg text-gray-500 dark:text-gray-300">Aqui puedes ver todos los libros que tenemos en
        la biblioteca</p>


      <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
        <Card v-for="book in books" :key="book.id" :description="book.description" :edition="book.edition"
          :lang="book.language" :name="book.name" :image="book.image" :year="book.year" />





        <!-- More products... -->
      </div>
      <div class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6 dark:bg-gray-800">

        <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
          <div>
            <p class="text-sm text-gray-700">
              Showing
              <span class="font-medium">1</span>
              to
              <span class="font-medium">10</span>
              of
              <span class="font-medium">97</span>
              results
            </p>
          </div>

        </div>
        <div>
          <Pagination :currentpage=currentPage :per-page=perPage :last-page=lastPage :change-page="changePage" />
        </div>
      </div>
    </div>
  </div>
</template>