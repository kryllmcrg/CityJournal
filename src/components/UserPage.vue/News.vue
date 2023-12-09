<template>
  <v-app>
    <v-app-bar app dark>
      <v-app-bar-nav-icon v-if="isMobile" @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
  <v-img src="@/assets/logocalapan.png" alt="Logo" max-height="40" max-width="160"></v-img>
  <v-toolbar-title>{{ capitalize() }}</v-toolbar-title>
  
  <!-- Buttons for Home, About, Contact, and News -->
  <v-btn to="/" text>Home</v-btn>
  <v-btn to="/about" text>About</v-btn>
  <v-btn to="/contact" text>Contact</v-btn>
  <v-btn to="/news" text>News</v-btn>

  <!-- Add a Login button -->
  <v-btn v-if="!isLoggedIn" to="/login" text>Login</v-btn>

  <!-- You can also add a Logout button if user is logged in -->
  <v-btn v-if="isLoggedIn" @click="logout" text>Logout</v-btn>

  <!-- Subscribe Notification Button -->
  <v-btn icon @click="subscribe">
    <v-icon>mdi-bell</v-icon>
    <v-badge content="subscribed" color="red" overlap>
      <template v-slot:badge>
        <v-icon>mdi-check</v-icon>
      </template>
    </v-badge>
    <span class="hidden-md-and-up"></span>
  </v-btn>
    </v-app-bar>

     <!-- Main Content -->
     <v-main class="main-content">
      <v-container fluid>
        <!-- Display Blog Posts -->
        <v-row>
          <v-col v-for="post in articleNews" :key="post._id" cols="12" md="6" lg="4">
            <v-card class="featured-card">
              <v-card-title>{{ post.Title }}</v-card-title>
              <v-card-text>{{ post.Content }}</v-card-text>
              <v-card-text>{{ post.Category }}</v-card-text>
              <v-card-subtitle>{{ post.Author }}</v-card-subtitle>
              <v-img :src="post.ImageURL" alt="Post Image"></v-img>
              <v-card-text>{{ post.PublishDate }}</v-card-text>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </v-main>
    
    <v-navigation-drawer app v-model="drawer" class="drawer-background fixed-sidebar">
        <!-- Logo Section -->
        <v-row justify="center" align="center" class="my-3 text-center">
          <v-img src="@/assets/loggo.png" alt="Logo" max-height="100"></v-img>
        </v-row>

        <!-- Navigation List -->
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

    <!-- Footer Section -->
      <v-footer app dark height="200">
        <v-row justify="center">

          <!-- Vision Column -->
          <v-col>
            <v-row>
              <v-col>
                <v-typography class="white--text font-weight-bold">Vision:</v-typography>
              </v-col>
            </v-row>
            <v-row>
              <v-col>
                <v-typography class="white--text font-weight-bold">“A premier Green City with God-loving, economically-empowered, and culture-rich citizens actively participating in good governance and co-existing harmoniously with the environment.”</v-typography>
              </v-col>
            </v-row>
          </v-col>

          <!-- Mission Column -->
          <v-col>
            <v-row>
              <v-col>
                <v-typography class="white--text font-weight-bold">Mission:</v-typography>
              </v-col>
            </v-row>
            <v-row>
              <v-col>
                <v-typography class="white--text font-weight-bold">“The Green City of Calapan shall initiate and sustain programs to create an environment conducive to development and responsive to people’s needs through transparent, accountable and participatory governance.”</v-typography>
              </v-col>
            </v-row>
          </v-col>

          <!-- Get In Touch Column -->
          <v-col>
            <v-typography class="white--text font-weight-bold">
              Get In Touch
            </v-typography>
            
            <!-- Email Row -->
            <v-row>
              <v-col>
                <v-typography class="white--text font-weight-bold">
                  <v-icon>mdi-email</v-icon> lgu.calapancity@gmail.com
                </v-typography>
              </v-col>
            </v-row>

            <!-- Phone Row -->
            <v-row>
              <v-col>
                <v-typography class="white--text font-weight-bold">
                  <v-icon>mdi-phone</v-icon> +63-000-0000-000
                </v-typography>
              </v-col>
            </v-row>

          </v-col>
        </v-row>
      </v-footer>
  </v-app>
</template>

<script>
import axios from 'axios';
export default {
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
      isLoggedIn: false,
      commentForm: {
        name: '',
        email: '',
        comment: '',
      },
      isMobile: false, // Add a variable to track if the device is mobile
    };
  },
  created() {
    this.fetchNewsArticle();
    // Check the window width on component creation
    this.checkMobile();
    // Add an event listener to check the window width on resize
    window.addEventListener('resize', this.checkMobile);
  },
  methods: {
    capitalize(str) {
      if (str === undefined || str === null) {
        return '';  // Return an empty string or handle it as appropriate for your use case
      }
      return str.charAt(0).toUpperCase() + str.slice(1);
    },
    login() {
      // Your login logic
    },
    logout() {
      // Your logout logic
    },
    subscribe() {
      // Your subscribe logic
    },
    async fetchNewsArticle() {
      try {
        const response = await axios.get('/displayPost');
        console.log('API Response:', response.data); // Log the API response
        this.articleNews = response.data;
      } catch (error) {
        console.error('Error fetching news posts:', error);
      }
    },
    // Method to check if the device is mobile based on window width
    checkMobile() {
      this.isMobile = window.innerWidth <= 768; // Adjust the width as needed
    },
  },
  beforeDestroy() {
    // Remove the resize event listener when the component is destroyed
    window.removeEventListener('resize', this.checkMobile);
  },
};
</script>


<style scoped>
 .fixed-sidebar {
    position: fixed;
    top: 0;
    left: 0;
    height: 50%;
  }

 .drawer-background .logo-section {
    background-color: transparent !important;
  }
  .v-app-bar {
    background: url("@/assets/head.png") center center no-repeat;
    background-size: cover;
  }
  .main-container {
    padding-top: 80px; /* Adjust as needed based on your design */
  }
  .main-content {
    padding-top: 60px;
  }

  .v-card {
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }

  .heading {
    border-radius: 6px;
    padding: 48px;
    background-color: #eee;
    margin-bottom: 20px;
  }

  .style_featured {
    padding: 20px 0;
    text-align: center;
  }

  .featured-card {
    padding: 10px;
    border: 1px solid transparent;
    border-radius: 4px;
    transition: 0.5s;
  }

  .featured-card:hover {
    margin-top: 19px;
    border: 1px solid rgb(153, 200, 250);
    box-shadow: rgba(0, 0, 0, 0.1) 0px 9px 9px 9px;
    background: rgba(153, 200, 250, 0.1);
    transition: 0.99s;
  }

  /* Footer Styles */
  .v-footer {
    background: url("@/assets/footer.png");
    background-size: cover;
  }

  /* Adjust the text color and other styles as needed */
  .white--text {
    color: white;
  }
</style>
