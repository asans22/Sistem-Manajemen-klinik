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
        poppins: ["Poppins", "sans-serif"],
      },
      colors: {
        "linen": "#FFF9F0",
        "light": "#F0F2F2",
        "navy": "#2E4A70",
        "blue": "#D1E9FF",
        "black": "#161C2D",
        "blue-sky": "#73C7E3",
      }
    },
  },
  plugins: [],
}

