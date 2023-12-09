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
              <v-list-item @click="selectItem('staff')" prepend-icon="mdi-account-group" title="Staff" value="staff"></v-list-item>
  
            <!-- View Role -->
            <v-list-item v-if="selectedItem === 'staff'">
              <v-list-item-content>
                <router-link to="/viewrole">
                  <v-list-item @click="selectItem('role')" prepend-icon="mdi-account-circle" title="View Role" value="role"></v-list-item>
                </router-link>
              </v-list-item-content>
            </v-list-item>
          </v-list-item-group>
  
  
          <!-- News Section -->
            <v-list-item-group v-model="selectedItem">
                <v-list-item @click="selectItem('news')" prepend-icon="mdi-newspaper-variant" title="News" value="news"></v-list-item>
  
              <!--News-->
              <v-list-item v-if="selectedItem === 'news'">
                <v-list-item-content>
                  <router-link to="/status">
                    <v-list-item @click="selectItem('status')" prepend-icon="mdi-alert-octagon" title="Status" value="status"></v-list-item>
                  </router-link>
                </v-list-item-content>
              </v-list-item>
            </v-list-item-group>
  
  
          <!-- Pages Section -->
            <v-divider></v-divider>
            <v-list-item-group v-model="selectedItem">
                <v-list-item @click="selectItem('pages')" prepend-icon="mdi-file-document-multiple" title="Pages" value="pages"></v-list-item>
  
              <!-- About Us -->
              <v-list-item v-if="selectedItem === 'pages'">
                <v-list-item-content>
                  <router-link to="/aboutus">
                    <v-list-item @click="selectItem('aboutUs')" prepend-icon="mdi-information" title="About Us" value="aboutUs"></v-list-item>
                  </router-link>
                  <router-link to="/contactus">
                    <v-list-item @click="selectItem('contactUs')" prepend-icon="mdi-email" title="Contact Us" value="contactUs"></v-list-item>
                  </router-link>
                </v-list-item-content>
              </v-list-item>
            </v-list-item-group>
  
  
          <!-- Comments Section -->
            <v-divider></v-divider>
            <v-list-item-group v-model="selectedItem">
                <v-list-item @click="selectItem('comments')" prepend-icon="mdi-comment-multiple-outline" title="Comments" value="comments"></v-list-item>
              
              <v-list-item v-if="selectedItem === 'comments'">
                <v-list-item-content>
                  <router-link to="/waitingapproval">
                    <v-list-item @click="selectItem('waitingApproval')" prepend-icon="mdi-clock-time-four-outline" title="Waiting for Approval" value="waitingApproval"></v-list-item>
                  </router-link>
                  <router-link to="/approvedcomments">
                    <v-list-item @click="selectItem('approvedComments')" prepend-icon="mdi-check-circle-outline" title="Approved Comments" value="approvedComments"></v-list-item>
                  </router-link>
                </v-list-item-content>
              </v-list-item>
            </v-list-item-group>

          <!-- Other Admin-related Sections -->
          <v-divider></v-divider>
          <v-list-item-group>
            <!-- Reviews -->
          <v-list-item href="/reviews" prepend-icon="mdi-star-outline" title="Reviews" value="reviews"></v-list-item>

          <!-- Settings -->
          <v-list-item href="/settings" prepend-icon="mdi-cog-outline" title="Settings" value="settings"></v-list-item>

          <!-- Archives -->
          <v-list-item href="/status" prepend-icon="mdi-archive-outline" title="Archives" value="archives"></v-list-item>

          <!-- Reports -->
          <v-list-item href="/reports" prepend-icon="mdi-file-chart-outline" title="Reports" value="reports"></v-list-item>

          <!-- Collaboration -->
          <v-list-item href="/collab" prepend-icon="mdi-account-multiple-outline" title="Collaboration" value="collaboration"></v-list-item>

          <!-- Log Out -->
          <v-list-item href="/logout" prepend-icon="mdi-logout" title="Log Out" value="logOut"></v-list-item>
            
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
  
      <!-- Main Content -->
      <v-main style="height: 750px; background-color: #f9f6f2">
        <v-container>
          <v-data-table
          :headers="headers"
          :items="Articles"
          :sort-by="[{ key: 'PublishDate', order: 'asc' }]"
          style="max-width: 100%; height: 90vh; margin: auto;"
        >
    <template v-slot:top>
      <v-toolbar
        flat
      >
        <v-toolbar-title>Manage News</v-toolbar-title>
        <v-dialog
          v-model="dialog"
          max-width="1000px"
        >
          <v-card>
            <v-card-title>
              <span class="text-h5">{{ formTitle }}</span>
            </v-card-title>

            <v-card-text>
              <v-container>
                <v-row>
                  <v-col
                    cols="12"
                    sm="6"
                    md="4"
                  >
                    <v-text-field
                      v-model="editedItem.Title"
                      label="Title"
                    ></v-text-field>
                  </v-col>
                  <v-col
                    cols="12"
                    sm="6"
                    md="4"
                  >
                    <v-text-field
                      v-model="editedItem.Author"
                      label="Author"
                    ></v-text-field>
                  </v-col>
                  <v-col
                    cols="12"
                    sm="6"
                    md="4"
                  >
                  <v-select
                    v-model="editedItem.Category"
                    :items="categoryOptions"
                    label="Category"
                    placeholder="Select a category"
                  ></v-select>

                  </v-col>
                  <v-col
                    cols="12"
                    sm="6"
                    md="4"
                  >
                  <!-- <v-file-input
                    v-model="editedItem.ImageURL"
                    label="Image"
                    placeholder="Select an image"
                    accept="image/*"
                    @change="handleImageUpload"
                  ></v-file-input> -->

                  </v-col>
                  <v-col
                    cols="12"
                    sm="6"
                    md="4"
                  >

                  <v-textarea
                    v-model="editedItem.Content"
                    label="Content"
                    auto-grow
                  ></v-textarea>
                  </v-col>
                  <v-col
                    cols="12"
                    sm="6"
                    md="4"
                  >

                  <v-text-field
                    v-model="editedItem.PublishDate"
                    label="Publish Date"
                    type="date" class="mt-5"
                  ></v-text-field>

                  <v-text-field
                    v-model="editedItem.Status"
                    label="Status"
                  ></v-text-field>

                  </v-col>
                </v-row>
              </v-container>
            </v-card-text>

            <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn
                color="blue-darken-1"
                variant="text"
                @click="close"
              >
                Cancel
              </v-btn>
              <v-btn
                color="blue-darken-1"
                variant="text"
                @click="save"
              >
                Save
              </v-btn>
            </v-card-actions>
          </v-card>
        </v-dialog>
        <v-dialog v-model="dialogDelete" max-width="500px">
          <v-card>
            <v-card-title class="text-h5">Are you sure you want to delete this item?</v-card-title>
            <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn color="blue-darken-1" variant="text" @click="closeDelete">Cancel</v-btn>
              <v-btn color="blue-darken-1" variant="text" @click="deleteItemConfirm">OK</v-btn>
              <v-spacer></v-spacer>
            </v-card-actions>
          </v-card>
        </v-dialog>
      </v-toolbar>
    </template>
    <template v-slot:item.ImageURL="{ item }">
        <v-row>
          <v-img
          :src="item.ImageURL"
          aspect-ratio="1"
          cover
          class="ma-5"
          ></v-img>
        </v-row>
    </template>
    <template v-slot:item.actions="{ item }">
      <!-- <v-icon
        size="small"
        class="me-2"
        @click="editItem(item)"
      >
        mdi-pencil
      </v-icon>
      <v-icon
        size="small"
        @click="deleteItem(item)"
      >
        mdi-delete
      </v-icon> -->
      <v-menu>
            <template v-slot:activator="{ props }">
              <v-btn icon="mdi-dots-vertical" v-bind="props"></v-btn>
            </template>

            <v-list>
              <v-list-item>
                <v-btn @click="handleAction( item, 'Approved')" color="success">Approved</v-btn>
              </v-list-item>
              <v-list-item>
                <v-btn @click="handleAction( item, 'Revise')" color="warning">Revise</v-btn>
              </v-list-item>
              <v-list-item>
                <v-btn @click="handleAction( item, 'Reject')" color="error">Reject</v-btn>
              </v-list-item>
            </v-list>
          </v-menu>
    </template>
    <template v-slot:no-data>
      <v-btn
        color="primary"
        @click="initialize"
      >
        Reset
      </v-btn>
    </template>
  </v-data-table>

  </v-container>
      </v-main>
  
      <v-footer app class="footer">
        <v-spacer></v-spacer>
        <div class="text-center">
          <span>&copy; 2023 Your Company</span>
        </div>
      </v-footer>
    </v-card>
  </template>
  
  <!-- ... (your existing script and style sections) -->
  
  <script>
  import axios from 'axios'
  export default {
    data() {
      return {
        drawer: true,
      rail: true,
      selectedItem: null,
      selectedSubItem: null,
      showMessage: false,

      dialog: false,
      dialogDelete: false,
      headers: [
        {
          title: 'Title',
          align: 'start',
          sortable: false,
          key: 'Title',
        },
        { title: 'Author', key: 'Author' },
        { title: 'Category', key: 'Category' },
        { title: 'Image', key: 'ImageURL', src: 'ImageURL' },
        { title: 'Content', key: 'Content' },
        { title: 'Publish Date', key: 'PublishDate' },
        { title: 'Status', key: 'Status' },
        { title: 'Actions', key: 'actions', sortable: false },
      ],
      Articles: [],
      editedIndex: -1,
      editedItem: {
        ArticleID: '',
        Title: '',
        Author: '' ,
        Category: '',
        ImageURL: '',
        Content: '',
        PublishDate: new Date().toISOString().substr(0,10),
        Status: '',
      },
      defaultItem: {
        ArticleID: '',
        Title: '',
        Author: '' ,
        Category: '',
        ImageURL: '',
        Content: '',
        PublishDate: new Date().toISOString().substr(0,10),
        Status: '',
      },

      categoryOptions: [
        'Government',
        'Politics',
        'Education',
        'Health',
        'Environment',
        'Economy',
        'Business',
        'Fashion',
        'Entertainment',
        'Sport',
      ],
      };
    },
    computed: {
    formTitle() {
      return this.editedIndex === -1 ? 'New Item' : 'Edit Item';
    },
  },
  watch: {
    dialog(val) {
      val || this.close();
    },
    dialogDelete(val) {
      val || this.closeDelete();
    },
  },
  created() {
    this.initialize();
  },
    methods: {
      async handleAction(item, action) {
        try {
          this.editedIndex = this.Articles.indexOf(item);
          this.editedItem = Object.assign({}, item);
          
          const formData = new FormData();
          formData.append('ArticleID', this.editedItem.ArticleID)
          formData.append('Status', action)
          
          const response = await axios.post('changeNewsStatus', formData)
          console.log(response.data);
        } catch (error) {
          console.log(error);
        }
        this.initialize()
      },
      async initialize() {
      const response = await axios.get('/displayNews');

      this.Articles = response.data;
    },
      
      toggleItem(item) {
        if (this.selectedItem === item) {
          // If the same item is clicked again, close the section
          this.selectedItem = null;
        } else {
          // If a different item is clicked, switch to that item
          this.selectedItem = item;
        }
      },
      selectItem(item) {
        this.selectedItem = item;
      },

      editItem(item) {
      this.editedIndex = this.Articles.indexOf(item);
      this.editedItem = Object.assign({}, item);
      this.dialog = true;
    },

    deleteItem(item) {
      this.editedIndex = this.Articles.indexOf(item);
      this.editedItem = Object.assign({}, item);
      this.dialogDelete = true;
    },

    deleteItemConfirm() {
      this.Articles.splice(this.editedIndex, 1);
      this.closeDelete();
    },

    close() {
      this.dialog = false;
      this.$nextTick(() => {
        this.editedItem = Object.assign({}, this.defaultItem);
        this.editedIndex = -1;
      });
    },

    closeDelete() {
      this.dialogDelete = false;
      this.$nextTick(() => {
        this.editedItem = Object.assign({}, this.defaultItem);
        this.editedIndex = -1;
      });
    },

    save() {
      if (this.editedIndex > -1) {
        Object.assign(this.Articles[this.editedIndex], this.editedItem);
      } else {
        this.Articles.push(this.editedItem);
      }
      this.close();
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
  
  </style>
  
  