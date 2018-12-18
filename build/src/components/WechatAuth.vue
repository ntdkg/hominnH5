<template>
  <div>{{message}}</div>
</template>

<style></style>

<script>
  import $ from 'jquery';
  export default {
    name: 'wechatAuth',
    data() {
      return {
        message:'wechat'
        }
    },
    mounted() {
      this.$on('useAuth', () => {
        this.isweixin();
        console.log('-------------------45123');
      })
    },
    methods: {
      getOpenId(){
        this.$http.get(
                  this.URL+'/wechat/wechat-oauth',
                  {emulateJSON:true},
                )
              .then(function (response) {
                  // 响应成功回调
                  console.log(response.data.code);
                  var search = location.search;
                  alert(search); //获取URL中?后的句子
                  var string = search.split("=")[1]; //分割取出cid
                  alert(string);
                  var cid = getParameter("cid"); //通过getParameter获取
                  alert(cid);
                  // console.log('ss')
                }, function (response) {
                  // 响应错误回调
                  console.log(response)
                  console.log('failed')
                });
      },

      isweixin() {
       const ua = window.navigator.userAgent.toLowerCase();
       if(ua.match(/MicroMessenger/i) == 'micromessenger'){
         this.getOpenId();
         this.isWx = true;
         console.log(this.isWx);
         console.log('----------12345645-------------')
       } else {
         return true;
       }
     }

    }
  }

</script>
