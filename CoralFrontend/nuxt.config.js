import colors from "vuetify/es5/util/colors";

export default {
  mode: "spa",
  server: {
    host: "app.coralcrm.test"
  },
  /*
   ** Headers of the page
   */
  head: {
    titleTemplate: "%s - " + process.env.npm_package_name,
    title: process.env.npm_package_name || "",
    meta: [
      { charset: "utf-8" },
      { name: "viewport", content: "width=device-width, initial-scale=1" },
      {
        hid: "description",
        name: "description",
        content: process.env.npm_package_description || ""
      }
    ],
    link: [{ rel: "icon", type: "image/x-icon", href: "/favicon.ico" }]
  },
  /*
   ** Customize the progress-bar color
   */
  loading: { color: "#fff" },
  /*
   ** Global CSS
   */
  css: [],
  /*
   ** Plugins to load before mounting the App
   */
  plugins: ["~/plugins/vuetify", "~/plugins/fragment"],
  /*
   ** Nuxt.js dev-modules
   */
  buildModules: ["@nuxtjs/vuetify"],
  /*
   ** Nuxt.js modules
   */
  modules: [
    // Doc: https://axios.nuxtjs.org/usage
    "@nuxtjs/axios",
    "@nuxtjs/auth"
  ],
  /*
   ** Axios module configuration
   ** See https://axios.nuxtjs.org/options
   */
  axios: {
    baseURL: "http://coralcrm.test:8080/api",
    credentials: true
  },
  auth: {
    redirect: {
      login: "/login",
      logout: "/login",
      callback: "/login",
      home: "/"
    },
    strategies: {
      local: {
        endpoints: {
          login: { url: 'login', method: 'post', propertyName: 'token' },
          user: { url: 'user', method: 'get', propertyName: false },
          logout: { url: 'logout', method: 'post' },
        },
      },
      tokenRequired: false,
        tokenType: false
    }
  },
  /*
   ** vuetify module configuration
   ** https://github.com/nuxt-community/vuetify-module
   */
  vuetify: {
    customVariables: ["~/assets/variables.scss"],
    theme: {
      dark: false,
      options: {
        customProperties: true
   },
      themes:
      {
        dark: {
          primary: '#1E88E5',
          accent: '#00897B',
          secondary: '#00ACC1',
          success: '#9CCC65',
          info: '#FDD835',
          warning: '#F4511E',
          error: '#B71C1C'
        },
        light: {
          primary: '#00838F',
          accent: '#00796B',
          secondary: '#1976D2',
          success: '#66BB6A',
          info: '#FDD835',
          warning: '#FF7043',
          error: '#B71C1C'
        }
      }
    }
  },
  /*
   ** Build configuration
   */
  build: {
    standalone: true,
    /*
     ** You can extend webpack config here
     */
    extend(config, ctx) {}
  }
};
