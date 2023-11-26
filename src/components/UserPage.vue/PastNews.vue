<template>
  <v-app>
    <v-app-bar
      :color="color"
      app
      dark
    >
      <v-toolbar-title>
        {{ capitalize(value) }}
      </v-toolbar-title>
    </v-app-bar>
    <v-main>
      <v-container>
        Lorem ipsum dolor sit amet consectetur adipisicing
        elit. Quis blanditiis beatae praesentium repudiandae
        sunt officiis, vero maxime officia obcaecati nisi
        excepturi. Sit laboriosam provident laborum? Rem
        recusandae ea possimus illo.
      </v-container>
    </v-main>
    <v-bottom-navigation v-model="value" app :background-color="color" dark>
      <v-btn value="Home" height="100%" :color="color">
        <span>Home</span>
        <v-icon style="margin: 0 4px;">mdi-home</v-icon>
      </v-btn>

      <v-btn value="About" height="100%" :color="color">
        <span>About</span>
        <v-icon style="margin: 0 4px;">mdi-information</v-icon>
      </v-btn>

      <v-btn value="Contact" height="100%" :color="color">
        <span>Contact Us</span>
        <v-icon style="margin: 0 4px;">mdi-email</v-icon>
      </v-btn>

      <v-btn v-if="!isLoggedIn" value="Login" height="100%" :color="color" @click="login">
        <span>Login</span>
        <v-icon style="margin: 0 4px;">mdi-login</v-icon>
      </v-btn>

      <v-btn v-if="isLoggedIn" value="Logout" height="100%" :color="color" @click="logout">
        <span>Logout</span>
        <v-icon style="margin: 0 4px;">mdi-logout</v-icon>
      </v-btn>
    </v-bottom-navigation>
  </v-app>
</template>

<script>
export default {
  name: 'App',
  data: () => ({
    value: 'home',
    color: '#F3E5F5',
  }),
  methods: {
    capitalize(str) {
      return str.charAt(0).toUpperCase() + str.slice(1);
    },
  },
};
</script>
