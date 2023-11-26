<template>
  <v-app>
    <v-container fluid fill-height>
      <v-row align="center" justify="center">
        <v-col cols="12" sm="8" md="6">
          <v-card elevation="2">
            <v-card-title class="headline text-center">Register</v-card-title>
            <v-card-text>
              <v-form @submit.prevent="register">

                <v-text-field v-model="FirstName" label="First Name" outlined></v-text-field>

                <v-text-field v-model="LastName" label="Last Name" outlined></v-text-field>

                <v-text-field v-model="Username" label="Username" outlined></v-text-field>

                <v-text-field v-model="Email" label="Email" outlined></v-text-field>

                <!-- Role Dropdown -->
                <v-select
                  v-model="Role"
                  :items="['Admin', 'User', 'Staff']"
                  label="Role"
                  outlined
                ></v-select>

                <v-text-field
                  v-model="Password"
                  :append-icon="passwordVisible ? 'mdi-eye' : 'mdi-eye-off'"
                  :type="passwordVisible ? 'text' : 'password'"
                  label="Password"
                  outlined
                  @click:append="togglePasswordVisibility"
                ></v-text-field>

                <v-text-field
                  v-model="confirm_password"
                  :append-icon="confirmPasswordVisible ? 'mdi-eye' : 'mdi-eye-off'"
                  :type="confirmPasswordVisible ? 'text' : 'password'"
                  label="Confirm Password"
                  outlined
                  @click:append="toggleConfirmPasswordVisibility"
                ></v-text-field>

                <v-btn type="submit" color="primary" block class="mt-4">Register</v-btn>
              </v-form>

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
  </v-app>
</template>

<script>
import axios from 'axios';

export default {
  name: 'Register',
  data() {
    return {
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
  methods: {
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
  color: #2196F3; /* Vuetify primary color */
  font-size: 24px;
}

.text-body-2 {
  font-size: 14px;
}

/* Add space below the buttons */
.mt-4 {
  margin-top: 1rem;
}

/* Style the router link */
a {
  color: #2196F3;
  text-decoration: none;
  cursor: pointer;
}

a:hover {
  text-decoration: underline;
}
</style>
