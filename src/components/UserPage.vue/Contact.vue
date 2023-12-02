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
        <v-row justify="center">
          <v-col xs="12" md="8">
            <v-card class="mt-5">
              <v-card-title>
                <h3 class="text-center">Contact us</h3>
                <v-divider></v-divider>
              </v-card-title>
              <v-card-text>
                <v-row>
                  <v-col xs="12" md="6">
                    <v-form class="contact-form">
                      <v-row>
                        <v-col md="4">
                          <v-label for="name">Name</v-label>
                        </v-col>
                        <v-col md="8">
                          <v-text-field id="name" placeholder="Type your name here" outlined></v-text-field>
                        </v-col>

                        <v-col md="4">
                          <v-label for="email">Email</v-label>
                        </v-col>
                        <v-col md="8">
                          <v-text-field id="email" placeholder="Type your email here" outlined></v-text-field>
                        </v-col>

                        <v-col md="4">
                          <v-label for="phone">Phone</v-label>
                        </v-col>
                        <v-col md="8">
                          <v-text-field id="phone" placeholder="Type your phone here" outlined></v-text-field>
                        </v-col>
                      </v-row>
                    </v-form>
                  </v-col>

                  <v-col xs="12" md="6">
                    <v-form>
                      <v-row>
                        <v-col>
                          <v-label>Or you can reach us via</v-label>
                        </v-col>
                      </v-row>
                      <!-- Social Media Buttons -->
                      <v-row class="social-media-buttons" v-if="showSocialMediaButtons">
                        <v-col xs="6" md="3">
                          <v-btn icon>
                            <v-icon size="2x">mdi-facebook</v-icon>
                          </v-btn>
                        </v-col>
                        <v-col xs="6" md="3">
                          <v-btn icon>
                            <v-icon size="2x">mdi-instagram</v-icon>
                          </v-btn>
                        </v-col>
                        <v-col xs="6" md="3">
                          <v-btn icon>
                            <v-icon size="2x">mdi-twitter</v-icon>
                          </v-btn>
                        </v-col>
                        <v-col xs="6" md="3">
                          <v-btn icon>
                            <v-icon size="2x">mdi-google</v-icon>
                          </v-btn>
                        </v-col>
                        <!-- Repeat for other social media icons -->
                      </v-row>
                      <v-row>
                        <v-col>
                          <v-divider></v-divider>
                        </v-col>
                      </v-row>

                      <!-- Contact Information -->
                      <v-row class="contact-info">
                        <v-col>
                          <h4>Bulgaria</h4>
                          <p>91, Lorem Street</p>
                          <p>Entrance A</p>
                          <p>Floor 4</p>
                          <p>Phone: +359-123-345-567</p>
                          <p>E-mail: <a href="mailto:support@shieldui.com">support@shieldui.com</a></p>
                        </v-col>
                      </v-row>
                    </v-form>
                  </v-col>
                </v-row>
              </v-card-text>
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
        isLoggedIn: false,
        products: [
          // Your product data here
        ],
        showSocialMediaButtons: true,
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
    },
  };
  </script>
  
  <style>
  .contact-container {
    background: url("http://www.prepbootstrap.com/Content/images/shared/misc/contact-us.png");
    background-repeat: no-repeat;
    background-size: cover;
    min-height: 100vh;
  }

  .contact-card {
    margin-top: 50px;
  }

  /* Style for the contact form */
  .contact-form {
    max-width: 600px;
    margin: 0 auto;
  }

  /* Style for social media buttons */
  .social-media-buttons {
    margin-top: 20px;
    text-align: center;
  }

  .social-media-buttons v-btn {
    margin: 0 8px;
  }

  /* Style for the contact information */
  .contact-info {
    text-align: center;
    margin-top: 20px;
  }

  .contact-info h4 {
    color: #673ab7; /* Deep purple color */
  }

  .contact-info p {
    margin: 5px 0;
  }
</style>

  