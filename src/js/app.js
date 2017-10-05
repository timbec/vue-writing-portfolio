var posts = Vue.component('post-list', {
   template: '#post-list-template',
   data: function() {
      return {
         posts: '',
         filter: ''
      }
   },
   computed: {
      filteredItems() {
           var self = this
           return this.titles.filter(function(title) {
               return title.indexOf(self.filter) > -1
           })
      }
   },
   mounted() {
      axios.get('/wp-json/wp/v2/posts?_embed').then(response =>  this.posts = response.data);
   }
});

var App = new Vue({

});



var router = new VueRouter({
   routes: [
      { path: '/', name: 'post-list', component: posts }
   ]
});

new Vue({
   mode: 'history',
   router,
}).$mount('#app');
