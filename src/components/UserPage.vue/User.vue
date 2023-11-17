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
            <v-card-text>{{ newsItem.summary }}</v-card-text>
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
            date: 'November 17, 2023',
            summary: 'A brief summary of the breaking news.',
            image: 'https://www.visualwebsite.com/img/cms/news1.jpg',
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
  