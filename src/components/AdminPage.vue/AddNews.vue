<template>
  <v-card>
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
        <v-divider></v-divider>
        <!-- Dashboard -->
        <v-list-item prepend-icon="mdi-view-dashboard" title="Dashboard" value="dashboard"></v-list-item>

        <!-- Users -->
        <v-list-item prepend-icon="mdi-account-group-outline" title="Users" value="users"></v-list-item>

        <!-- News Section -->
        <v-divider></v-divider>
        <v-list-item-group v-model="selectedItem">
          <v-list-item @click="selectItem('news')" prepend-icon="mdi-newspaper-variant-outline" title="News" value="news"></v-list-item>
          <v-list-item v-if="selectedItem === 'news'">
            <v-list-item-content>
              <router-link to="/addnews">
                <v-list-item @click="selectItem('addNews')" prepend-icon="mdi-plus-circle" title="Add News" value="addNews"></v-list-item>
              </router-link>
              <v-list-item @click="selectItem('editNews')" prepend-icon="mdi-pencil" title="Edit News" value="editNews"></v-list-item>
            </v-list-item-content>
          </v-list-item>
        </v-list-item-group>

        <!-- Categories Section -->
        <v-divider></v-divider>
        <v-list-item-group v-model="selectedItem">
          <v-list-item @click="selectItem('categories')" prepend-icon="mdi-format-list-bulleted" title="Categories" value="categories"></v-list-item>

          <!-- Add Category -->
          <v-list-item v-if="selectedItem === 'categories'">
            <v-list-item-content>
              <v-list-item @click="selectItem('addCategory')" prepend-icon="mdi-plus-circle" title="Add Category" value="addCategory"></v-list-item>
              <v-list-item @click="selectItem('manageCategory')" prepend-icon="mdi-pencil" title="Manage Category" value="manageCategory"></v-list-item>
            </v-list-item-content>
          </v-list-item>

          <!-- Sub Categories Section -->
          <v-divider></v-divider>
          <v-list-item v-if="selectedItem === 'categories'">
            <v-list-item-group v-model="selectedSubItem">
              <v-list-item @click="selectSubItem('subCategories')" prepend-icon="mdi-subdirectory-arrow-right" title="Sub Categories" value="subCategories"></v-list-item>

              <!-- Add Subcategory -->
              <v-list-item v-if="selectedSubItem === 'subCategories'">
                <v-list-item @click="selectSubItem('addSubcategory')" prepend-icon="mdi-plus-circle" title="Add Subcategory" value="addSubcategory"></v-list-item>
                <v-list-item @click="selectSubItem('manageSubcategory')" prepend-icon="mdi-pencil" title="Manage Subcategory" value="manageSubcategory"></v-list-item>
              </v-list-item>
            </v-list-item-group>
          </v-list-item>
        </v-list-item-group>

        <!-- Post Section -->
        <v-divider></v-divider>
        <v-list-item-group v-model="selectedItem">
          <v-list-item @click="selectItem('post')" prepend-icon="mdi-file-document-outline" title="Post" value="post"></v-list-item>

          <!-- Manage Posts -->
          <v-list-item v-if="selectedItem === 'post'">
            <v-list-item-content>
              <v-list-item @click="selectItem('addPosts')" prepend-icon="mdi-plus-circle" title="Add Posts" value="addPosts"></v-list-item>
              <v-list-item @click="selectItem('managePosts')" prepend-icon="mdi-pencil" title="Manage Posts" value="managePosts"></v-list-item>
              <v-list-item @click="selectItem('trashPosts')" prepend-icon="mdi-delete" title="Trash Posts" value="trashPosts"></v-list-item>
            </v-list-item-content>
          </v-list-item>
        </v-list-item-group>

        <!-- Pages Section -->
        <v-divider></v-divider>
        <v-list-item-group v-model="selectedItem">
          <v-list-item @click="selectItem('pages')" prepend-icon="mdi-file-multiple-outline" title="Pages" value="pages"></v-list-item>

          <!-- About Us -->
          <v-list-item v-if="selectedItem === 'pages'">
            <v-list-item-content>
              <v-list-item @click="selectItem('aboutUs')" prepend-icon="mdi-information" title="About Us" value="aboutUs"></v-list-item>
              <v-list-item @click="selectItem('contactUs')" prepend-icon="mdi-email" title="Contact Us" value="contactUs"></v-list-item>
            </v-list-item-content>
          </v-list-item>
        </v-list-item-group>

        <!-- Comments Section -->
        <v-divider></v-divider>
        <v-list-item-group v-model="selectedItem">
          <v-list-item @click="selectItem('comments')" prepend-icon="mdi-newspaper-variant-outline" title="Comments" value="comments"></v-list-item>
          <v-list-item v-if="selectedItem === 'comments'">
            <v-list-item-content>
              <v-list-item @click="selectItem('waitingApproval')" prepend-icon="mdi-plus-circle" title="Waiting for Approval" value="waitingApproval"></v-list-item>
              <v-list-item @click="selectItem('approvedComments')" prepend-icon="mdi-pencil" title="Approved Comments" value="approvedComments"></v-list-item>
            </v-list-item-content>
          </v-list-item>
        </v-list-item-group>

        <!-- Other Admin-related Sections -->
        <v-divider></v-divider>
        <v-list-item-group>
          <!-- Reviews -->
          <v-list-item prepend-icon="mdi-star-outline" title="Reviews" value="reviews"></v-list-item>

          <!-- Settings -->
          <v-list-item prepend-icon="mdi-cog-outline" title="Settings" value="settings"></v-list-item>

          <!-- Archives -->
          <v-list-item prepend-icon="mdi-archive-outline" title="Archives" value="archives"></v-list-item>

          <!-- Reports -->
          <v-list-item prepend-icon="mdi-file-chart-outline" title="Reports" value="reports"></v-list-item>

          <!-- Collaboration -->
          <v-list-item prepend-icon="mdi-account-multiple-outline" title="Collaboration" value="collaboration"></v-list-item>

          <!-- Add more sections/items as needed -->
        </v-list-item-group>
      </v-list>
    </v-navigation-drawer>

    <v-app-bar app color="transparent" dark>
      <v-app-bar-nav-icon style="color: white" @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
      <v-toolbar-title style="color: white;">City Information Office</v-toolbar-title>

      <!-- Add more buttons/icons as needed -->
      <v-spacer></v-spacer>
      <v-btn icon>
        <v-icon style="color: white;">mdi-bell</v-icon>
      </v-btn>
      <v-btn icon @click="showMessage = !showMessage">
        <v-icon style="color: white;">mdi-email</v-icon>
      </v-btn>
      <div class="background-container"></div>
    </v-app-bar>

    <!-- Message Box -->
    <v-snackbar v-model="showMessage" right>
      <v-btn text @click="showMessage = false">Close</v-btn>
      <!-- Add your message content here -->
      <span>Message content goes here...</span>
    </v-snackbar>

    <v-main>
    <v-container>
      <!-- Wrap the v-form around your form elements -->
      <v-form @submit.prevent="submitNewsForm">
        <v-card>
          <v-card-title class="headline">Add News</v-card-title>
          <v-card-text>
            <!-- Title -->
            <v-text-field v-model="newsTitle" label="Title" required></v-text-field>

            <!-- Category -->
            <v-select v-model="newsCategory" :items="categories" label="Category" required></v-select>

            <!-- Author -->
            <v-text-field v-model="newsAuthor" label="Author" required></v-text-field>

            <!-- Stories of News -->
            <v-textarea v-model="newsStories" label="Stories of News" required></v-textarea>

            <!-- Image Upload -->
            <v-file-input v-model="newsImage" label="Image" accept="image/*" required></v-file-input>
          </v-card-text>
          <v-card-actions>
            <!-- Save News Button -->
            <v-btn type="submit" color="primary" @submit.prevent="submitNewsForm">Save News</v-btn>
          </v-card-actions>
        </v-card>
      </v-form>
    </v-container>
  </v-main>

    <!-- Message Box -->
    <v-snackbar v-model="showMessage" right>
      <v-btn text @click="showMessage = false">Close</v-btn>
      <!-- Add your message content here -->
      <span>Message content goes here...</span>
    </v-snackbar>

    <v-footer app class="footer">
      <v-spacer></v-spacer>
      <div class="text-center">
        <span>&copy; 2023 Your Company</span>
      </div>
    </v-footer>
  </v-card>
