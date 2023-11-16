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
  width: 600px; /* Set the desired width */
  height: 400px; /* Set the desired height */
}
</style>
