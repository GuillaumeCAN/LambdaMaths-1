export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js",
    'node_modules/preline/dist/*.js',
  ],
  darkMode: 'class',
  theme: {
    colors: {
      primary: '#222328',
      secondary: '#F75757',
      tertiary: '#919194',
      tertiaryLight: '#f6f6f6',
    },
    fontFamily: {
      sans: ['Poppins', 'sans-serif'],
    },
    extend: {},
  },
  plugins: [
    require('flowbite/plugin'),
    require('@tailwindcss/forms'),
    require('preline/plugin'),
  ],
}
