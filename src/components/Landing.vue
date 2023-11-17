<template>
    <v-card>
      <!-- Design outside the navigation drawer -->
      <v-container fluid class="outside-design">
        <v-row justify="center" align="center">
          <!-- Logo or any other content -->
          <v-img src="../assets/logocalapan.png" alt="Logo"></v-img>
        </v-row>
      </v-container>
  
      <!-- Navigation Drawer -->
      <v-navigation-drawer v-model="drawer" :rail="rail" permanent @click="rail = false" class="custom-drawer">
        <!-- Menu Bar -->
        <v-app-bar app>
          <!-- Menu Icon -->
          <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
          <v-toolbar-title>My App</v-toolbar-title>
        </v-app-bar>
  
        <v-list-item-group>
          <!-- List items if needed -->
          <v-list-item v-if="rail">
            <!-- Add your list item content here -->
            <v-avatar>
              <v-img src="../assets/download.png" alt="Menu"></v-img>
            </v-avatar>
          </v-list-item>
  
          <v-list-item>
            <template v-slot:append>
              <v-btn variant="text" icon="mdi-chevron-left" @click.stop="rail = !rail"></v-btn>
            </template>
          </v-list-item>
        </v-list-item-group>
  
        <!-- Your login form content (unchanged) -->
        <v-container fluid fill-height>
          <!-- ... (unchanged) -->
        </v-container>
      </v-navigation-drawer>
    </v-card>
  </template>
  
  <script>
  export default {
    data() {
      return {
        drawer: true,
        rail: true,
      };
    },
  };
  </script>
  
  <style>
  .custom-drawer {
    right: 0;
    width: 400px; /* Adjust the width as per your requirement */
  }
  
  .outside-design {
  height: 200px; /* Set the height as per your requirement */
  background: url('../assets/bglogin.jpg') center/cover; /* Replace 'bglogin.jpg' with your actual background image */
  background-size: 100% 100%; /* Full coverage */
}
  
  .v-list-item:hover {
    background-color: #9575cd;
    color: #ffffff; 
  }
  
  .v-list-item-group:hover .v-list-item {
    background-color: #9575cd; 
    color: #ffffff; 
  }
  </style>
  