<template>
  <v-app>
    <!-- App Bar -->
    <v-app-bar app dark color="deep-purple darken-4">
      <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
      <v-toolbar-title>{{ capitalize(value) }}</v-toolbar-title>
    </v-app-bar>

    <!-- Main Content -->
    <v-main>
      <v-container>
        <v-row>
          <v-col cols="12">
            <v-card class="news-card" @click="navigateToFullStory">
              <v-card-title class="headline">Latest News</v-card-title>
              <v-card-text class="article-text">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ac justo nec urna porttitor
                vestibulum.
              </v-card-text>
              <v-card-actions>
                <v-btn class="news-btn" @click="navigateToFullStory">Read More</v-btn>
              </v-card-actions>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </v-main>

    <!-- Bottom Navigation -->
    <v-bottom-navigation v-model="value" app color="purple darken-3" dark>
      <v-btn v-for="item in navItems" :key="item.text" :to="item.to" value="Home" height="100%" :color="color">
        <span>{{ item.text }}</span>
        <v-icon style="margin: 0 4px;">{{ item.icon }}</v-icon>
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


    <!-- Navigation Drawer -->
    <v-navigation-drawer app v-model="drawer" color="white" dark>
      <v-list>
        <v-list-item v-for="item in navItems" :key="item.text" :to="item.to" link>
          <v-list-item-action>
            <v-icon>{{ item.icon }}</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>{{ item.text }}</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>
  </v-app>
</template>

<!-- ... (unchanged) ... -->


<script>
export default {
  name: 'App',
  data() {
    return {
      value: 'home',
      color: 'deep-purple darken-4',
      drawer: false,
      navItems: [
        { text: 'Home', to: '/', icon: 'mdi-home' },
        { text: 'About', to: '/about', icon: 'mdi-information' },
        { text: 'Contact', to: '/contact', icon: 'mdi-email' },
        { text: 'News', to: '/news', icon: 'mdi-newspaper' },
      ],
      fname: '',
      lname: '',
      email: '',
      phone: '',
      message: '',
    };
  },
  methods: {
    capitalize(str) {
      return str.charAt(0).toUpperCase() + str.slice(1);
    },
    login() {
      // Your login logic
    },
    logout() {
      // Your logout logic
    },
    submitForm() {
      // Handle form submission logic here
    },
    navigateToFullStory() {
      // Handle navigation to the full story
    },
  },
};
</script>

<style>
  .header {
    color: #36A0FF;
    font-size: 27px;
    padding: 10px;
  }

  .bigicon {
    font-size: 35px;
    color: #36A0FF;
  }

  .headline {
    font-size: 1.5rem;
    color: #333;
    margin-bottom: 10px;
  }

  .news-card {
    box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease-in-out;
  }

  .news-card:hover {
    transform: scale(1.05);
  }

  .article-text {
    line-height: 1.6;
    color: #666;
  }

  .news-btn,
  .article-btn {
    color: #007BFF;
  }

  .news-btn:hover,
  .article-btn:hover {
    color: #0056b3;
  }

  .sidebar-card {
    box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease-in-out;
    cursor: pointer;
    margin-bottom: 16px;
    display: flex;
    align-items: center; /* Center items vertically */
    justify-content: center; /* Center items horizontally */
  }

  .sidebar-card:hover {
    transform: scale(1.05);
  }

  .sidebar-btn {
    color: #007BFF;
    font-size: 16px;
    text-align: center; /* Center text */
  }

  .sidebar-btn:hover {
    color: #0056b3;
  }s

  /* Adjust the z-index and position of the bottom navigation */
  .v-bottom-navigation {
    z-index: 100; /* Ensure it appears above other elements */
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
  }
</style>

