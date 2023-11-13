<template>
    <v-card>
      <v-layout>
        <v-navigation-drawer
          v-model="drawer"
          :rail="rail"
          permanent
          @click="rail = false"
        >
          <!-- User Profile Section -->
          <v-list-item-group>
            <!-- Logo -->
            <v-avatar>
              <v-img src="" alt="Logo"></v-img>
            </v-avatar>
            <v-list-item
              prepend-avatar="https://randomuser.me/api/portraits/men/85.jpg"
              title="Karylle Macaraig"
              nav
            >
              <template v-slot:append>
                <v-btn
                  variant="text"
                  icon="mdi-chevron-left"
                  @click.stop="rail = !rail"
                ></v-btn>
              </template>
            </v-list-item>
          </v-list-item-group>
  
          <!-- Navigation Section -->
          <v-list dense nav>
            <!-- ... (your existing code) ... -->
          </v-list>
        </v-navigation-drawer>
  
        <!-- Navigation Bar -->
        <v-app-bar app color="primary" dark>
          <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
          <v-toolbar-title>CiO</v-toolbar-title>
  
          <!-- Add more buttons/icons as needed -->
          <v-spacer></v-spacer>
          <v-btn icon>
            <v-icon>mdi-bell</v-icon>
          </v-btn>
          <v-btn icon>
            <v-icon>mdi-email</v-icon>
          </v-btn>
        </v-app-bar>
  
        <v-main style="height: 600px"></v-main>
      </v-layout>
  
      <!-- Main Content -->
      <v-main>
        <quill-editor
          v-model="editorContent"
          :options="editorOptions"
          style="min-height: 400px;"
        ></quill-editor>
      </v-main>
    </v-card>
  </template>
  
  <script>
  // Import the Quill component
  import { quillEditor } from 'vue-quill-editor';
  
  export default {
    components: {
      quillEditor, // Register the Quill component
    },
    data() {
      return {
        drawer: true,
        rail: true,
        editorContent: '', // Add a data property to store the content of the Wysiwyg editor
        editorOptions: {
          // Quill options (customize as needed)
          placeholder: 'Type something...',
          theme: 'snow', // or 'bubble' for a bubble theme
        },
      };
    },
  };
  </script>
  