<template lang="html">
   <div class="container">
      <app-header></app-header>
      <h1>Fiction Page</h1>
      <fiction-page></fiction-page>
   </div>
</template>

<script>
import Header from '../Header.vue';
import FictionPage from './FictionPage.vue';

export default {
   components: {
      'app-header': Header,
      'fiction-page': FictionPage
   }
}
</script>

<style lang="css">
</style>
