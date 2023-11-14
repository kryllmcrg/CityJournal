<template>
  <v-container class="container">
    <v-row align="center">
      <v-col cols="12">
        <v-app-bar app color="#673ab7" dark>
          <v-toolbar-title>
            <v-img src="your-logo-url" alt="Logo" max-height="40"></v-img>
          </v-toolbar-title>
        </v-app-bar>
      </v-col>
    </v-row>

    <!-- Main Content -->
    <v-row justify="center">
      <v-col cols="12" sm="10" md="8" lg="6">
        <v-card elevation="12">
          <v-card-title class="headline">
            Login
          </v-card-title>

          <v-card-text>
            <v-form ref="loginForm" @submit.prevent="login">
              <v-text-field v-model="username" label="Username" outlined required></v-text-field>
              <v-text-field
                v-model="password"
                label="Password"
                :type="passwordVisible ? 'text' : 'password'"
                :append-icon="passwordVisible ? 'mdi-eye' : 'mdi-eye-off'"
                @click:append="togglePasswordVisibility"
                outlined
                required
              ></v-text-field>
              <v-btn type="submit" color="#673ab7" class="mr-4">
                Login
              </v-btn>
            </v-form>

            <v-row justify="center" class="mt-4">
              <router-link to="/register" class="link">
                Register
              </router-link>

              <span class="separator">|</span>

              <a href="#" @click.prevent="forgotPassword" class="link">
                Forgot Password
              </a>
            </v-row>
          </v-card-text>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import axios from 'axios';

export default {
  name: 'Login',
  data() {
    return {
      username: '',
      password: '',
      passwordVisible: false,
    };
  },
  methods: {
    async login() {
      try {
        console.log('Username:', this.username);
        console.log('Password:', this.password);

        const response = await axios.post('/login', {
          username: this.username,
          password: this.password,
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

    togglePasswordVisibility() {
      this.passwordVisible = !this.passwordVisible;
    },

    forgotPassword() {
      // Handle the logic for forgot password
      console.log('Forgot Password clicked');
    },
  },
};
</script>

<style scoped>
.headline {
  text-align: center;
  color: #673ab7; /* Vuetify primary color */
}

.link {
  color: #673ab7; /* Vuetify primary color */
  text-decoration: none;
  cursor: pointer;
}

.separator {
  margin: 0 10px;
}

.container {
  background-image: url('@/assets/bglogin.jpg');
  background-size: cover;
  background-position: center;
<<<<<<< Updated upstream
  height: 100vh; /* Set the height based on your design */
  align-items: center;
  justify-content: center;
=======
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
}

.v-card {
  background-color: #ffffff; /* Card background color */
  border-radius: 10px;
  padding: 20px;
}

.v-btn {
  border-radius: 5px;
>>>>>>> Stashed changes
}
</style>
