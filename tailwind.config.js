/** @type {import('tailwindcss').Config} */
//const plugin = require('tailwindcss/plugin')
module.exports = {
  content: [ "./resources//*.blade.php",
  "./resources//.js",
  "./resources/**/.vue",
  "./node_modules/flowbite/*/.js"],
  theme: {
    extend: {},
  },
  plugins: [],
}

