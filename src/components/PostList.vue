<template>
   <div class="container list-container">
      <div class="post-list">
      <article v-for="post in posts" class="post">
         <h3>{{ post.title.rendered }}</h3>
         <div v-if="post.full" class="post">
            <a @click="getThePost(post.id)">
            <figure>
               <img v-bind:src="post.full">
            </figure>
            </a>
         </div>
         <div if-else></div>

         <div class="entry-content post-list">
            <p v-html="post.excerpt.rendered"></p>
            <small v-for="category in post.cats">
                  {{ category.name }}
                  {{ category.slug }}
            </small>
         </div>
        </article>
      </div>

      <div class="single-preview" v-if="show" transition="postshow">
         <div v-if="post[0]">

            <h2>{{ post[0].title.rendered }}</h2>
            <figure class="image">
               <img v-bind:src="post[0].full">
            </figure>
            <div v-html="post[0].excerpt.rendered"></div>

            <div class="btn-read-more">
               <router-link :to="{ name: 'post', params: { postId: post[0].slug }}">Read More</router-link>
            </div >


            <a @click="getThePost(post[0].next_post)" v-if="post[0].next_post" class="post-nav next">
            <span class="icon-right"></span>
            </a>

            <a @click="getThePost(post[0].previous_post)" v-if="post[0].previous_post" class="post-nav prev">
            <span class="icon-left"></span>
            </a>

            <button class="close-button" @click="closePost()">&#215;</button>

         </div>
      </div>
   </div>

</template>

<script type="text/javascript">

   import Axios from 'axios';

   export default {

      data: function() {
         return {
            posts: '',
            post: [],
            postId: '',
            show: false,
            prev_page: '',
            next_page: '',
            loading: ''
         }
      },
      methods: {
         clickCallback:function(pageNum) {
            console.log(pageNum)
         },
         getThePost: function(id){
            var posts = this.posts;

            this.show = true;
            //this.$set(this, 'loading', true);
            this.loading = true

            function filterPosts(el){
                return el.id == id;
            }
            // Vue2 - https://forum.vuejs.org/t/uncaught-in-promise-typeerror-cannot-create-property-object-object-on-string/441
            this.$set(this, 'post', posts.filter(filterPosts));

            this.loading=false;
        },
        closePost: function() {
           this.$set(this, 'show', false);
        }
      },
      mounted() {
         Axios.get('/wp-json/wp/v2/posts/?per_page=10').then(response =>  this.posts = response.data);
      }
	}
</script>
