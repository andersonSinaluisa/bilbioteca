<script lang="ts">

export default {
    name:'CardItem',
    props:{
        image:String,
        name:String,
        description:String,
        year:String,
        edition:String,
        lang:String
    },
    data(){
        return {
            isHover:false
        }
    }
};
</script>


<template>
    <a href="#" class="block rounded-lg p-4 shadow-sm shadow-indigo-100">
        <img alt="Home"
            :src="image"
            class="h-56 w-full rounded-md object-cover" />

        <div class="mt-2">
            <dl>
                
                <div>
                    <dt class="sr-only">Address</dt>

                    <dd class="font-medium dark:text-primaryWhite">{{ name }}</dd>
                </div>
            </dl>

            <div class="mt-6 flex items-center gap-8 text-xs">
                <div class="sm:inline-flex sm:shrink-0 sm:items-center sm:gap-2">
                    <v-icon name="fa-calendar" scale="1" class="text-primaryLight dark:text-primaryWhite"/>


                    <div class="mt-1.5 sm:mt-0">
                        <p class="text-gray-500 dark:text-primaryWhite">Year</p>

                        <p class="font-medium dark:text-primaryWhite">{{ year }}</p>
                    </div>
                </div>

                <div class="sm:inline-flex sm:shrink-0 sm:items-center sm:gap-2">
                    <v-icon name="fa-tag" scale="1" class="text-primaryLight dark:text-primaryWhite"/>


                    <div class="mt-1.5 sm:mt-0">
                        <p class="text-gray-500 dark:text-primaryWhite">Edition</p>

                        <p class="font-medium dark:text-primaryWhite">{{ edition }}</p>
                    </div>
                </div>

                <div class="sm:inline-flex sm:shrink-0 sm:items-center sm:gap-2">
                    <v-icon name="fa-language" scale="1" class="text-primaryLight dark:text-primaryWhite"/>


                    <div class="mt-1.5 sm:mt-0">
                        <p class="text-gray-500 dark:text-primaryWhite">Lang</p>

                        <p class="font-medium dark:text-primaryWhite">{{ lang }}</p>
                    </div>
                </div>
            </div>
        </div>
    </a>
</template>