<template>
  <v-app>
    <v-container fluid fill-height>
      <v-row align="center" justify="center">
        <v-col cols="12" sm="8" md="6">
          <v-card elevation="2">
            <v-card-title class="headline text-center">Login</v-card-title>
            <v-card-text>
              <v-form @submit.prevent="login">
                <v-text-field v-model="Email" label="Email" outlined></v-text-field>

                <v-text-field
                  v-model="Password"
                  :append-icon="passwordVisible ? 'mdi-eye' : 'mdi-eye-off'"
                  :type="passwordVisible ? 'text' : 'Password'"
                  label="Password"
                  outlined
                  @click:append="togglePasswordVisibility"
                ></v-text-field>

                <v-btn type="submit" color="primary" block class="mt-4">Sign in</v-btn>
              </v-form>

              <v-row class="mt-3">
                <v-col>
                  <a href="#" class="link" @click.prevent="forgotPassword">Forgot Password?</a>
                </v-col>
                <v-col class="text-right">
                  <p class="text-body-2">Don't have an account? <a href="/register">Sign Up</a></p>
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
import 'material-design-icons-iconfont/dist/material-design-icons.css';
import axios from 'axios';
import { jwtDecode as jwt_decode } from 'jwt-decode';

export default {
  name: 'Login',
  data() {
    return {
      Email: '',
      Password: '',
      passwordVisible: false,
    };
  },
  methods: {
    async login() {
      try {
        console.log('Email:', this.Email);
        console.log('Password:', this.Password);

        const response = await axios.post('/login', {
          Email: this.Email,
          Password: this.Password,
        }, {
          headers: {
            'Content-Type': 'application/json',
          },
        });

        console.log('Response:', response.data);

        // Decode the JWT token
        const decodedToken = jwt_decode(response.data.token);
        const role = decodedToken.aud;

        console.log('Role:', role);

        // Store the token in sessionStorage
        sessionStorage.setItem('token', response.data.token);

        // Redirect based on the user role
        switch (role) {
          case 'User':
            this.$router.push({ name: 'User' });
            break;
          case 'Admin':
            this.$router.push({ name: 'Admin' });
            break;
          case 'Staff':
            this.$router.push({ name: 'Staff' });
            break;
          default:
            this.$router.push('/login');
        }

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
  color: #2196F3; /* Vuetify primary color */
  font-size: 24px;
}

.link {
  color: #2196F3; /* Vuetify primary color */
  text-decoration: none;
  cursor: pointer;
}

.text-body-2 {
  font-size: 14px;
}

.card {
  max-width: 400px;
  margin: auto;
}

</style>
