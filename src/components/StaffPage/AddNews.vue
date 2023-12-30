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

         <!-- Team -->
         <v-list-item-group v-model="selectedItem">
            <v-list-item @click="selectItem('staff')" prepend-icon="mdi-format-list-bulleted" title="Staff" value="staff"></v-list-item>

            <!-- Add Category -->
            <v-list-item v-if="selectedItem === 'staff'">
              <v-list-item-content>
                <router-link to= "/viewRole">
                <v-list-item @click="selectItem('role')" prepend-icon="mdi-plus-circle" title="View Role" value="role"></v-list-item>
              </router-link>
              </v-list-item-content>
            </v-list-item>
          </v-list-item-group>
        
        <!-- News Section -->
        <v-divider></v-divider>
        <v-list-item-group v-model="selectedItem">
          <v-list-item @click="selectItem('news')" prepend-icon="mdi-newspaper-variant-outline" title="News" value="news"></v-list-item>
          <v-list-item v-if="selectedItem === 'news'">
            <v-list-item-content>
              <router-link to="/addnews">
                <v-list-item @click="selectItem('addNews')" prepend-icon="mdi-plus-circle" title="Add News" value="addNews"></v-list-item>
              </router-link>
              <router-link to="/managenews">
              <v-list-item @click="selectItem('manageNews')" prepend-icon="mdi-pencil" title="Manage News" value="manageNews"></v-list-item>
            </router-link>
            </v-list-item-content>
          </v-list-item>
        </v-list-item-group>

        <!-- Categories Section -->
        <v-divider></v-divider>
        <v-list-item-group v-model="selectedItem">
          <v-list-item @click="selectItem('categories')" prepend-icon="mdi-format-list-bulleted" title="Categories" value="categories"></v-list-item>
        
        </v-list-item-group>  
          <!-- Add Category -->
          <v-list-item-group v-if="selectedItem === 'categories'">
            <v-list-item-content>
              <router-link to="/category">
                <v-list-item @click="selectItem('addCategory')" prepend-icon="mdi-plus-circle" title="Add Category" value="addCategory"></v-list-item>
              </router-link>

              <router-link to="/managecategory">
                <v-list-item @click="selectItem('manageCategory')" prepend-icon="mdi-pencil" title="Manage Category" value="manageCategory"></v-list-item>
              </router-link>
            </v-list-item-content>
        </v-list-item-group>  

          <!-- Sub Categories Section -->
          <v-divider></v-divider>
            <v-list-item v-if="selectedItem === 'categories'">
              <v-list-item-group v-model="selectedSubItem">
                  <v-list-item @click="selectSubItem('subCategories')" prepend-icon="mdi-subdirectory-arrow-right" title="Sub Categories" value="subCategories"></v-list-item>

                <!-- Add Subcategory -->
                <v-list-item v-if="selectedSubItem === 'subCategories'">
                  <v-list-item-content>
                    <router-link to="/addsubcategory">
                      <v-list-item @click="selectSubItem('addSubcategory')" prepend-icon="mdi-plus-circle" title="Add Subcategory" value="addSubcategory"></v-list-item>
                    </router-link>
                    <router-link to="/managesubcategory">
                      <v-list-item @click="selectSubItem('manageSubcategory')" prepend-icon="mdi-pencil" title="Manage Subcategory" value="manageSubcategory"></v-list-item>
                    </router-link>
                  </v-list-item-content>
                </v-list-item>
              </v-list-item-group>
            </v-list-item>

        <!-- Other Admin-related Sections -->
        <v-divider></v-divider>
        <v-list-item-group>
          <!-- Reviews -->
          <v-list-item href="/reviewStaff"  prepend-icon="mdi-star-outline" title="Reviews" value="reviews"></v-list-item>

          <!-- Collaboration -->
          <v-list-item href="/collabStaff" prepend-icon="mdi-account-multiple-outline" title="Collaboration" value="collaboration"></v-list-item>

          <!-- Log Out -->
          <v-list-item href="/logoutStaff" prepend-icon="mdi-logout" title="Log Out" value="logOut"></v-list-item>


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
        <v-form @submit.prevent="addNews">
          <v-card>
            <v-card-title class="headline">Create News</v-card-title>
            <v-card-text>
              <v-row>
                <!-- Left Side (Title and Category) -->
                <v-col cols="12" md="6">
                  <!-- Title -->
                  <v-text-field v-model="Title" label="Title" required></v-text-field>
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <!-- Category -->
                  <v-select v-model="Category" :items="categories" label="Category" required></v-select>
                </v-col>

                <!-- Right Side (Author and Image Upload) -->
                <v-col cols="12" md="6">
                  <!-- Author -->
                  <v-text-field v-model="Author" label="Author" required></v-text-field>

                  <!-- Image Upload -->
                  <div>
                    <v-img
                      class="mb-3"
                      :aspect-ratio="1"
                      :src="
                        ($refs.FileInput &&
                          $refs.FileInput.getObjectURL(selectedFile[0])) ||
                        require('@/assets/default_images.jpg')
                      "
                      height="150"
                    ></v-img>
                    <FileUpload
                      v-model="selectedFile"
                      @update:value="selectedFile = $event"
                      ref="FileInput"
                    />
                  </div>
                </v-col>
              </v-row>
                <editor
                  api-key="no-api-key"
                  :init="{
                    height: 300,
                    menubar: false,
                    plugins: [
                      'a11ychecker','advlist','advcode','advtable','autolink','checklist','export',
                      'lists','link','image','charmap','preview','anchor','searchreplace','visualblocks',
                      'powerpaste','fullscreen','formatpainter','insertdatetime','media','table','help','wordcount'
                    ],
                    toolbar:
                      'undo redo | casechange blocks | bold italic backcolor | \
                      alignleft aligncenter alignright alignjustify | \
                      bullist numlst checklist outdent indent | removeformat | a11ycheck code table help'
                  }"
                  initial-value=""
                  v-model="Content"
                />

                <v-row>
                  <!-- Left Side (PublishDate) -->
                  <v-col cols="12" md="6">
                    <v-text-field v-model="PublishDate" label="Publish Date" type="date" class="mt-5"></v-text-field>
                  </v-col>

                  <!-- Right Side (UpdatedDate) -->
                  <v-col cols="12" md="6">
                    <v-text-field v-model="UpdatedDate" label="Updated Date" type="date" class="mt-5"></v-text-field>
                  </v-col>
                </v-row>

            </v-card-text>
            <v-card-actions>
              <!-- Save News Button -->
              <v-btn type="submit" color="primary">Save News</v-btn>
              
            </v-card-actions>
          </v-card>
        </v-form>
      </v-container>
    </v-main>

    <v-footer app class="footer">
      <v-spacer></v-spacer>
      <div class="text-center">
        <span>&copy; CIO 2023</span>
      </div>
    </v-footer>
  </v-card>
