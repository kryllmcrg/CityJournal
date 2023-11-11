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
          <v-list-item prepend-icon="mdi-home-city" title="Home" value="home"></v-list-item>
          <v-list-item prepend-icon="mdi-account" title="My Account" value="account"></v-list-item>
          <v-list-item prepend-icon="mdi-account-group-outline" title="Users" value="users"></v-list-item>

          <!-- News Section -->
          <v-divider></v-divider>
          <v-list-item-group>
            <v-list-item
              prepend-icon="mdi-newspaper-variant-outline"
              title="News"
              value="news"
            >
              <v-list-item-icon>
                <v-icon>mdi-newspaper-variant-outline</v-icon>
              </v-list-item-icon>
              <v-list-item-content>
                <v-list-item-title>Manage News Articles</v-list-item-title>
              </v-list-item-content>
            </v-list-item>

            <v-list-item prepend-icon="mdi-plus-circle" title="Add News" value="addNews"></v-list-item>
            <v-list-item prepend-icon="mdi-pencil" title="Edit News" value="editNews"></v-list-item>
          </v-list-item-group>

          <!-- Other Admin-related Sections -->
          <v-divider></v-divider>
          <v-list-item-group>
            <v-list-item
              prepend-icon="mdi-comment-multiple-outline"
              title="Comments"
              value="comments"
            >
              <v-list-item-icon>
                <v-icon>mdi-comment-multiple-outline</v-icon>
              </v-list-item-icon>
            </v-list-item>

            <v-list-item
              prepend-icon="mdi-chart-line"
              title="Analytics"
              value="analytics"
            >
              <v-list-item-icon>
                <v-icon>mdi-chart-line</v-icon>
              </v-list-item-icon>
            </v-list-item>

            <!-- Add more sections/items as needed -->
          </v-list-item-group>
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

      <v-main style="height: 250px"></v-main>
    </v-layout>
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
