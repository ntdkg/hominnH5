import NewFullAnimate from './pages/new-full-animate.vue';

import NotFoundPage from './pages/not-found.vue';

import Loading from './pages/loading.vue';
import Result from './pages/result.vue';
import UserName from './pages/user-name.vue';
import TweenTemp from './pages/tween-temp.vue';
import CatTemp from './pages/cat-temp.vue';
import ImgPage from './pages/img-page.vue';

export default [
  {
    path: '/',
    component: Loading,
  },
  {
    path: '/promote',
    component: ImgPage,
  },
  {
    path: '/home/:user_name',
    component: NewFullAnimate,
  },
  {
    path: '/user-name/:user_name/:result_number',
    component: UserName,
  },
  {
    path: '/result/:result_id/:result_number/:user_name',
    component: Result,
  },
  
  // {
  //   path: '/dynamic-route/blog/:blogId/post/:postId/',
  //   component: DynamicRoutePage,
  // },
  {
    path: '(.*)',
    component: NotFoundPage,
  },
];
