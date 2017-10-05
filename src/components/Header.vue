<template lang="html">
   <header id="masthead">
      <router-link to="/" tag="h1">Writing Portfolio</router-link>

      <nav>
         <ul>
            <li><router-link to="/fiction" tag="a">Fiction</router-link></li>
            <li><router-link to="/non-fiction" tag="a">Non Fiction</router-link></li>
            <li><router-link to="/photography" tag="a">Photography</router-link></li>
         </ul>
      </nav>
   </header>
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
