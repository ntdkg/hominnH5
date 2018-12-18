<template>
  <!-- App -->
  <div id="app">


    <!-- Main View -->
    <f7-view url="/" main :pushState="true" :pushStateSeparator="'#'" :iosSwipeBack="false" :animate="false"
      :preloadPreviousPage="true">
    </f7-view>



    <!-- Popup
    <f7-popup>
      <f7-view popup>
      </f7-view>
    </f7-popup>  -->

    <!-- <wechat-auth ref="wechatauth"></wechat-auth> -->
    <set-audio ref="setaudio"></set-audio>
    <wechat-share ref="wechatshare"></wechat-share>


  </div>
</template>

<script>
  import WechatShare from './components/WechatShare.vue';
  import SetAudio from './components/SetAudio.vue';
  // import WechatAuth from './components/WechatAuth.vue';

  export default {

    data() {

      return {
        pushStateChange: window.location.port == "" ? false : true,
        main: {

        },
        popup: {

        },

      };

    },
    components: {
      'wechat-share': WechatShare,
      'set-audio': SetAudio,
      // 'wechat-auth': WechatAuth
    },

    methods: {
      onF7Ready(f7) {
        // this.$refs.wechatauth.$emit('useAuth');
        this.$refs.wechatshare.$emit('useShare');


      },

    },



  }

</script>
