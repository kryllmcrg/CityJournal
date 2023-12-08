<template>
  <v-app>
    <v-app-bar app dark>
      <v-app-bar-nav-icon v-if="isMobile" @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
  <v-img src="@/assets/logocalapan.png" alt="Logo" max-height="40" max-width="160"></v-img>
  <v-toolbar-title>{{ capitalize() }}</v-toolbar-title>
  
  <!-- Buttons for Home, About, Contact, and News -->
  <v-btn to="/" text>Home</v-btn>
  <v-btn to="/about" text>About</v-btn>
  <v-btn to="/contact" text>Contact</v-btn>
  <v-btn to="/news" text>News</v-btn>

  <!-- Add a Login button -->
  <v-btn v-if="!isLoggedIn" to="/login" text>Login</v-btn>

  <!-- You can also add a Logout button if user is logged in -->
  <v-btn v-if="isLoggedIn" @click="logout" text>Logout</v-btn>

  <!-- Subscribe Notification Button -->
  <v-btn icon @click="subscribe">
    <v-icon>mdi-bell</v-icon>
    <v-badge content="subscribed" color="red" overlap>
      <template v-slot:badge>
        <v-icon>mdi-check</v-icon>
      </template>
    </v-badge>
    <span class="hidden-md-and-up"></span>
  </v-btn>
    </v-app-bar>

      <!-- Main Content -->
      <v-main class="main-content">
      <v-container fluid>
        <v-row>
          <v-col cols="12">
            <v-container>
              <v-row>
                <v-col cols="12">
                  <v-img
                    src="@/assets/calapan.jpg"
                    class="img-fluid rounded"
                    alt="Hospital Image"
                  ></v-img>
                </v-col>
                <v-col cols="12">
                  <v-container>
                    <v-row>
                      <v-col cols="12" class="bold-violet-text">
                        <v-heading>Calapan City Journal</v-heading>
                      </v-col>
                      <v-col cols="12" class="bold-violet-text">
                        <v-subheader>CITY INFORMATION OFFICE-CITY HALL, CALAPAN CITY</v-subheader>
                      </v-col>
                      <v-col cols="12">
                        <v-paragraph>
                          Calapan was formerly a small village before the establishment of the first Religious District in Baco. The District convent was transferred to Calapan in 1733 and began its jurisdiction over the Northern Mindoro Ecclesiastical Area.
                        </v-paragraph>
                      </v-col>
                      <v-col cols="12">
                        <v-paragraph>
                          In the early 18th century, the town only occupied a strip of land stretching from Ibaba to Ilaya in a cross-shape facing the present Santo Niño Cathedral and cut off by the river. Later on, succeeding barrios were founded.
                          In 1837, the capital of the province was moved from Puerto Galera to Calapan. When Mindoro became a part of Marinduque on June 13, 1902, the provincial capital was once again moved to Puerto Galera. On November 10, 1902, Mindoro was detached from Marinduque. In 1903, Calapan once again became the provincial capital.
                        </v-paragraph>
                      </v-col>
                      <v-col cols="12">
                        <v-paragraph>
                          When Mindoro was detached from Marinduque on November 10, 1902, Baco, Puerto Galera and San Teodoro were annexed to Calapan in 1905 under Act No. 1280, adding a total area of 843 square kilometres (325 sq mi) of land.  In 1902, under Act No. 2824, the three municipalities gained their independence.
                          In 1919, the boundary dispute between Calapan and Naujan was adjudicated by Presidentes (Mayors) Agustin Quijano of Calapan and Agustin Garong of Naujan over a portion of the territory of what is now known as the present boundary. The portion of agricultural area was awarded to Naujan, thus, making the area of Calapan much smaller as compared to that of Naujan which is now considered as the biggest municipality of the province.
                        </v-paragraph>
                      </v-col>
                    </v-row>
                  </v-container>
                </v-col>
              </v-row>
            </v-container>
          </v-col>
        </v-row>
      </v-container>
    </v-main>

    <v-navigation-drawer app v-model="drawer" class="drawer-background fixed-sidebar">
        <!-- Logo Section -->
        <v-row justify="center" align="center" class="my-3 text-center">
          <v-img src="@/assets/loggo.png" alt="Logo" max-height="100"></v-img>
        </v-row>

        <!-- Navigation List -->
        <v-list>
          <v-list-item v-for="item in navItems" :key="item.text" :to="item.to" link>
            <v-list-item-action>
              <v-icon>{{ item.icon }}</v-icon>
            </v-list-item-action>
            <v-list-item-content>
              <v-list-item-title>{{ item.text }}</v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </v-list>
      </v-navigation-drawer>

    <!-- Footer Section -->
      <v-footer app dark height="200">
        <v-row justify="center">

          <!-- Vision Column -->
          <v-col>
            <v-row>
              <v-col>
                <v-typography class="white--text font-weight-bold">Vision:</v-typography>
              </v-col>
            </v-row>
            <v-row>
              <v-col>
                <v-typography class="white--text font-weight-bold">“A premier Green City with God-loving, economically-empowered, and culture-rich citizens actively participating in good governance and co-existing harmoniously with the environment.”</v-typography>
              </v-col>
            </v-row>
          </v-col>

          <!-- Mission Column -->
          <v-col>
            <v-row>
              <v-col>
                <v-typography class="white--text font-weight-bold">Mission:</v-typography>
              </v-col>
            </v-row>
            <v-row>
              <v-col>
                <v-typography class="white--text font-weight-bold">“The Green City of Calapan shall initiate and sustain programs to create an environment conducive to development and responsive to people’s needs through transparent, accountable and participatory governance.”</v-typography>
              </v-col>
            </v-row>
          </v-col>

          <!-- Get In Touch Column -->
          <v-col>
            <v-typography class="white--text font-weight-bold">
              Get In Touch
            </v-typography>
            
            <!-- Email Row -->
            <v-row>
              <v-col>
                <v-typography class="white--text font-weight-bold">
                  <v-icon>mdi-email</v-icon> lgu.calapancity@gmail.com
                </v-typography>
              </v-col>
            </v-row>

            <!-- Phone Row -->
            <v-row>
              <v-col>
                <v-typography class="white--text font-weight-bold">
                  <v-icon>mdi-phone</v-icon> +63-000-0000-000
                </v-typography>
              </v-col>
            </v-row>

          </v-col>
        </v-row>
      </v-footer>

  </v-app>
