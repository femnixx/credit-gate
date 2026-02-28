/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue", // This is the most important line for your Cat Club!
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}