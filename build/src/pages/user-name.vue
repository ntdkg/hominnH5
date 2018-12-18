<template>
  <div class="page pageTemp">
  	
    <div class="back">
      <img src="@/images/result/back.png">
      <div class="back_bottom">
         <a href="#" class="back link">
          <!-- <i class="icon icon-back"></i> -->
          <!-- Back link text rendered only for iOS theme -->
          <!-- <span>Back</span> -->
        </a> 
      </div>
    </div>
    <div class="logo">
      <img src="@/images/information/logo.png">
    </div>
    <div class="information">
      <img src="@/images/information/information_text.png">
    </div>
    <div class="input-box" id="input-box">
      <img src="@/images/information/input-bg.png">
      <input class="name" style="top:16.7%;" v-model="user_name" placeholder="填写您的姓名">
    </div>
    <div style="text-align:center;" class="input-box"> 
      <img src="@/images/information/input-bg.png">
      <input class="phone" style="top:16.7%;" v-model="userPhone" placeholder="填写您的手机号">
    </div>

    <div class="btn01 btn" @touchstart="btn01_start()" @touchend="btn01_end()">
      <img src="@/images/information/information_btn01.png">
    </div>
    <div class="btn02 btn" @touchstart="btn02_start()" @touchend="btn02_end()">
      <img src="@/images/information/information_btn02.png">
    </div>
    <div class="logo_bottom">
        <img src="@/images/information/logo_bottom.png">
      </div>

    <div class="mask_layer all">
      <div class="mask_layer_text">
        <img src="@/images/information/mask_layer_text.png">
      </div>
      <div class="close" @click="close()">
        <img src="@/images/information/close.png">
      </div>
    </div>


    <div class="rules all">

      <div class="mask_layer_rules">
        <img src="@/images/information/rules.png">
      </div>
      <div class="close_rules" @click="close_rules()">
        <img src="@/images/information/close.png">
      </div>
    </div>

    
  </div>

</template>
<style scoped>
  .pageTemp {
    background: url(../images/information/bg.png) 50% no-repeat;
    background-size: cover;
  }
  .back{
    width: 100%;
    position: absolute;
    top: 0%;
  }
  .input-box{
    position: relative;
    width: 60%;
    left: 20%;
    text-align:center;
    
  }
  #input-box{
    margin-top: 53%;
  }
  .logo{
    position: absolute;
    width: 100%;
    top: 3%;
  }
  .information{
    position: absolute;
    width: 100%;
    top: 17%;
  }
  input::-webkit-input-placeholder {
    color: rgba(255, 255, 255, 0.2);
  }
  .name,.phone{
    position: absolute;
    width: 100%;
    left:0%;
    background: transparent;
    border: 0;
    text-align: center;
    color: #fff;
    font-size: 39px;
    height: 60px;
  }
  .back_bottom>a{
    position: absolute;
    width: 28%;
    height: 34%;
    left: 0;
    top: 33%;

  }
  .logo_bottom{
    position: absolute;
    width: 100%;
    top: 90%
  }
  .btn{
    position: absolute;
    width: 36%;
    top: 76%;
  }
  .btn01{
    left:10%;
  }
  .btn02{
    right:10%;
  }
  .all{
    display: none;
    position: absolute;
    top: 0%;
    background-color: rgba(21,42,79,.8);
    width: 100%;
    height: 100%;
  }
  .mask_layer_text{
    position: absolute;
    width: 100%;
    top: 27%;
  }
  .mask_layer_rules{
    position: absolute;
    width: 100%;
    top: 10%;
  }
  .close{
    position: absolute;
    width: 6%;
    right: 18%;
    top: 24%;
  }
  .close_rules{
    position: absolute;
    width: 6%;
    right: 5%;
    top: 5%;
  }
  @media screen and (min-height: 700px) {
    #input-box{
      margin-top: 61%;
    }
  }
</style>
<script type="text/javascript">
  import $ from 'jquery';
  // Import Tweenmax
  import {
    TweenMax,
    TimelineLite,
  } from "gsap";

  export default{
    data() {
      return {
        userPhone:null,
        user_name:null,
        rules:false
      };
    },
    filters: {
    },
    computed: {
      
    },
    methods: {
      btn01_start(){
        $(".btn01>img").attr('src',require('@/images/information/information_btn01_click.png'));
      },
      btn02_start(){
        $(".btn02>img").attr('src',require('@/images/information/information_btn02_click.png'));
      },
      btn01_end(){
        $(".btn01>img").attr('src',require('@/images/information/information_btn01.png'));
        var phone = this.userPhone;
        if(!(/^1[34578]\d{9}$/.test(phone))){ 
          alert("手机号码有误，请重填");  
          return false; 
        }else{
          //发送领奖人信息
          var result_number = this.$f7route.params.result_number;
          this.$http.post(
            this.URL+'/api/save-form',
            {name:this.user_name,phonenumber:this.userPhone,result_number:result_number,wechat_open_id:null},
            {emulateJSON:true},
            )
          .then(function (response) {
              // 响应成功回调
              console.log(response.data.code);
              if(response.data.code ==0){
                console.log(response.data.data);
                // this.rules = false;
                $(".mask_layer").fadeIn();
                gtag('event', 'getgift', {
                  'event_category': 'button',
                  'event_label': 'click'
                });
              }
              

              console.log(response);
          }, function (response) {
              // 响应错误回调
              console.log(response)
              console.log('failed')
          });
          
        }
      },
      btn02_end(){
        $(".btn02>img").attr('src',require('@/images/information/information_btn02.png'));
        $(".rules").fadeIn();
        gtag('event', 'rules', {
          'event_category': 'button',
          'event_label': 'click'
        });
      },
      close(){
        $(".mask_layer").fadeOut();
        gtag('event', 'close', {
          'event_category': 'button',
          'event_label': 'click'
        });
      },
      close_rules(){
        $(".rules").fadeOut();
        gtag('event', 'close_rules', {
          'event_category': 'button',
          'event_label': 'click'
        });
      },
    },
        on: {
      pageInit(event, page) {
        this.page = page;
        console.log(page.view.id + ': page init ' + page.route.url);
      },
      pageReinit(event, page) {
        console.log(page.view.id + ': page reinit ' + page.route.url);
      },
      pageBeforeIn(event, page) {
        console.log(page.view.id + ': page before in ' + page.route.url);
        console.log(page);
      },
      pageAfterIn(event, page) {
        console.log(page.view.id + ': page after in ' + page.route.url);
         // t.fromTo(page.el, 0.5, {
         //    opacity:0
         //  },{opacity:1});
      },
      pageBeforeOut(event, page) {
        console.log(page.view.id + ': page before out ' + page.route.url);
      },
      pageAfterOut(event, page) {
        console.log(page.view.id + ': page after out ' + page.route.url);
         t.fromTo(page.el, 0.5, {
            opacity:1
          },{opacity:0});
      },
      pageBeforeRemove(event, page) {
        console.log(page.view.id + ': page before remove ' + page.route.url);
      }
    },
    created(){
      gtag('config', this.gaId, {
        'page_title': 'information',
      });
    },
    mounted() {
      console.log(this.$f7route.params.result_number);

      this.user_name = this.$f7route.params.user_name;
      // this.result_number = this.$f7route.params.result_number
    }
  }
</script>