<template>
  <div class="d-flex align-center justify-center" style="height: 100vh">
      <v-sheet width="400" class="mx-auto">
          <v-form fast-fail @submit.prevent="login">
              <v-text-field variant="outlined" v-model="username" label="Username"></v-text-field>

              <v-text-field variant="outlined" v-model="password" label="Password"></v-text-field>
              <a href="#" class="text-body-2 font-weight-regular">Forgot Password?</a>

              <v-btn type="submit" color="primary" block class="mt-2">Sign in</v-btn>

          </v-form>
          <div class="mt-2">
              <p class="text-body-2">Don't have an account? <a href="/register">Sign Up</a></p>
          </div>
      </v-sheet>
  </div>
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
  color: #2196F3; /* Vuetify primary color */
}

.link {
  color: #2196F3; /* Vuetify primary color */
  text-decoration: none;
  cursor: pointer;
}

.separator {
  margin: 0 10px;
}
</style>
