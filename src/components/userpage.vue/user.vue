<template>
    <div>
      <v-navigation-drawer
        v-model="drawer"
        app
        temporary
        dark
        src="@/assets/img/bgDrawer.jpg"
      >
        <v-list>
          <v-list-item>
            <v-list-item-avatar>
              <img src="@/assets/img/logo.png" alt="Logo" />
            </v-list-item-avatar>
            <v-list-item-content>
              <v-list-item-title class="title">Calango</v-list-item-title>
              <v-list-item-subtitle>WEB</v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>
        </v-list>
  
        <v-divider />
  
        <v-list dense>
          <v-list-item
            v-for="([icon, text, link], i) in items"
            :key="i"
            link
            @click="$vuetify.goTo(link)"
          >
            <v-list-item-icon class="justify-center">
              <v-icon>{{ icon }}</v-icon>
            </v-list-item-icon>
            <v-list-item-content>
              <v-list-item-title class="subtitile-1">{{
                text
              }}</v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </v-list>
      </v-navigation-drawer>
  
      <v-app-bar
        app
        :color="color"
        :flat="flat"
        dark
        class="px-15"
        :class="{ expand: flat }"
      >
        <v-toolbar-title>
          <v-img src="@/assets/img/logo.png" max-width="50px" />
        </v-toolbar-title>
        <v-spacer />
        <v-app-bar-nav-icon
          @click.stop="drawer = !drawer"
          class="mr-4"
          v-if="isXs"
        />
        <div v-else>
          <v-btn text @click="$vuetify.goTo('#hero')">
            <span class="mr-2">Home</span>
          </v-btn>
          <v-btn text @click="$vuetify.goTo('#features')">
            <span class="mr-2">Sobre</span>
          </v-btn>
          <v-btn text @click="$vuetify.goTo('#download')">
            <span class="mr-2">Download</span>
          </v-btn>
          <v-btn text @click="$vuetify.goTo('#pricing')">
            <span class="mr-2">About</span>
          </v-btn>
          <v-btn rounded outlined text @click="$vuetify.scrollTo('#contact')">
            <span class="mr-2">Contact</span>
          </v-btn>
        </div>
      </v-app-bar>
        <v-btn @click="subscribe">Subscribe</v-btn>

      <!-- Dialog for subscription confirmation -->
      <v-dialog v-model="subscriptionDialog" max-width="400">
        <v-card>
          <v-card-title class="headline">Subscribe Confirmation</v-card-title>
          <v-card-text>
            Do you want to subscribe to our page?
          </v-card-text>
          <v-card-actions>
            <v-btn @click="subscribeConfirmed">Yes</v-btn>
            <v-btn @click="subscriptionDialog = false">No</v-btn>
          </v-card-actions>
        </v-card>
      </v-dialog>
    </div>
  </template>
  
  <style scoped>
  .v-toolbar {
    transition: 0.6s;
  }
  
  .expand {
    height: 80px !important;
    padding-top: 10px;
  }
  </style>
  
  <script>
  export default {
    data: () => ({
      drawer: null,
      isXs: false,
      subscriptionDialog: false,
      items: [
        ["mdi-home-outline", "Home", "#hero"],
        ["mdi-information-outline", "Sobre", "#features"],
        ["mdi-download-box-outline", "Download", "#download"],
        ["mdi-currency-usd", "Preços", "#pricing"],
        ["mdi-email-outline", "Contatos", "#contact"],
      ],
    }),
    props: {
      color: String,
      flat: Boolean,
    },
    methods: {
      onResize() {
        this.isXs = window.innerWidth < 850;
      },
      subscribe() {
        // Show the subscription confirmation dialog
        this.subscriptionDialog = true;
      },

      subscribeConfirmed() {
        // Handle subscription logic here
        // For example, you can show a success message or send a request to your server
        console.log('User subscribed!');
        
        // Close the dialog
        this.subscriptionDialog = false;
      },
    },
  
    watch: {
      isXs(value) {
        if (!value) {
          if (this.drawer) {
            this.drawer = false;
          }
        }
      },
    },
    mounted() {
      this.onResize();
      window.addEventListener("resize", this.onResize, { passive: true });
    },
  };
  </script>