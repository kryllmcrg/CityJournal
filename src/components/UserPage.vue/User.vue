<template>
    <v-container>
      <!-- Page Title -->
      <v-row justify="center">
        <v-col cols="12" md="8">
          <v-card class="elevation-12">
            <v-card-title class="headline primary--text text--darken-1">
              Approved News
            </v-card-title>
          </v-card>
        </v-col>
      </v-row>
  
     <!-- News Cards -->
        <v-row justify="center">
        <v-col v-for="newsItem in approvedNews" :key="newsItem.id" cols="12" md="4">
            <v-card class="news-card">
            <v-img :src="newsItem.image" height="200px"></v-img>
            <v-card-title>{{ newsItem.title }}</v-card-title>
            <v-card-subtitle>{{ newsItem.date }}</v-card-subtitle>
            <v-card-subtitle>Author: {{ newsItem.author }}</v-card-subtitle>
            <v-card-subtitle>Category: {{ newsItem.category }}</v-card-subtitle>
            <v-card-text>{{ newsItem.summary }}</v-card-text>
            <v-card-text>Stories: {{ newsItem.stories }}</v-card-text>
            <v-card-text>Created At: {{ newsItem.created_at }}</v-card-text>
            <v-card-text>Updated At: {{ newsItem.updated_at }}</v-card-text>
            <v-card-actions>
                <v-btn color="primary" @click="viewDetails(newsItem.id)">View Details</v-btn>
            </v-card-actions>
            </v-card>
        </v-col>
        </v-row>
    </v-container>
  </template>
  
  <script>
  export default {
    data() {
      return {
        approvedNews: [
        {
            id: 1,
            title: 'Breaking News 1',
            author: 'John Doe',
            category: 'General',
            date: 'November 17, 2023',
            summary: 'A brief summary of the breaking news.',
            stories: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. ...',
            image: 'https://preview.redd.it/kxov0rcoi4p21.png?auto=webp&s=8edd6e729acc84e01d55ad0853c7d5c07d86bada',
            created_at: '2023-11-17T12:00:00', // Replace with the actual timestamp
            updated_at: '2023-11-17T12:00:00', // Replace with the actual timestamp
        },

        {
            id: 1,
            title: 'Breaking News 1',
            author: 'John Doe',
            category: 'General',
            date: 'November 17, 2023',
            summary: 'A brief summary of the breaking news.',
            stories: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. ...',
            image: 'https://preview.redd.it/kxov0rcoi4p21.png?auto=webp&s=8edd6e729acc84e01d55ad0853c7d5c07d86bada',
            created_at: '2023-11-17T12:00:00', // Replace with the actual timestamp
            updated_at: '2023-11-17T12:00:00', // Replace with the actual timestamp
        },

        {
            id: 1,
            title: 'Breaking News 1',
            author: 'John Doe',
            category: 'General',
            date: 'November 17, 2023',
            summary: 'A brief summary of the breaking news.',
            stories: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. ...',
            image: 'https://preview.redd.it/kxov0rcoi4p21.png?auto=webp&s=8edd6e729acc84e01d55ad0853c7d5c07d86bada',
            created_at: '2023-11-17T12:00:00', // Replace with the actual timestamp
            updated_at: '2023-11-17T12:00:00', // Replace with the actual timestamp
        },

        
        // Add more news items as needed
        ],

      };
    },
    methods: {
      viewDetails(newsId) {
        // Implement logic to navigate to the details page for the selected news item
        // You can use Vue Router for navigation
        // this.$router.push(`/news/${newsId}`);
      },
    },
  };
  </script>
  
  <style scoped>
  .news-card {
    margin: 16px;
    transition: 0.3s;
  }
  
  .news-card:hover {
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
  }
  </style>
  