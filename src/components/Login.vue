<template>
   <v-container>
     <!-- Navbar with Logo -->
     <v-row>
       <v-col cols="12">
         <v-app-bar app color="primary" dark>
           <v-toolbar-title>
             <v-img src="your-logo-url" alt="Logo" max-height="40"></v-img>
           </v-toolbar-title>
         </v-app-bar>
       </v-col>
     </v-row>
 
     <!-- Main Content -->
     <v-row justify="center" align="center">
       <v-col cols="12" sm="10" md="10" lg="5">
         <v-card>
           <v-card-title class="headline">
             Login
           </v-card-title>
 
           <v-card-text>
             <v-form ref="loginForm" @submit.prevent="login">
               <v-text-field v-model="username" label="Username" required></v-text-field>
 
               <v-text-field v-model="password" label="Password" type="password" required></v-text-field>
 
               <v-btn type="submit" color="primary" class="mr-4">
                 Login
               </v-btn>
             </v-form>
 
             <v-row justify="center">
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
  data() {
    return {
      username: '',
      password: '',
    };
  },
  methods: {
    login() {
      // API endpoint URL
      const apiUrl = 'http://localhost:8080/login';

      // Data to be sent in the request
      const requestData = {
        username: this.username,
        password: this.password,
      };

      // Making a POST request to the CodeIgniter API
      axios.post(apiUrl, requestData, {
        headers: {
          'Content-Type': 'application/json',
        },
      })
        .then(response => {
          // Handle the API response here
          console.log('API Response:', response.data);
        })
        .catch(error => {
          // Handle errors here
          console.error('API Error:', error);
        });
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
 