import Axios from 'axios';
import Vue from 'vue';

export default {
   props: ['posts'],
   mounted() {
      let posts  = Axios.get('/wp-json/wp/v2/posts/?per_page=100').then(response =>  this.posts = response.data);
   }
}
