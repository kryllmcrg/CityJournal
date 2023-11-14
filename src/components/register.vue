<template>
  <v-container>
    <!-- Navbar with Logo -->
    <v-row align="center">
      <v-col cols="12">
        <v-app-bar app color="primary" dark>
          <v-toolbar-title>
            <v-img src="your-logo-url" alt="Logo" max-height="40"></v-img>
          </v-toolbar-title>
          <v-spacer></v-spacer>
          <v-btn color="primary" text to="/login">
            Login
          </v-btn>
        </v-app-bar>
      </v-col>
    </v-row>

    <!-- Registration Form -->
    <v-row justify="center" align="center">
      <v-col cols="12" sm="10" md="10" lg="5">
        <v-card>
          <v-card-title class="headline">
            Register
          </v-card-title>

          <v-card-text>
            <v-form ref="registerForm" @submit.prevent="register">
              <v-text-field v-model="username" label="Username" required></v-text-field>
              <v-text-field v-model="email" label="Email" required></v-text-field>
              <v-text-field
                v-model="password"
                label="Password"
                :type="passwordVisible ? 'text' : 'password'"
                :append-icon="passwordVisible ? 'mdi-eye-off' : 'mdi-eye'"
                @click:append="togglePasswordVisibility"
                required
              ></v-text-field>
              <v-text-field
                v-model="confirm_password"
                label="Confirm Password"
                :type="confirmPasswordVisible ? 'text' : 'password'"
                :append-icon="confirmPasswordVisible ? 'mdi-eye-off' : 'mdi-eye'"
                @click:append="toggleConfirmPasswordVisibility"
                required
              ></v-text-field>
              <v-btn type="submit" color="primary" class="mr-4">
                Register
              </v-btn>
            </v-form>

            <v-row justify="center" class="mt-4">
              <router-link to="/login" class="link">
                Login
              </router-link>
            </v-row>

            <v-divider class="mt-4"></v-divider>

            <v-row justify="center" class="mt-4">
              <v-btn icon @click="registerWith('facebook')">
                <v-icon color="blue darken-4">mdi-facebook</v-icon>
              </v-btn>
              <v-btn icon @click="registerWith('google')">
                <v-icon color="red">mdi-google</v-icon>
              </v-btn>
              <v-btn icon @click="registerWith('instagram')">
                <v-icon color="purple">mdi-instagram</v-icon>
              </v-btn>
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
  name: 'Register',
  data() {
    return {
      username: '',
      email:'',
      password: '',
      confirm_password: '',
      passwordVisible: false,
      confirmPasswordVisible: false,
    };
  },
  methods: {
    async register() {
      try {
        console.log('Username:', this.username);
        console.log('Email:', this.email);
        console.log('Password:', this.password);

        const response = await axios.post('/register', {
          username: this.username,
          email: this.email,
          password: this.password,
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

    togglePasswordVisibility() {
      this.passwordVisible = !this.passwordVisible;
    },

    toggleConfirmPasswordVisibility() {
      this.confirmPasswordVisible = !this.confirmPasswordVisible;
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
  color: #2196F3; /* Vuetify primary color */
}

.link {
  color: #2196F3; /* Vuetify primary color */
  text-decoration: none;
  cursor: pointer;
}

/* Add space below the buttons */
.mt-4 {
  margin-top: 1rem;
}
</style>
