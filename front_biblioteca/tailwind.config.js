/** @type {import('tailwindcss').Config} */
module.exports = {
  purge: ['./index.html', './src/**/*.{vue,js,ts,jsx,tsx}'],
   darkMode: false, // or 'media' or 'class'
   theme: {
     extend: {
      colors:{
        primary:'#0C134F',
        primaryLight:'#5C469C',
        primaryDark:'#5C469C',
        primaryWhite:'#D4ADFC',
        
      }
     },
   },
   variants: {
     extend: {},
   },
   plugins: [],
 }

