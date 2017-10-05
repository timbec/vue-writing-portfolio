<template lang="html">
<div class="container">
   <nav id="site-navigation">
      <ul>
         <li v-for="page in pages">
            <router-link :to="{ name: 'page', params: { pageId: page.slug }}">{{ page.title.rendered }}</router-link>
         </li>
      </ul>
   </nav>
</div>
</template>

<script>
import Axios from 'axios';

export default {
   data() {
      return {
         pages: '',
         page: '',
         pageId: this.$route.params.pageId,
      }
   },
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
      Axios.get('/wp-json/wp/v2/pages/?exclude=759')
      .then(function (response) {
         self.pages = response.data
      })
      .catch(function(error) {
         console.log(error);
      });
   },
   // watch: {
   //    '$route'(to, from) {
   //       this.pageId = to.params.pageId;
   //    }
   // }
}
</script>

<style lang="css">
</style>
