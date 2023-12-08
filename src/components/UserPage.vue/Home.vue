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
          <v-row justify="center">
            <v-col cols="12" md="12">
              <v-card class="pa-5">
                <div class="container">
                  <v-typography class="headline violet-text">
                    <strong>CALAPAN CITY OFFICIAL WEBSITE</strong>
                  </v-typography>
                  <v-typography class="violet-text">
                    <strong>TAUMABAYAN AND MASUSUNOD
                      SA TAPAT AT MAPAGKALINGANG PAGLILINGKOD</strong>
                  </v-typography>
                </div>
                <v-col cols="12">
                  <v-img
                    src="@/assets/calapan.jpg"
                    class="img-fluid rounded"
                    alt="Hospital Image"
                  ></v-img>
                </v-col>
                <v-typography class="violet-text">
                  Calapan, officially the City of Calapan (Filipino: Lungsod ng Calapan), is a 3rd class component city in the province of Oriental Mindoro, Philippines. According to the 2020 census, it has a population of 145,786 people. The city is the capital of the province of Oriental Mindoro.
                  </v-typography>
                  <br>
                  <br>
                  <v-typography class="violet-text">
                    The city serves as the gateway to the Oriental Mindoro province with the implementation of the Strong Republic Nautical Highway (SRNH) an integrated ferry project of then President Gloria Macapagal Arroyo that extends further to the southern part of the Philippines. The Calapan City Seaport is the largest and busiest seaport on Mindoro Island, which is just 45 minutes away by ferry boats and roll-on/roll-off (RORO) ships to-and-fro Batangas City International Seaport.
                  </v-typography>
                  <br>
                  <br>
                  <v-typography class="violet-text">
                  Calapan is one of two cities in the Mimaropa region, the other being Puerto Princesa in Palawan. Calapan serves as the region's administrative center.[5] It is also the center of commerce, industry, transport, communication, religious activities and education in the entire province of Oriental Mindoro.
                </v-typography>
              <v-divider class="my-3"></v-divider>
              </v-card>
            </v-col>
          </v-row>

          <v-row>
            <v-carousel
          delimiter-icon="stop"
          prev-icon="mdi-arrow-left"
          next-icon="mdi-arrow-right"
        >
          <v-carousel-item
            v-for="(item,i) in items"
            :key="i"
            :src="item.src"
          ></v-carousel-item>
        </v-carousel>
          </v-row>

          <v-row>
            <v-col class="text-center">
              <v-heading>Sample Image Gallery</v-heading>
            </v-col>
          </v-row>
          <v-row>
            <v-col v-for="(image, index) in imageList" :key="index" cols="12" sm="6" md="4">
              <v-card class="mb-4">
                <v-img :src="image.src" class="thumbnail" @mouseover="onMouseOver(index)" @mouseout="onMouseOut(index)">
                  <v-hover v-if="hoveredIndex === index">
                    <template v-slot="{ hover }">
                      <v-card color="transparent" :style="{ filter: hover ? 'none' : 'grayscale(1)' }">
                        <v-card-title class="white--text">Image Title</v-card-title>
                      </v-card>
                    </template>
                  </v-hover>
                </v-img>
              </v-card>
            </v-col>
          </v-row>

          <v-row>
            <v-col cols="12" md="4">
              <v-card>
                <v-card-title class="panel-heading">Contact Information</v-card-title>
                <v-card-text>
                  <div>LexisNexis Corporate Affiliations</div>
                  <div>121 Chanlon Road,</div>
                  <div>South Building – First Floor,</div>
                  <div>New Providence, NJ 07974</div>
                  <div>phone: 800.340.3244</div>
                </v-card-text>
                <v-card-actions class="text-center">
                  <v-btn icon href="contact">
                    <v-icon>mdi-phone</v-icon>
                  </v-btn>
                </v-card-actions>
              </v-card>
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
import carousel1 from '@/assets/carousel1.jpg';
import carousel2 from '@/assets/carousel2.jpg';
import carousel3 from '@/assets/carousel3.jpg';

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
      isMobile: false,
      items: [
          {
            src: carousel1,
          },
          {
            src: carousel2,
          },
          {
            src: carousel3,
          },
        ],
      hoveredIndex: null,
      imageList: [
        { src: "http://www.prepbootstrap.com/Content/images/shared/houses/h9.jpg" },
        { src: "http://www.prepbootstrap.com/Content/images/shared/houses/h8.jpg" },
        { src: "http://www.prepbootstrap.com/Content/images/shared/houses/h4.jpg" },
        { src: "http://www.prepbootstrap.com/Content/images/shared/houses/h7.jpg" },
        { src: "http://www.prepbootstrap.com/Content/images/shared/houses/h3.jpg" },
        { src: "http://www.prepbootstrap.com/Content/images/shared/houses/h6.jpg" },
        { src: "http://www.prepbootstrap.com/Content/images/shared/houses/h1.jpg" },
        { src: "http://www.prepbootstrap.com/Content/images/shared/houses/h2.jpg" },
        { src: "http://www.prepbootstrap.com/Content/images/shared/houses/h5.jpg" },
      ],
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
    onMouseOver(index) {
      this.hoveredIndex = index;
    },
    onMouseOut() {
      this.hoveredIndex = null;
    },
  },
  beforeDestroy() {
    // Remove the resize event listener when the component is destroyed
    window.removeEventListener('resize', this.checkMobile);
  },
};
</script>


<style scoped>
.thumbnail {
  width: 100%;
  height: auto;
}
 .container {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
  }
  .violet-text {
    color: rgb(81, 13, 171);
    font-style: italic; /* You can change this to your desired font style */
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
    padding-top: 20px; /* Adjust as needed based on your design */
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
