<template>
  <div>
    <h2>Vue WYSIWYG Editor</h2>
    <quill-editor v-model="content" :options="editorOptions"></quill-editor>
    <div>
      <h3>Preview:</h3>
      <div v-html="content"></div>
    </div>
  </div>
</template>

<script>
import { quillEditor } from 'vue-quill-editor/dist/ssr';

import 'quill/dist/quill.core.css'; // Add this line to include Quill core styles
import 'quill/dist/quill.snow.css';

export default {
  components: {
    quillEditor,
  },
  data() {
    return {
      content: '',
      editorOptions: {
        modules: {
          // Your toolbar configuration
          // ...
        },
        theme: 'snow',
      },
    };
  },
};
</script>

<style scoped>
/* Add any custom styling here */
</style>
