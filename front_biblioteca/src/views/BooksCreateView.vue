<script lang="ts">
import api from '../api'
import { type ResponseApi } from '../api'
import { type newBook, type Book } from '../api/models/book'
import {type Category} from '../api/models/category'
import breadcrumb from '../components/Breadcrumb.vue'
export default {
    name: 'BooksCreate',
    components: {
        breadcrumb
    },
    data(){
        return{
            categories: [],
            message:{
                type: '',
                text: ''
            },
            data: {
                category_id: 0,
                name: '',
                country: '',
                description: '',
                edition: "",
                pages: "",
                year: "",
                editorial: "",
                file: "",
                image: "",
                isbn: "",
                language: "",
                status: "",
            }
        } as {
            categories: Category[],
            message: {
                type: string,
                text: string
            },
            data:newBook
        }
    
    },

    methods:{
        async getCategories(){
            try{
                const res = await api.get<ResponseApi<Category[]>>('/categories');
                this.categories = res.data.data;

            }catch(e:any){
                this.message = {
                    type: 'error',
                    text: e.response.data.message
                }
            }
            
        },
        onChanged(e){
            
            this.data = {
                ...this.data,
                [e.target.name]:e.target.value
            }
        },
        async createBook(){
            try{
                const res = await api.post<ResponseApi<Book>>('/books/',this.data);
                this.message = {
                    type: 'success',
                    text: res.data.message
                }

            }catch(e:any){
                this.message = {
                    type: 'error',
                    text: e.response.data.message
                }
            }
        }
    },

    beforeMount(){
        this.getCategories();
    }
}
</script>

<template>
    <header class="bg-purple-100 shadow dark:bg-gray-700">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <breadcrumb></breadcrumb>


        </div>
    </header>
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <section class="mx-auto max-w-2xl px-4 bg-white dark:bg-slate-600 rounded-lg  py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-primaryDark dark:text-slate-200">New Book</h1>

                <form>
                    <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                        <div>
                            <label class="text-primaryDark dark:text-gray-200" for="username">Name</label>
                            <input id="username" type="text"
                                class="block w-full px-4 py-2 mt-2 text-primaryDark bg-white border border-primaryDark rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                        </div>

                        <div>
                            <label class="text-primaryDark dark:text-gray-200" for="emailAddress">Description</label>
                            <textarea id="emailAddress" type="email"
                                class="block w-full px-4 py-2 mt-2 text-primaryDark bg-white border border-primaryDark rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" />
                        </div>

                        <div>
                            <label class="text-primaryDark dark:text-gray-200" for="password">Country</label>
                            <input id="password" type="password"
                                class="block w-full px-4 py-2 mt-2 text-primaryDark bg-white border border-primaryDark rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                        </div>
                        
                        <div>
                            <label for="HeadlineAct" class="text-primaryDark dark:text-gray-200">
                                Category
                            </label>

                            <select class="block w-full px-4 py-2 mt-2 text-primaryDark 
                                bg-white border border-primaryDark rounded-md 
                                dark:bg-gray-800 dark:text-gray-300
                                 dark:border-gray-600 focus:border-primaryLight
                                 focus:ring-primaryLight focus:ring-opacity-40 
                                 dark:focus:border-blue-300 focus:outline-none focus:ring">
                                <option v-for="category in categories" :key="category.id" :value="category.id">
                                    {{category.name}}
                                </option>
                            </select>
                        </div>
                        <div class="flex space-x-2">
                            <div>
                                <label class="text-primaryDark dark:text-gray-200" for="passwordConfirmation">
                                    Pages
                                </label>
                                <input id="passwordConfirmation" type="number" class="block w-24 px-4 py-2 mt-2 text-primaryDark 
                                bg-white border border-primaryDark rounded-md 
                                dark:bg-gray-800 dark:text-gray-300
                                 dark:border-gray-600 focus:border-primaryLight
                                 focus:ring-primaryLight focus:ring-opacity-40 
                                 dark:focus:border-blue-300 focus:outline-none focus:ring">

                            </div>
                            <div>
                                <label class="text-primaryDark dark:text-gray-200" for="passwordConfirmation">Year
                                </label>
                                <input id="passwordConfirmation" type="number" class="block w-24 px-4 py-2 mt-2 text-primaryDark 
                                bg-white border border-primaryDark rounded-md 
                                dark:bg-gray-800 dark:text-gray-300
                                 dark:border-gray-600 focus:border-primaryLight
                                 focus:ring-primaryLight focus:ring-opacity-40 
                                 dark:focus:border-blue-300 focus:outline-none focus:ring">

                            </div>
                            <div>
                                <label class="text-primaryDark dark:text-gray-200" for="passwordConfirmation">
                                    Edition
                                </label>
                                <input id="passwordConfirmation" type="number" class="block w-24 px-4 py-2 mt-2 text-primaryDark 
                                bg-white border border-primaryDark rounded-md 
                                dark:bg-gray-800 dark:text-gray-300
                                 dark:border-gray-600 focus:border-primaryLight
                                 focus:ring-primaryLight focus:ring-opacity-40 
                                 dark:focus:border-blue-300 focus:outline-none focus:ring">

                            </div>
                        </div>
                        <div>
                            <label class="text-primaryDark dark:text-gray-200" for="password">Image</label>
                            <input id="password" type="file"
                                class="block w-full px-4 py-2 mt-2 text-primaryDark bg-white border
                                 border-primaryDark rounded-md dark:bg-gray-800 dark:text-gray-300
                                  dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 
                                  focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                        </div>

                    </div>

                    <div class="flex justify-end mt-6 space-x-5">
                        <a
                        href="/books"
                            class="px-8 py-2.5 leading-5 transition-colors 
                            duration-300 transform bg-transparent border border-primaryLight 
                            text-primaryLight rounded-md 
                            hover:text-white
                            dark:border-gray-600
                            dark:hover:text-gray-900
                            dark:bg-primaryWhite
                            hover:bg-primaryLight focus:outline-none focus:bg-gray-600">
                            Cancel
                    </a>
                        <button
                            class="px-8 py-2.5 leading-5 text-white transition-colors 
                            duration-300 transform bg-primaryDark rounded-md 
                            hover:bg-primaryLight focus:outline-none focus:bg-gray-600">Save</button>
                    </div>
                </form>
            </section>
        </div>
    </main>
</template>