<template lang="html">
      <div class="component-wrapper">
         <app-header></app-header>
            <router-view></router-view>
      </div>
</template>

<script>
import Header from './components/Header.vue';
export default {
   components: {
      'app-header': Header
   }
}
</script>



<style lang="scss">

.slide-fade-enter-active {transition: all .3s ease;}.slide-fade-leave-active {transition: all 0.3s cubic-bezier(1, 0.5, 0.8, 1);}.slide-fade-enter,.slide-fade-leave-to {transform: translateX(10px);opacity: 0;}#page {width: 100%;overflow: hidden;}
</style>
