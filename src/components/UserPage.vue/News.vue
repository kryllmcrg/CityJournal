<template>
    <v-app>
        <v-app-bar app dark color="white">
      <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
      <v-img src="@/assets/logocalapan.png" alt="Logo" max-height="40" max-width="160"></v-img>
      <v-toolbar-title>{{ capitalize(value) }}</v-toolbar-title>
  
        <!-- Subscribe Notification Button -->
        <v-btn icon @click="subscribe">
          <v-icon>mdi-bell</v-icon>
          <v-badge content="subscribed" color="red" overlap>
            <template v-slot:badge>
              <v-icon>mdi-check</v-icon>
            </template>
          </v-badge>
          <span class="hidden-md-and-up">Subscribe</span>
        </v-btn>
      </v-app-bar>
  
      <!-- Main Content -->
      <v-main class="main-content">
        <v-container fluid>

          <!-- News Cards -->
          <v-row>
            <!-- Existing News Card -->
            <v-col xs="12" sm="8" md="8" lg="8">
              <v-card class="news-card" @click="navigateToFullStory('Latest News')">
                <v-card-title class="headline">Latest News</v-card-title>
                <v-card-text class="article-text">
                  Lorem ipsum dolor sit amet, adipiscing elit. Proin ac justo nec urna porttitor vestibulum.
                </v-card-text>
                <v-card-actions>
                  <v-btn class="news-btn" @click="navigateToFullStory('Latest News')">Read More</v-btn>
                </v-card-actions>
              </v-card>
            </v-col>
  
            <!-- New News Card -->
            <v-col xs="12" sm="4" md="4" lg="4">
              <v-card class="news-card" @click="navigateToFullStory('New News')">
                <v-card-title class="headline">New News</v-card-title>
                <v-card-text class="article-text">
                  New content goes here.
                </v-card-text>
                <v-card-actions>
                  <v-btn class="news-btn" @click="navigateToFullStory('New News')">Read More</v-btn>
                </v-card-actions>
              </v-card>
            </v-col>
          </v-row>
            
          <!-- Featured Articles -->
          <v-row> 
            <v-col md="4" lg="4">
              <v-list class="all-blogs">
                <v-list-item-group>
                  <v-list-item v-for="blog in blogs" :key="blog.title">
                    <v-list-item-avatar>
                      <v-img src="http://placehold.it/200x100"></v-img>
                    </v-list-item-avatar>
                    <v-list-item-content>
                      <v-list-item-title>{{ blog.title }}</v-list-item-title>
                      <v-list-item-subtitle class="author">{{ blog.author }}</v-list-item-subtitle>
                    </v-list-item-content>
                  </v-list-item>
                </v-list-item-group>
              </v-list>
            </v-col>
            <v-col md="4" lg="4">
              <v-list class="all-blogs">
                <v-list-item-group>
                  <v-list-item v-for="blog in blogs" :key="blog.title">
                    <v-list-item-avatar>
                      <v-img src="http://placehold.it/200x100"></v-img>
                    </v-list-item-avatar>
                    <v-list-item-content>
                      <v-list-item-title>{{ blog.title }}</v-list-item-title>
                      <v-list-item-subtitle class="author">{{ blog.author }}</v-list-item-subtitle>
                    </v-list-item-content>
                  </v-list-item>
                </v-list-item-group>
              </v-list>
            </v-col>
            <v-col md="4" lg="4">
              <v-list class="all-blogs">
                <v-list-item-group>
                  <v-list-item v-for="blog in blogs" :key="blog.title">
                    <v-list-item-avatar>
                      <v-img src="http://placehold.it/200x100"></v-img>
                    </v-list-item-avatar>
                    <v-list-item-content>
                      <v-list-item-title>{{ blog.title }}</v-list-item-title>
                      <v-list-item-subtitle class="author">{{ blog.author }}</v-list-item-subtitle>
                    </v-list-item-content>
                  </v-list-item>
                </v-list-item-group>
              </v-list>
            </v-col>
          </v-row>
  
          <!-- News Cards -->
          <v-row>
            <!-- Existing News Card -->
            <v-col xs="12" sm="8" md="8" lg="8">
              <v-card class="news-card" @click="navigateToFullStory('Latest News')">
                <v-card-title class="headline">Latest News</v-card-title>
                <v-card-text class="article-text">
                  Lorem ipsum dolor sit amet, adipiscing elit. Proin ac justo nec urna porttitor vestibulum.
                </v-card-text>
                <v-card-actions>
                  <v-btn class="news-btn" @click="navigateToFullStory('Latest News')">Read More</v-btn>
                </v-card-actions>
              </v-card>
            </v-col>
  
            <!-- New News Card -->
            <v-col xs="12" sm="4" md="4" lg="4">
              <v-card class="news-card" @click="navigateToFullStory('New News')">
                <v-card-title class="headline">New News</v-card-title>
                <v-card-text class="article-text">
                  New content goes here.
                </v-card-text>
                <v-card-actions>
                  <v-btn class="news-btn" @click="navigateToFullStory('New News')">Read More</v-btn>
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
  
  <script>
  export default {
    name: 'App',
    data() {
      return {
        value: 'home',
        color: 'deep-purple darken-4',
        drawer: false,
        navItems: [
          { text: 'Home', to: '/home', icon: 'mdi-home' },
          { text: 'About', to: '/about', icon: 'mdi-information' },
          { text: 'Contact', to: '/contact', icon: 'mdi-email' },
          { text: 'News', to: '/news', icon: 'mdi-newspaper' },
        ],
        fname: '',
        lname: '',
        email: '',
        phone: '',
        message: '',
        blogs: [
          { title: 'Latest Google Updates', author: 'Mike Smith' },
          { title: 'Newest bootstrap version', author: 'Dave Hesler' },
        ],
      };
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
      share() {
        // Your share logic
      },
      navigateToFullStory(title) {
        // Handle navigation to the full story based on the provided title
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
      cursor: pointer;
      margin-bottom: 20px;
    }
  
    .news-card:hover {
      transform: scale(1.05);
    }
  
    .article-text {
      line-height: 1.6;
      color: #666;
    }
  
    .news-btn {
      color: #007BFF;
      font-weight: bold;
    }
  
    .news-btn:hover {
      color: #0056b3;
    }
  
    /* Adjust the z-index and position of the bottom navigation */
    .v-bottom-navigation {
      z-index: 100; /* Ensure it appears above other elements */
      position: fixed;
      bottom: 0;
      left: 0;
      right: 0;
    }
  
    .main-content {
      min-width: 200px; /* Set your desired minimum width here */
    }
  
    .feature {
      width: 100%;
    }
  
    .author {
      font-style: italic;
      line-height: 1.3;
      color: #aab6aa;
    }
  
    .blog-stripe .block-title {
      background: black;
      color: white;
      height: 100px;
      padding-top: 20px;
    }
  
    .all-blogs .v-list-item {
      border-bottom: 1px solid #CCCCCC;
    }
  
    .pb-cmnt-container {
      font-family: 'Lato', sans-serif;
      margin-top: 100px;
      max-width: 120%; /* Adjust the max-width as needed */
    }
  
    .pb-cmnt-textarea {
      resize: none;
      padding: 20px;
      height: 130px;
      width: 100%; /* Adjust the width as needed */
      border: 1px solid #F2F2F2;
      margin-bottom: 16px;
    }
  
    .pb-cmnt-textfield {
      width: 100%; /* Adjust the width as needed */
    }
  </style>
  