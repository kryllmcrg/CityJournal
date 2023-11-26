<template>
  <v-container>
    <!-- Page Title -->
    <v-row justify="center" class="mb-4">
      <v-col cols="12" md="8">
        <v-card class="elevation-12">
          <v-card-title class="headline primary--text text--darken-1">
            Approved News
          </v-card-title>
        </v-card>
      </v-col>
    </v-row>

    <!-- Category Filter Form -->
    <v-row justify="center" class="mb-4">
      <v-col cols="12" md="8">
        <v-form @submit.prevent="filterNews">
          <v-select
            v-model="selectedCategory"
            :items="categories"
            label="Select Category"
          ></v-select>
          <v-btn type="submit" color="primary">Filter</v-btn>
        </v-form>
      </v-col>
    </v-row>

    <!-- News Cards -->
    <v-row>
      <v-col v-for="newsItem in approvedNews" :key="newsItem.id" cols="12" md="4">
        <v-card class="news-card" elevation="12">
          <v-img :src="newsItem.image" height="200px"></v-img>
          <v-card-title class="headline">{{ newsItem.title }}</v-card-title>
          <v-card-subtitle class="grey--text">{{ newsItem.date }}</v-card-subtitle>
          <v-card-subtitle class="grey--text">Author: {{ newsItem.author }}</v-card-subtitle>
          <v-card-subtitle class="grey--text">Category: {{ newsItem.category }}</v-card-subtitle>
          <v-card-text class="body-1">{{ newsItem.summary }}</v-card-text>
          <v-card-text class="caption">Stories: {{ newsItem.stories }}</v-card-text>
          <v-card-text class="caption">Created At: {{ newsItem.created_at }}</v-card-text>
          <v-card-text class="caption">Updated At: {{ newsItem.updated_at }}</v-card-text>

          <!-- Comments Section -->
          <v-divider></v-divider>
          <v-card-actions>
            <v-btn text color="primary" @click="viewDetails(newsItem.id)">View Details</v-btn>
          </v-card-actions>
          <v-divider></v-divider>
          <v-card-subtitle class="comment-header">Comments:</v-card-subtitle>
          <v-list>
            <!-- Iterate over comments for this news item -->
            <v-list-item v-for="comment in newsItem.comments" :key="comment.id">
              <v-list-item-content class="caption">{{ comment.text }}</v-list-item-content>
            </v-list-item>
          </v-list>
          <v-divider></v-divider>
          <!-- Add a form for users to add new comments -->
          <v-form @submit.prevent="addComment(newsItem)">
            <v-textarea v-model="newsItem.newComment" label="Add a comment"></v-textarea>
            <v-btn type="submit" color="primary">Post Comment</v-btn>
          </v-form>
        </v-card>
      </v-col>
    </v-row>

    <!-- Footer Section -->
    <v-row justify="center" class="mt-4">
      <v-col cols="12">
        <v-footer app>
          <!-- Your footer content goes here -->
          <v-spacer></v-spacer>
          <span class="caption">&copy; 2023 Your News App</span>
        </v-footer>
      </v-col>
    </v-row>
  </v-container>
</template>
  
  <script>
  export default {
    data() {
      return {
        electedCategory: null,
        categories: ['General', 'Technology', 'Sports', 'Entertainment'],
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
        const newComment = {
        id: newsItem.comments.length + 1,
        text: newsItem.newComment,
      };
      newsItem.comments.push(newComment);
      newsItem.newComment = ''; // Clear the input field after posting the comment
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
  .comment-header {
  font-weight: bold;
  margin-top: 10px;
}
  </style>
  