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
        "linen": "#ffedd2",
        "light": "#F0F2F2",
        "navy": "#2E4A70",
        "blue": "#D1E9FF",
        "black": "#161C2D",
        "blue-sky": "#73C7E3",
          "neon":"#23B0BA",
        "button":"#60a6bd",
      }
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}
