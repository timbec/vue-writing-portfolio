<template lang="html">
   <div class="container">
      <app-header></app-header>
      <router-view></router-view>
      <post-list></post-list>
   </div>
</template>

<script>
   import Header from './Header.vue';
   import PostList from './PostList.vue';

export default {
   components: {
      'app-header': Header,
      'post-list': PostList
   }
}
</script>

<style lang="css">
.slide-leave-active {
    transition: opacity 1s ease;
    opacity: 0;
    animation: slide-out 1s ease-out forwards;
}

.slide-leave {
    opacity: 1;
    transform: translateX(0);
}

.slide-enter-active {
    animation: slide-in 1s ease-out forwards;
}

@keyframes slide-out {
    0% {
        transform: translateY(0);
    }
    100% {
        transform: translateY(-30px);
    }
}

@keyframes slide-in {
    0% {
        transform: translateY(-30px);
    }
    100% {
        transform: translateY(0);
    }
}
</style>
