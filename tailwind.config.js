/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    container: {
      center: true,
      padding: "1.5rem",
      screens: {
        sm: "600px",
        md: "728px",
        lg: "984px",
        xl: "1220px",
        "2xl": "1220px",
      },
    },

    extend: {
      colors: {
        brand: {
          50:  "#fff1f2",
          500: "#f43f5e",
          600: "#e11d48",
        },
      },
      boxShadow: {
        card:  "0 10px 25px rgba(0,0,0,.08)",
        cardlg:"0 18px 40px rgba(10,20,30,.10)",
      },
    },
  },

  plugins: [
    require("@tailwindcss/forms"),
    require("@tailwindcss/typography"),
    require("@tailwindcss/line-clamp"),
  ],
}