</template>

<script >
import 'quill/dist/quill.snow.css';
import VueQuillEditor from 'vue-quill-editor'

export default {
  components: {
    VueQuillEditor,
  },
  data() {
    return {
      drawer: true,
      rail: true,
      selectedItem: null,
      showMessage: false,
      newsTitle: '',
      newsAuthor: '',
      newsCategory: null,
      newsTags: '',
      publicationDate: null,
      newsImage: null,
      newsContent: '',
      categories: ['Category A', 'Category B', 'Category C'],
    };
  },
  methods: {
    toggleItem(item) {
      // ... (your existing toggleItem method)
    },
    selectItem(item) {
      this.selectedItem = item;
    },
    submitNewsForm() {
      // Handle the form submission logic here
      console.log('Form submitted', {
        title: this.newsTitle,
        author: this.newsAuthor,
        category: this.newsCategory,
        image: this.newsImage,
        stories: this.newsStories,
        // ... (your existing data properties) ...
    });
  },
  },
};
</script>

  
  <style>
  .background-container {
    position:fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: #673ab7;
    color: #ffffff;
    background-size: cover;
    z-index: -1;
    margin-bottom: 50%;
  }
  
  .footer {
    background-color: #673ab7; /* Background color of the footer */
    color: #ffffff; /* Text color in the footer */
    padding: 10px; /* Adjust padding as needed */
    position: fixed;
    bottom: 0;
    width: 100%;
  }
  .v-snackbar {
    right: 16px; /* Adjust the distance from the right side */
    top: 16px; /* Adjust the distance from the top */
    max-width: 300px; /* Adjust the maximum width of the message box */
  }
  .v-list-item:hover {
    background-color: #9575cd;
    color: #ffffff; 
  }
  
  .v-list-item-group:hover .v-list-item {
    background-color: #9575cd; 
    color: #ffffff; 
  }
  .quill-editor-container {
  width: 100%; /* Set the desired width */
  height: 300px; /* Set the desired height */
}
  </style>