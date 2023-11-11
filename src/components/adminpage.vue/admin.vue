<template>
  <v-app>
    <!-- Navbar with Hamburger Menu -->
    <v-app-bar app color="primary" dark>
      <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
      <v-toolbar-title>Admin Dashboard</v-toolbar-title>
    </v-app-bar>

    <!-- Sidebar (Hamburger Menu) -->
    <v-navigation-drawer v-model="drawer" app>
      <v-list>
        <v-list-item v-for="(item, index) in items" :key="index" link>
          <v-list-item-icon>{{ item.icon }}</v-list-item-icon>
          <v-list-item-content>
            <v-list-item-title>{{ item.text }}</v-list-item-title>
          </v-list-item-content>

          <!-- Add a dropdown menu for the 'Settings' item -->
          <v-menu offset-y>
            <template v-slot:activator="{ on }">
              <v-btn icon v-on="on">
                <v-icon>mdi-dots-vertical</v-icon>
              </v-btn>
            </template>
            <v-list>
              <v-list-item-group v-if="item.text === 'Settings'">
                <v-list-item v-for="(subItem, subIndex) in item.subItems" :key="subIndex" link>
                  <v-list-item-icon>{{ subItem.icon }}</v-list-item-icon>
                  <v-list-item-content>
                    <v-list-item-title>{{ subItem.text }}</v-list-item-title>
                  </v-list-item-content>
                </v-list-item>
              </v-list-item-group>
            </v-list>
          </v-menu>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>

    <!-- Main Content -->
    <v-main>
      <v-container>
        <!-- Your Dashboard Content Goes Here -->
        <v-row>
          <v-col cols="12">
            <v-card>
              <v-card-title>Dashboard Overview</v-card-title>
              <v-card-text>
                Welcome to the admin dashboard!
              </v-card-text>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </v-main>
  </v-app>
</template>

<script>
export default {
  data() {
    return {
      drawer: false,
      items: [
        { text: 'Dashboard', icon: 'mdi-view-dashboard' },
        { text: 'Users', icon: 'mdi-account-group' },
        {
          text: 'Settings',
          icon: 'mdi-settings',
          subItems: [
            { text: 'General', icon: 'mdi-settings-outline' },
            { text: 'Security', icon: 'mdi-shield-check-outline' },
            { text: 'Appearance', icon: 'mdi-palette-outline' },
            // Add more sub-items as needed
          ],
        },
        // Add more items as needed
      ],
    };
  },
};
</script>
