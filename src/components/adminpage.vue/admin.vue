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
          <v-divider></v-divider>
          <!-- Dashboard -->
          <v-list-item prepend-icon="mdi-view-dashboard" title="Dashboard" value="dashboard"></v-list-item>

          <!-- Users -->
          <v-list-item prepend-icon="mdi-account-group-outline" title="Users" value="users"></v-list-item>

          <!-- Categories Section -->
          <v-divider></v-divider>
          <v-list-item-group>
            <v-list-item prepend-icon="mdi-format-list-bulleted" title="Categories" value="categories"></v-list-item>

            <!-- Add Category -->
            <v-list-item prepend-icon="mdi-plus-circle" title="Add Category" value="addCategory"></v-list-item>

            <!-- Manage Category -->
            <v-list-item prepend-icon="mdi-pencil" title="Manage Category" value="manageCategory"></v-list-item>

            <!-- Sub Categories Section -->
            <v-divider></v-divider>
            <v-list-item-group>
              <v-list-item prepend-icon="mdi-subdirectory-arrow-right" title="Sub Categories" value="subCategories"></v-list-item>

              <!-- Add Subcategory -->
              <v-list-item prepend-icon="mdi-plus-circle" title="Add Subcategory" value="addSubcategory"></v-list-item>

              <!-- Manage Subcategory -->
              <v-list-item prepend-icon="mdi-pencil" title="Manage Subcategory" value="manageSubcategory"></v-list-item>
            </v-list-item-group>
          </v-list-item-group>

            <!-- Post -->
            <v-divider></v-divider>
          <v-list-item-group>
            <v-list-item prepend-icon="mdi-file-document-outline" title="Post" value="post"></v-list-item>

            <!-- Add Posts -->
            <v-list-item prepend-icon="mdi-plus-circle" title="Add Posts" value="addPosts"></v-list-item>

            <!-- Manage Posts -->
            <v-list-item prepend-icon="mdi-pencil" title="Manage Posts" value="managePosts"></v-list-item>

            <!-- Trash Posts -->
            <v-list-item prepend-icon="mdi-delete" title="Trash Posts" value="trashPosts"></v-list-item>
          </v-list-item-group>

          <!-- Pages -->
          <v-divider></v-divider>
          <v-list-item-group>
            <v-list-item prepend-icon="mdi-file-multiple-outline" title="Pages" value="pages"></v-list-item>

            <!-- About Us -->
            <v-list-item prepend-icon="mdi-information" title="About Us" value="aboutUs"></v-list-item>

            <!-- Contact Us -->
            <v-list-item prepend-icon="mdi-email" title="Contact Us" value="contactUs"></v-list-item>
          </v-list-item-group>


          <!-- Comments Section -->
          <v-divider></v-divider>
          <v-list-item-group>
            <v-list-item prepend-icon="mdi-comment-multiple-outline" title="Comments" value="comments"></v-list-item>

            <!-- Waiting for Approval -->
            <v-list-item prepend-icon="mdi-clock-outline" title="Waiting for Approval" value="waitingApproval"></v-list-item>

            <!-- Approved Comments -->
            <v-list-item prepend-icon="mdi-check-circle-outline" title="Approved Comments" value="approvedComments"></v-list-item>
          </v-list-item-group>

          <!-- News Section -->
          <v-divider></v-divider>
            <v-list-item-group v-model="selectedItem">
              <v-list-item @click="selectItem('news')" prepend-icon="mdi-newspaper-variant-outline" title="News" value="news">
              </v-list-item>
              <v-list-item v-if="selectedItem === 'news'">
                <v-list-item-content>
                  <v-list-item @click="selectItem('addNews')" prepend-icon="mdi-plus-circle" title="Add News" value="addNews">
                  </v-list-item>
                  <v-list-item @click="selectItem('editNews')" prepend-icon="mdi-pencil" title="Edit News" value="editNews">
                  </v-list-item>
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

      <!-- Navigation Bar -->
      <v-app-bar app color="transparent" dark>
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
        <div class="background-container"></div>
      </v-app-bar>

      <v-main style="height: 600px"></v-main>
    </v-layout>

    <!-- Main Content -->
    
    <v-main>
      <v-main>
      <quill-editor
        v-model="editorContent"
        :options="editorOptions"
        style="min-height: 400px;"
      ></quill-editor>
    </v-main>
      </v-main>

  </v-card>
</template>

<style>
.background-container {
  position:fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-image: url('@/assets/background.jpg');
  background-size: cover;
  z-index: -1;
}
</style>

<script>
export default {
  data() {
    return {
      drawer: true,
      rail: true,
      selectedItem: null,
    };
  },
  methods: {
    toggleItem(item) {
      if (this.selectedItem === item) {
        // If News is clicked again, toggle visibility
        this.selectedItem = null;
      } else {
        this.selectedItem = item;
      }
    },
    selectItem(item) {
      this.selectedItem = item;
    },
  },
};
</script>


