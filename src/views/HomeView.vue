<template>
  <div>
    <Login />
    <register />
  </div>
</template>

<script>
import Login from '@/components/Login.vue';
import register from '@/components/register.vue';
export default {
  components: {
    Login,
    register
  },
};
</script>
