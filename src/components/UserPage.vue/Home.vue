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
            <v-col cols="12" md="12">
                <v-card class="pa-5">
                <v-typography class="headline">Welcome to my site!</v-typography>
                <v-divider class="my-3"></v-divider>
                <v-typography>
                    Give a brief introduction as to what this site is about and what sections it has.
                </v-typography>
                </v-card>
            </v-col>
            </v-row>
  
          <v-row>
            <v-col cols="12" md="8">
              <v-card>
                <v-card-title class="panel-heading">What We Do</v-card-title>
                <v-card-text>
                  Founded in 1892 and headquartered in Fairfield, CT, LexisNexis Corporate Affiliations is a technology and financial services company. The company offers products and services ranging from aircraft engines, power generation, water processing, and household appliances, among others. It operates in business segments including Energy Infrastructure, Aviation, Healthcare, Transportation, Home & Business Solutions, and GE Capital. The company also provides medical imaging, business and consumer financing, and industrial products. It has a presence in North America, Europe, Asia, South America, and Africa. According to the company's current 10K government filing, it had FYE 12/31/2011 revenue of $147.3 billion and has 301,000 employees.
                </v-card-text>
              </v-card>
            </v-col>
            <v-col cols="12" md="4">
              <v-card>
                <v-card-title class="panel-heading">Contact Information</v-card-title>
                <v-card-text>
                  <div>LexisNexis Corporate Affiliations</div>
                  <div>121 Chanlon Road,</div>
                  <div>South Building – First Floor,</div>
                  <div>New Providence, NJ 07974</div>
                  <div>phone: 800.340.3244</div>
                </v-card-text>
                <v-card-actions class="text-center">
                  <v-btn icon href="#">
                    <v-icon>mdi-phone</v-icon>
                  </v-btn>
                </v-card-actions>
              </v-card>
            </v-col>
          </v-row>
          
          <v-row>
            <v-col cols="12" md="4" v-for="(product, index) in products" :key="index">
              <v-card>
                <v-img :src="product.image" alt="Product Image" style="max-width: 100%;"></v-img>
                <v-card-title>{{ product.title }}</v-card-title>
                <v-card-text>{{ product.description }}</v-card-text>
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
  .main-content {
    padding-top: 60px;
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
  </style>
  