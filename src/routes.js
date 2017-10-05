import PostList from './components/PostList.vue';
import Post from './components/Post.vue';
import Page from './components/Page.vue';
import Fiction from './components/Fiction/Fiction.vue';
import NonFiction from './components/NonFiction/NonFiction.vue';
import FictionPage from './components/Fiction/FictionPage.vue';
import TestPages from './components/TestPages.vue';
import Home from './components/Home.vue';

// on the right path: idea is have neither menu or header reload - but also appropriate links to appear in each section. We don't actually want children of the Home Page, but children of section pages: 'Fiction', 'Non-Fiction', 'Photography'
export const routes = [
         { path: '', 'name': 'home', component: Home },
         { path: '/fiction', name: 'fiction', components: {
           default: Fiction
         }, children: [
               { path: '', name: 'testPages', component: TestPages },
               { path: ':pageId', name: 'fictionPage', component: FictionPage }
            ]},
        { path: '/non-fiction', name: 'nonfiction', component: NonFiction },
        { path: '/posts/:postId', name: 'post', component: Post },
        { path: '/home', redirect: '/'},
        { path: '*', redirect: '/' }
     ]
