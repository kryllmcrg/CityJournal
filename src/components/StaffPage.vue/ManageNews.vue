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
              <router-link to="/addcategory">
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

        <!-- Post Section -->
        <v-divider></v-divider>
          <v-list-item-group v-model="selectedItem">
              <v-list-item @click="selectItem('post')" prepend-icon="mdi-file-document-outline" title="Post" value="post"></v-list-item>

            <!-- Manage Posts -->
            <v-list-item v-if="selectedItem === 'post'">
              <v-list-item-content>
                <router-link to="/viewposts">
                  <v-list-item @click="selectItem('viewPosts')" prepend-icon="mdi-plus-circle" title="View Posts" value="viewPosts"></v-list-item>
                </router-link>
                <router-link to="/manageposts">
                  <v-list-item @click="selectItem('managePosts')" prepend-icon="mdi-pencil" title="Manage Posts" value="managePosts"></v-list-item>
                </router-link>
                <router-link to="/trashposts">
                  <v-list-item @click="selectItem('trashPosts')" prepend-icon="mdi-delete" title="Trash Posts" value="trashPosts"></v-list-item>
                </router-link>
              </v-list-item-content>
            </v-list-item>
          </v-list-item-group>


        <!-- Other Admin-related Sections -->
        <v-divider></v-divider>
        <v-list-item-group>
          <!-- Reviews -->
          <v-list-item prepend-icon="mdi-star-outline" title="Reviews" value="reviews"></v-list-item>

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

    <!-- Main Content -->
    <v-main style="height: 750px; background-color: #f9f6f2">

      <v-data-table
    :headers="headers"
    :items="desserts"
    :sort-by="[{ key: 'PublishDate', order: 'asc' }]"
    style="max-width: 80%; height: 50vh; margin: auto;"
  >
    <template v-slot:top>
      <v-toolbar
        flat
      >
        <v-toolbar-title>Manage News</v-toolbar-title>
        <v-divider
          class="mx-4"
          inset
          vertical
        ></v-divider>
        <v-spacer></v-spacer>
        <v-dialog
          v-model="dialog"
          max-width="1000px"
        >
          <template v-slot:activator="{ props }">
            <v-btn
              color="primary"
              dark
              class="mb-2"
              v-bind="props"
            >
              New Item
            </v-btn>
          </template>
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
                  <v-file-input
                    v-model="editedItem.ImageURL"
                    label="Image"
                    placeholder="Select an image"
                    accept="image/*"
                    @change="handleImageUpload"
                  ></v-file-input>

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
    <template v-slot:item.actions="{ item }">
      <v-icon
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
      </v-icon>
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
        { title: 'Image', key: 'ImageURL' },
        { title: 'Content', key: 'Content' },
        { title: 'Publish Date', key: 'PublishDate' },
        { title: 'Status', key: 'Status' },
        { title: 'Actions', key: 'actions', sortable: false },
      ],
      desserts: [],
      editedIndex: -1,
      editedItem: {
        Title: '',
        Author: '' ,
        Category: '',
        ImageURL: '',
        Content: '',
        PublishDate: new Date().toISOString().substr(0,10),
        Status: '',
      },
      defaultItem: {
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
    toggleItem(item) {
      if (this.selectedItem == item) {
        this.selectedItem = null;
      } else {
        this.selectedItem = item;
      }
    },
    selectItem(item) {
      this.selectedItem = item;
    },
    selectSubItem(subItem) {
      this.selectedSubItem = subItem;
      // Add your logic here for handling the selection of sub-items
    },

    editItem(item) {
      this.editedIndex = this.desserts.indexOf(item);
      this.editedItem = Object.assign({}, item);
      this.dialog = true;
    },

    deleteItem(item) {
      this.editedIndex = this.desserts.indexOf(item);
      this.editedItem = Object.assign({}, item);
      this.dialogDelete = true;
    },

    deleteItemConfirm() {
      this.desserts.splice(this.editedIndex, 1);
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
        Object.assign(this.desserts[this.editedIndex], this.editedItem);
      } else {
        this.desserts.push(this.editedItem);
      }
      this.close();
    },

    initialize() {
      this.desserts = [
        {
          Title: '',
        Author: '' ,
        Category: '',
        ImageURL: '',
        Content: '',
        PublishDate: '' ,
        Status: '',
        },
        // Add more initial data as needed
      ];
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

