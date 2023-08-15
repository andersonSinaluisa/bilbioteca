<!-- eslint-disable vue/multi-word-component-names -->
<script lang="ts">
export default {
  name: 'Pagination',
  props: {
    currentpage: Number,
    perPage: Number,
    lastPage: Number,
    changePage: Function
  },

  data() {



    return {
      pages: [],
      _currentpage: this.$props.currentpage || 1,
      _perPage: this.$props.perPage || 10,
      _lastPage: this.$props.lastPage || 1,
      _changePage: () => { }
    } as {
      pages: string[],
      _currentpage: number,
      _perPage?: number,
      _lastPage?: number,
    }
  },

  beforeMount() {
    this.pages = this.getPagesList();
  },

  updated() {
    this.pages = this.getPagesList();
    this._currentpage = this.$props.currentpage || 1;
    this._perPage = this.$props.perPage || 10;
    this._lastPage = this.$props.lastPage || 1;

  },

  methods: {
    getPagesList() {
      console.log(this._currentpage, this._perPage, this._lastPage)
      let currentPage = this._currentpage;
      let perPage = this._perPage;
      let lastPage = this._lastPage || 1;

      let pages: string[] = [];

     
    
    if (lastPage === 1) {
      pages.push("1");
    } else {
      let startPage = Math.max(1, currentPage - 2);
      let endPage = Math.min(lastPage, currentPage + 2);

      if (startPage > 1) {
        pages.push("1");
        if (startPage > 2) {
          pages.push("...");
        }
      }

      for (let i = startPage; i <= endPage; i++) {
          pages.push(i.toString());

        
      }

      if (endPage < lastPage) {
        if (endPage < lastPage - 1) {
          pages.push("...");
        }
        pages.push(lastPage.toString());
      }
    }

    
    return pages;

    },
    _changePage(page: string) {
      if (page === '...') {
        return;
      }
      this.$props.changePage?.(parseInt(page));
    }
  }


}
</script>
<template>
  <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
    <a href="#"
      class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
      <span class="sr-only">Previous</span>
      <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
        <path fill-rule="evenodd"
          d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z"
          clip-rule="evenodd" />
      </svg>
    </a>
    <!-- Current: "z-10 bg-indigo-600 text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600", Default: "text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:outline-offset-0" -->


    <a v-for="page in pages" :key="page" @click="_changePage(page)" aria-current="page"
      :class="{ 'bg-primaryDark text-white': page === _currentpage?.toString() }" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold  
      hover:cursor-pointer
      ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
      {{ page }}
    </a>
    <a href="#"
      class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
      <span class="sr-only">Next</span>
      <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
        <path fill-rule="evenodd"
          d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
          clip-rule="evenodd" />
      </svg>
    </a>

  </nav>
</template>