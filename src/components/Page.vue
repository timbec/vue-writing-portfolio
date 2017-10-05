<template lang="html">
<div class="container">
   <div class="single-page">
      <h1>Page ID: {{ pageId }}</h1>
      <div v-if="page[0]">
         <h1>{{ page[0].title.rendered }}</h1>
         <div v-html="page[0].content.rendered" class="page-content"></div>
      </div>

   </div>
</div><!--.container-->
</template>

<script>
import Axios from 'axios';
import Header from './Header.vue';

export default {

   data: function() {
      return {
         pageId: this.$route.params.pageId,
         page: [],
         title: ''
      }
   },
   components: {
      'app-header': Header
   },
   watch: {
      '$route'(to, from) {
         this.pageId = to.params.pageId;

         var self = this;
         console.log(this.pageId);
         Axios.get('/wp-json/wp/v2/pages/?slug=' + this.pageId)
         .then(function (response) {
            console.log(response.data);
            self.page = response.data
         })
         .catch(function(error) {
            console.log(error);
         });
      }
   },
   // problem is how the below is called - pageID is not being passed, and once the call is made in 'mounted', it isn't made again.
   methods: {
      getThePage: function(id){
         var pages = this.pages;

         function filterPages(el){
             return el.id == id;
         }
         this.$set(this, 'page', pages.filter(filterPages));
     }
   },
   mounted() {
      var self = this;
      console.log(this.pageId);
      Axios.get('/wp-json/wp/v2/pages/?slug=' + this.pageId)
      .then(function (response) {
         console.log(response.data);
         self.page = response.data
      })
      .catch(function(error) {
         console.log(error);
      });
   }
}
</script>

<style lang="css">
</style>
