<template>
  <div class="d-flex align-center justify-center" style="height: 100vh">
    <v-sheet width="400" class="mx-auto">
      <v-form @submit.prevent="register">
        <v-text-field
          variant="outlined"
          v-model="username"
          label="Username"
        ></v-text-field>

        <v-text-field variant="outlined" v-model="email" label="Email"></v-text-field>

        <v-text-field
          variant="outlined"
          v-model="password"
          label="Password"
          :type="passwordVisible ? 'text' : 'password'"
          :append-icon="passwordVisible ? 'mdi-eye' : 'mdi-eye-off'"
          @click:append="togglePasswordVisibility"
        ></v-text-field>

        <v-text-field
          variant="outlined"
          v-model="confirmPassword"
          label="Confirm Password"
          :type="confirmPasswordVisible ? 'text' : 'password'"
          :append-icon="confirmPasswordVisible ? 'mdi-eye' : 'mdi-eye-off'"
          @click:append="toggleConfirmPasswordVisibility"
        ></v-text-field>

        <v-btn type="submit" color="primary" block class="mt-2">
          Register
        </v-btn>
      </v-form>

      <div class="mt-2">
        <p class="text-body-2">
          Already have an account? <a href="/login">Sign In</a>
        </p>
      </div>
    </v-sheet>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'Register',
  data() {
    return {
      username: '',
      email: '',
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

        const response = await axios.post(
          '/register',
          {
            username: this.username,
            email: this.email,
            password: this.password,
            confirm_password: this.confirm_password,
          },
          {
            headers: {
              'Content-Type': 'application/json',
            },
          }
        );

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
