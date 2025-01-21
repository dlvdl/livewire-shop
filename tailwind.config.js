/** @type {import('tailwindcss').Config} */
export default {
  content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
  ],
  theme: {
    extend: {
        fontFamily: {
            Roboto: ['Roboto', 'sans-serif'],
            Poppins: ['Poppins', 'sans-serif']
        },
        colors: {
            primaryGreen: '#56B280',
            primaryBlack: '#272727',
            primaryWhite: '#FFFFFF'
        }
    },
  },
  plugins: [
      require('daisyui'),
  ],
}

