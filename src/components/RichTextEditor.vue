<script setup>
import {ref} from 'vue'
import{QuillEditor} from '@vueup/vue-quill'
import '@vueup/vue-quill/dist/vue-quill.snow.css'
const content = ref
</script>

<template>
    <QuillEditor theme = "snow" toolbar = "#custom-toolbar">
        <template #toolbar>
            <div id="custom-toolbar">
                <button class="ql-bold"></button>
                <button class="ql-italic"></button>
                <button class="ql-bold"></button>
                <button class="ql-bold"></button>
            </div>
        </template>

    </QuillEditor>
</template>