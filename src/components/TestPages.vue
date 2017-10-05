<template lang="html">
   <div class="container">
      <h1>Test Page</h1>
      <app-menu></app-menu>
   </div>
</template>

<script>
import Menu from './Menu.vue';
export default {
   components: {
      'app-menu': Menu
   }
}
</script>

<style lang="css">
</style>
