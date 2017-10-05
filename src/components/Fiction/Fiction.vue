<template lang="html">
   <div class="container">
      <app-header></app-header>
      <fiction-page></fiction-page>
      <h1>Fiction Page</h1>
      <ul>
         <li v-for="post in posts">
            <h3>Category: {{ post.writing_group[0].name }}</h3>
            <h2>Title: {{ post.title.rendered }}</h2>
         </li>
      </ul>
   </div>
</template>

<script>
import Axios from 'axios';
import Header from '../Header.vue';
import FictionPage from './FictionPage.vue';

export default {
   data: function() {
      return {
         posts: '',
         post: '',
         title: ''
      }
   },
   components: {
      'app-header': Header,
      'fiction-page': FictionPage
   },
   watch: {
      '$route'(to, from) {
         this.pageId = to.params.pageId;

         var self = this;
         Axios.get('/wp-json/wp/v2/posts?categories=12')
         .then(function (response) {
            console.log(response.data);
            self.posts = response.data
         })
         .catch(function(error) {
            console.log(error);
         });
      }
   },
   // problem is how the below is called - pageID is not being passed, and once the call is made in 'mounted', it isn't made again.
   methods: {
      getTheCatPosts: function(id){
         var posts = this.posts;

         function filterPosts(el){
             return el.id == id;
         }
         this.$set(this, 'post', posts.filter(filterPosts));
     }
   },
   mounted() {
      var self = this;

      Axios.get('/wp-json/wp/v2/posts?categories=12')
      .then(function (response) {
         console.log(response.data);
         self.posts = response.data
      })
      .catch(function(error) {
         console.log(error);
      });
   }
}
</script>

<style lang="css">
</style>
