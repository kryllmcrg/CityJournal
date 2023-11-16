<template>
    <div id="app">
      <h1>Past News</h1>
      <div v-if="loading">Loading...</div>
      <div v-else>
        <ul>
          <li v-for="article in articles" :key="article.id">
            <h2>{{ article.title }}</h2>
            <p>{{ article.description }}</p>
            <p>{{ article.publishedAt }}</p>
          </li>
        </ul>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        loading: true,
        articles: [],
      };
    },
    mounted() {
      this.fetchNews();
    },
    methods: {
      fetchNews() {
        // Replace 'YOUR_API_ENDPOINT' with the actual endpoint for fetching past news
        const apiUrl = 'YOUR_API_ENDPOINT';
  
        // Using Axios for making an HTTP request
        axios.get(apiUrl)
          .then(response => {
            this.articles = response.data;
            this.loading = false;
          })
          .catch(error => {
            console.error('Error fetching news:', error);
            this.loading = false;
          });
      },
    },
  };
  </script>
  
  <style>
  #app {
    font-family: Avenir, Helvetica, Arial, sans-serif;
    text-align: center;
    color: #2c3e50;
    margin-top: 60px;
  }
  
  h1 {
    font-size: 2em;
    margin-bottom: 20px;
  }
  
  ul {
    list-style-type: none;
    padding: 0;
  }
  
  li {
    border: 1px solid #ddd;
    padding: 10px;
    margin-bottom: 10px;
  }
  
  h2 {
    margin-bottom: 5px;
  }
  
  p {
    margin: 0;
  }
  </style>