</template>

<script>
import FileUpload from '@/components/FileUpload.vue'
import Editor from '@tinymce/tinymce-vue'
import axios from 'axios';

export default {
  components: {
    Editor,
    FileUpload
  },
  data() {
    return {
      drawer: true,
      rail: true,
      selectedItem: null,
      showMessage: false,
      Title: '',    
      Author: '',   
      Category: null,
      ImageURL: null,
      Content: '',
      PublishDate: new Date().toISOString().substr(0,10),
      categories: ['Government', 'Politics', 'Education', 'Health', 'Environment', 'Economy', 'Business', 'Fashion', 'Entertainment', 'Sport'],
      selectedFile: '',
    };
  },
  methods: {
    getObjectURL(file) {
            if (file) {
                return URL.createObjectURL(file);
            }
            return null;
        },
    async addNews() {
      try {
        console.log('Title:', this.Title);    
        console.log('Author:', this.Author);  
        console.log('Category:', this.Category);
        console.log('ImageURL:', this.ImageURL);
        console.log('Content:', this.Content);

        const formData = new FormData();
        formData.append('Title', this.Title);
        formData.append('Author', this.Author);
        formData.append('Category', this.Category);
        formData.append('ImageURL',this.selectedFile[0],this.selectedFile[0].name)
        formData.append('Content', this.Content);
        formData.append('PublishDate', this.PublishDate);

        const response = await axios.post('/add',formData,{
          headers: {'Content-Type': 'multipart/form-data'}
        })

        console.log(response);

      } catch (error) {
        console.error('Error:', error);
        // Handle error and show appropriate message to the user
      }
    },
    toggleItem(item) {
      // ... (your existing toggleItem method)
    },
    selectItem(item) {
      this.selectedItem = item;
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
    background-color: #673ab7;
    color: #ffffff;
    padding: 10px;
    position: fixed;
    bottom: 0;
    width: 100%;
  }
  .v-snackbar {
    right: 16px;
    top: 16px;
    max-width: 300px;
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
  width: 100%;
  height: 300px;
}
  </style>