<template lang="html">
   <div class="container single-post">
      <app-header></app-header>
      <div class="post-control">
         <div class="container">
            <router-link to="/">Home</router-link>
         </div>
      </div>

      <!-- Returns ID not slug - not sure how much I want this anyway -->
      <!-- <router-link :to="{ name: 'post', params: { postId: post.next_post}}" v-if="post.next_post" class="post-nav next">
         <span class="icon-right"></span>
      </router-link>
      <router-link :to="{ name: 'post', params: { postId: post[0].previous_post}}" v-if="post[0].previous_post" class="post-nav previous">
         <span class="icon-left"></span>
      </router-link> -->

      <div v-if="post[0]">
         <h1>{{ post[0].title.rendered }}</h1>
         <div v-html="post[0].content.rendered" class="post-content"></div>
      </div>

   </div>
</template>

<script>
import Axios from 'axios';
import Header from './Header.vue';

export default {

   data: function() {
      return {
         postId: this.$route.params.postId,
         post: [],
         title: ''
      }
   },
   components: {
      'app-header': Header
   },
   created() {
      var self = this;
      Axios.get('/wp-json/wp/v2/posts/?slug=' + this.postId)
      .then(function (response) {
         console.log(response.data);
         self.post = response.data
      })
      .catch(function(error) {
         console.log(error);
      });
   }
}
</script>

<style lang="css">
</style>
