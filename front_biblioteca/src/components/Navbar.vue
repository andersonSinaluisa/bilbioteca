<script>

export default {
  name: 'NavBar'
}

</script>

<template>
  <div class="p-4 w-full dark:bg-gray-700">
    <!--light mode - text and icons-->
    <div class="p-2 text-gray-900 bg-white  rounded-lg shadow-lg font-medium capitalize dark:bg-gray-800">
      <a class="px-2 mr-2 border-r border-gray-800" href="/">
        <v-icon name="fa-layer-group" scale="1.5" class="text-primaryLight dark:text-primaryWhite" />
      </a>
      <a href="/books" class="px-2 py-1 cursor-pointer hover:bg-gray-200 hover:text-gray-700 text-sm rounded mb-5">
        <span class="mx-1 dark:text-primaryWhite">
          Books
        </span>
      </a>
      <span class="px-2 py-1 cursor-pointer hover:bg-gray-200 hover:text-gray-700 text-sm rounded mb-5">

        <span class="mx-1 dark:text-primaryWhite">
          Income
        </span>
      </span>
     
      <span class="w-10 relative float-right mr-3 cursor-pointer hover:text-gray-700">
        
        
        <v-icon name="fa-user-circle" scale="1.5" class="text-primaryLight dark:text-primaryWhite" />

        <span
          class="absolute right-0 top-0 -mt-1 -mr-1 text-xs bg-yellow-500 text-black font-medium px-2 rounded-full">3</span>
      </span>
    </div>
  </div>
</template>