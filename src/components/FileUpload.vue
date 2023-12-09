<template>
  <v-file-input
    label="File input"
    variant="filled"
    prepend-icon="mdi-camera"
  ></v-file-input>
</template>
<script>
export default {
    name: "FileUploadButton",
    data (){
        return{
            selectedFile: "", // Local data property for selectedFile
        }
    },
    methods: {
        getObjectURL(file) {
            if (file) {
                return URL.createObjectURL(file);
            }
            return null;
        },
        handleFileChange(event) {
            console.log("Selected File in handleFileChange:", event.target.files[0]);
            this.selectedFile = event.target.files;
        },
    },
}
</script>