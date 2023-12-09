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
        <v-row align="center" justify="center">
          <!-- Registration Form Column -->
          <v-col cols="12" sm="5" md="4">
            <v-card elevation="2">
              <v-card-title class="headline text-center">Register Form</v-card-title>
              <v-card-text>
                <v-form @submit.prevent="register">
                  <!-- First Name -->
                  <v-text-field
                    v-model="FirstName"
                    label="First Name"
                    outlined
                  ></v-text-field>

                  <!-- Last Name -->
                  <v-text-field
                    v-model="LastName"
                    label="Last Name"
                    outlined
                  ></v-text-field>

                  <!-- Username -->
                  <v-text-field
                    v-model="Username"
                    label="Username"
                    outlined
                  ></v-text-field>

                  <!-- Email -->
                  <v-text-field
                    v-model="Email"
                    label="Email"
                    outlined
                  ></v-text-field>

                  <!-- Role Dropdown -->
                  <v-select
                    v-model="Role"
                    :items="['Admin', 'User', 'Staff']"
                    label="Role"
                    outlined
                  ></v-select>

                  <!-- Password -->
                  <v-text-field
                    v-model="Password"
                    :append-icon="passwordVisible ? 'mdi-eye' : 'mdi-eye-off'"
                    :type="passwordVisible ? 'text' : 'password'"
                    label="Password"
                    outlined
                    @click:append="togglePasswordVisibility"
                  ></v-text-field>

                  <!-- Confirm Password -->
                  <v-text-field
                    v-model="confirm_password"
                    :append-icon="confirmPasswordVisible ? 'mdi-eye' : 'mdi-eye-off'"
                    :type="confirmPasswordVisible ? 'text' : 'password'"
                    label="Confirm Password"
                    outlined
                    @click:append="toggleConfirmPasswordVisibility"
                  ></v-text-field>

                  <!-- Register Button -->
                  <v-btn type="submit" color="primary" block class="mt-4">Register</v-btn>
                </v-form>

                <!-- Sign In Link -->
                <v-row class="mt-2">
                  <v-col>
                    <p class="text-body-2">Already have an account? <router-link to="/login">Sign In</router-link></p>
                  </v-col>
                </v-row>
              </v-card-text>
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
      isLoggedIn: false,
      products: [
        // Your product data here
      ],
      commentForm: {
        name: '',
        email: '',
        comment: '',
      },
      isMobile: false,
      FirstName: '',
      LastName: '', 
      Username: '',
      Email: '',
      Role: '', 
      Password: '',
      confirm_password: '',    
      passwordVisible: false,
      confirmPasswordVisible: false,
    };
  },
  created() {
    this.checkMobile();
    window.addEventListener('resize', this.checkMobile);
  },
  methods: {
    capitalize(str) {
      if (str === undefined || str === null) {
        return '';
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
    submitComment() {
      console.log('Comment submitted:', this.commentForm);
      // Handle comment submission logic here
      // You can implement an API call or other actions here
    },
    checkMobile() {
      this.isMobile = window.innerWidth <= 768;
    },
    togglePasswordVisibility() {
      this.passwordVisible = !this.passwordVisible;
    },
    toggleConfirmPasswordVisibility() {
      this.confirmPasswordVisible = !this.confirmPasswordVisible;
    },
    forgotPassword() {
      console.log('Forgot Password clicked');
      // Handle the logic for forgot password
    },
    async register() {
      try {
        console.log('First Name:', this.FirstName); 
        console.log('Last Name:', this.LastName);  
        console.log('Username:', this.Username);
        console.log('Email:', this.Email);
        console.log('Role:', this.Role);
        console.log('Password:', this.Password);
        console.log('Confirm Password:', this.confirm_password);           

        const response = await axios.post('/register', {
          FirstName: this.FirstName,
          LastName: this.LastName,  
          Username: this.Username,
          Email: this.Email,
          Role: this.Role,
          Password: this.Password,
          confirm_password: this.confirm_password,
        }, {
          headers: {
            'Content-Type': 'application/json',
          },
        });

        console.log('Response:', response.data);
      } catch (error) {
        console.error('Error:', error);
      }
    },
  },
  beforeDestroy() {
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
    padding-top: 20px; /* Adjust as needed based on your design */
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
