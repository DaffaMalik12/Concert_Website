/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./src/Pages/**/*.{html,js,php}",
    "./node_modules/flowbite/**/*.js",
  ],
  theme: {
    extend: {},
  },
  plugins: [require("daisyui"), require("flowbite/plugin")],
};
