// Import Vue
import Vue from 'vue';


// Import F7
import Framework7 from './vendor/framework7/framework7.esm.js';


// Import F7 Vue Plugin
//import Framework7Vue from 'framework7-vue/dist/framework7-vue.esm.bundle.js';
import Framework7Vue from './vendor/framework7/framework7-vue.esm.js';


// Import F7 Styles
import Framework7Styles from './vendor/framework7/framework7.less';


import VueResource from 'vue-resource';

// Import Icons and App Custom Styles
// import IconsStyles from './css/icons.css';
import AppStyles from './css/app.css';

// Import Routes
import Routes from './routes.js';

//微信分享
// import WechatShare from './vendor/Wechat/WechatShare.js';

// Import App Component
import App from './app';

Vue.use(VueResource);

// Init F7 Vue Plugin
Vue.use(Framework7Vue, Framework7);

let host = window.location.host;

if(host == 'local.homeinn.com'){
  Vue.prototype.URL = 'http://local.homeinn.com';//b本地测试平台
}
else if (host == 'homeinn-h5-uat.archisense.cn'){
  Vue.prototype.URL = 'http://homeinn-h5-uat.archisense.cn';//uat测试平台
}
else if (host == 'thanksgiving.solomotech.cn'){
  Vue.prototype.URL = 'http://thanksgiving.solomotech.cn';//正式平台
}
else{
  Vue.prototype.URL = 'http://local.homeinn.com';//开发
  console.log(Vue.prototype.URL);
}


Vue.prototype.gaId = 'UA-129387079-1';
Vue.prototype.userName = "tineke";//默认姓名

// Init App
new Vue({
  el: '#app',
  template: '<app/>',
  // Init Framework7 by passing parameters here
  framework7: {
    id: 'io.framework7.h5', // App bundle ID
    name: '', // App name
    theme: 'ios', // Automatic theme detection
    // App routes
    // mode: 'history',
    routes: Routes,

    view: {
      url: "/",
    },
    dialog: {
      title: '',
      buttonOk: '确认',
      buttonCancel: '取消',
    }

  },
  // Register App Component
  components: {
    app: App
  }
});
