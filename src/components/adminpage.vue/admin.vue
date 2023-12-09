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
    <v-main class="main-content">
      <v-container fluid>
        
      </v-container>
    </v-main>

    <v-container fluid>
      <v-row>
        <!-- Widgets/Statistics -->
        <v-col cols="12" md="4">
          <v-card class="dashboard-widget">
            <v-card-title>Total News</v-card-title>
            <v-card-subtitle>{{ totalNews }}</v-card-subtitle>
          </v-card>
        </v-col>

        <v-col cols="12" md="4">
          <v-card class="dashboard-widget">
            <v-card-title>Published News</v-card-title>
            <v-card-subtitle>{{ publishedNews }}</v-card-subtitle>
          </v-card>
        </v-col>

        <v-col cols="12" md="4">
          <v-card class="dashboard-widget">
            <v-card-title>Pending Approval</v-card-title>
            <v-card-subtitle>{{ pendingApproval }}</v-card-subtitle>
          </v-card>
        </v-col>
      </v-row>

    </v-container>

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
      showMessage: false,
    };
  },
  methods: {
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

.dashboard-widget {
  height: 150px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  background-color: #ffffff;
  border-radius: 8px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  margin: 10px;
  transition: transform 0.3s ease-in-out;
}

.dashboard-widget:hover {
  transform: scale(1.05);
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

