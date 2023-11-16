<script setup>
import { ref } from 'vue'
import { QuillEditor } from '@vueup/vue-quill'
import '@vueup/vue-quill/dist/vue-quill.snow.css'

const content = ref({})
</script>

<template>
  <div class="quill-editor-container">
    <QuillEditor theme="snow" toolbar="#custom-toolbar">
      <template #toolbar>
        <div id="custom-toolbar">
          <button class="ql-bold"></button>
          <button class="ql-italic"></button>
          <button class="ql-underline"></button>
          <button class="ql-strike"></button>
          <button id="your-button">Y</button>
        </div>
      </template>
    </QuillEditor>
  </div>
</template>

<style>
.quill-editor-container {
  width: 80%; /* Adjust the width as needed */
  max-width: 800px; /* Set a maximum width for larger screens */
  height: 300px; /* Adjust the height as needed */
  margin: 50px auto; /* Center horizontally and add some top margin */
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add a subtle box shadow for depth */
  border-radius: 8px; /* Add rounded corners for a softer look */
  overflow: hidden; /* Hide overflowing content */
}

#custom-toolbar {
  background-color: #f5f5f5; /* Set a light background color for the toolbar */
  border-bottom: 1px solid #ddd; /* Add a bottom border for separation */
  padding: 8px; /* Add padding for spacing within the toolbar */
}

/* Style Quill editor content area */
.ql-editor {
  font-family: 'Arial', sans-serif; /* Set a default font family */
  font-size: 16px; /* Set a default font size */
  color: #333; /* Set a default text color */
  padding: 15px; /* Add padding within the editor */
  line-height: 1.6; /* Set the line height for better readability */
}
</style>
