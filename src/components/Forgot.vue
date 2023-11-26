<template>
    <v-app>
      <v-container fluid fill-height class="purple-bg">
        <v-row align="center" justify="center">
          <v-col cols="12" sm="8" md="6">
            <v-card elevation="2" class="forgot-password-card">
              <v-card-title class="headline text-center white--text">Forgot Password</v-card-title>
              <v-card-text>
                <v-form @submit.prevent="sendResetLink">
  
                  <v-text-field v-model="email" label="Email" outlined class="mb-3"></v-text-field>
  
                  <v-btn type="submit" color="primary" block class="mt-4">Send Reset Link</v-btn>
                </v-form>
  
                <v-row class="mt-2">
                  <v-col>
                    <p class="text-body-2">Remembered your password? <router-link to="/login" class="link">Sign In</router-link></p>
                  </v-col>
                </v-row>
              </v-card-text>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </v-app>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    name: 'ForgotPassword',
    data() {
      return {
        email: '',
      };
    },
    methods: {
      async sendResetLink() {
        try {
          const response = await axios.post('/forgot-password', {
            email: this.email,
          }, {
            headers: {
              'Content-Type': 'application/json',
            },
          });
  
          console.log('Response:', response.data);
          // You may want to provide feedback to the user, such as displaying a success message or redirecting to another page.
        } catch (error) {
          console.error('Error:', error);
          // Handle the error, e.g., display an error message to the user.
        }
      },
    },
  };
  </script>
  
  <style scoped>
  
  .white--text {
    color: #ffffff; /* White color */
  }
  
  .forgot-password-card {
    margin-top: 2rem;
  }
  
  .headline {
    color: #2196F3; /* Vuetify primary color */
    font-size: 24px;
  }
  
  .text-body-2 {
    font-size: 14px;
  }
  
  /* Style the router link */
  .link {
    color: #2196F3;
    text-decoration: none;
    cursor: pointer;
  }
  
  .link:hover {
    text-decoration: underline;
  }
  </style>
  