</template>

<script>
export default {
  name: 'App',
  data() {
    return {
      value: 'home',
      color: 'deep-purple darken-4',
      drawer: false,
      navItems: [
        { text: 'Home', to: '/', icon: 'mdi-home' },
        { text: 'About', to: '/about', icon: 'mdi-information' },
        { text: 'Contact', to: '/contact', icon: 'mdi-email' },
        { text: 'News', to: '/news', icon: 'mdi-newspaper' },
      ],
      isLoggedIn: false,
      products: [
        // Your product data here
      ],
      commentForm: {
        name: '',
        email: '',
        comment: '',
      },
      isMobile: false, // Add a variable to track if the device is mobile
    };
  },
  created() {
    // Check the window width on component creation
    this.checkMobile();
    // Add an event listener to check the window width on resize
    window.addEventListener('resize', this.checkMobile);
  },
  methods: {
    capitalize(str) {
      if (str === undefined || str === null) {
        return '';  // Return an empty string or handle it as appropriate for your use case
      }
      return str.charAt(0).toUpperCase() + str.slice(1);
    },
    login() {
      // Your login logic
    },
    logout() {
      // Your logout logic
    },
    subscribe() {
      // Your subscribe logic
    },
    submitComment() {
      // Handle comment submission logic here
      console.log('Comment submitted:', this.commentForm);
      // You can implement an API call or other actions here
    },
    // Method to check if the device is mobile based on window width
    checkMobile() {
      this.isMobile = window.innerWidth <= 768; // Adjust the width as needed
    },
  },
  beforeDestroy() {
    // Remove the resize event listener when the component is destroyed
    window.removeEventListener('resize', this.checkMobile);
  },
};
</script>


<style scoped>
  .bold-violet-text {
    font-weight: bold;
    color: rgb(81, 13, 171);
  }
 .fixed-sidebar {
    position: fixed;
    top: 0;
    left: 0;
    height: 50%;
  }

 .drawer-background .logo-section {
    background-color: transparent !important;
  }
  .v-app-bar {
    background: url("@/assets/head.png") center center no-repeat;
    background-size: cover;
  }
  .main-container {
    padding-top: 80px; /* Adjust as needed based on your design */
  }
  .main-content {
    padding-top: 60px;
  }

  .v-card {
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }

  .heading {
    border-radius: 6px;
    padding: 48px;
    background-color: #eee;
    margin-bottom: 20px;
  }

  .style_featured {
    padding: 20px 0;
    text-align: center;
  }

  .featured-card {
    padding: 10px;
    border: 1px solid transparent;
    border-radius: 4px;
    transition: 0.5s;
  }

  .featured-card:hover {
    margin-top: 19px;
    border: 1px solid rgb(153, 200, 250);
    box-shadow: rgba(0, 0, 0, 0.1) 0px 9px 9px 9px;
    background: rgba(153, 200, 250, 0.1);
    transition: 0.99s;
  }

  /* Footer Styles */
  .v-footer {
    background: url("@/assets/footer.png");
    background-size: cover;
  }

  /* Adjust the text color and other styles as needed */
  .white--text {
    color: white;
  }
</style>
