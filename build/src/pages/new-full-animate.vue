<template>
  <div class="page pageTemp">
    <div class="scene" id="scene_one">
      <img id="scene_one_airplane" src="@/images/sceneOne/scene_one_airplane.png" alt="Scene one airplane">
      <div class="bg scene_one_bg_all" id="scene_one_bg_all">
        <div class="bg scene_one_bg"></div>
        <div class="bg scene_one_word" id="scene_one_word">
          <!-- <div class="bg scene_one_icon"></div> -->
        </div>
        <div class="bg scene_one_sky"></div>
        <div class="bg scene_one_people"></div>
      </div>
    </div>
    <div class="scene" id="scene_two">
      <div class="bg scene_two_bg_all">
        <div class="bg scene_two_bg hamburger"
        :class="[
          questionAnswer == 'A' ? 'show':''
        ]"></div>
        <div class="bg scene_two_bg sandwich"
        :class="[
          questionAnswer == 'B' ? 'show':''
        ]"></div>
        <div class="bg scene_two_bg power"
        :class="[
          questionAnswer == 'C' ? 'show':''
        ]"></div>
        <div class="bg scene_two_bg scene_two_people_head_up"></div>
        <div class="bg scene_two_people_head_down"></div>
      </div>
      <!-- <div class="bg scene_two_bg_all_big"></div> -->
      <div class="bg scene_two_hostess_bg">
        <img id="scene_two_hostess" src="@/images/sceneTwo/hostess.png" alt="hostess">
        <div class="bg scene_two_other_bg"></div>
        <div class="bg scene_two_word"></div>
        <div class="bg scene_two_word1"></div>
        <div class="bg scene_two_word2"></div>
      </div>
      <!-- <div class="bg scene_two_hostess_other_big"></div> -->
    </div>
    <div class="scene" id="scene_three">
      <div class="bg scene_three_bg">
        <div class="bg scene_three_store"></div>
        <div class="bg scene_three_people" id="scene_three_people"></div>
        <div class="bg scene_three_rain_1"></div>
        <div class="bg scene_three_rain_2"></div>
      </div>
      <!-- <div class="bg scene_three_bg_big">
        <div class="bg scene_three_rain_1"></div>
        <div class="bg scene_three_rain_2"></div>
      </div> -->
    </div>
    <div class="scene" id="scene_four">
      <div class="bg scene_four_bg">
        <div class="bg scene_four_right_hand"></div>
        <div class="bg scene_four_left_hand"></div>
      </div>
       <!-- <div class="bg scene_four_bg_big"></div> -->
    </div>
    <div class="scene" id="scene_five">
      <div class="bg scene_five_door"></div>
      <div class="bg scene_five_bg">
        <div class="bg scene_five_box"></div>
      </div>
    </div>
    <div class="scene" id="scene_six">
      <div class="bg scene_six_bg"></div>
      <div class="bg scene_six_word_1"></div>
      <div class="bg scene_six_word_2"></div>
    </div>
    <div class="question_part">
      <div class="question"><img id="quesition" ></div>
      <div class="next" style="top:33%;" @touchstart="answer('A')"><img id ="ansA"></div>
      <div class="next" style="top:42%;" @touchstart="answer('B')"><img id ="ansB"></div>
      <div class="next" style="top:51%;" @touchstart="answer('C')"><img id="ansC"></div>
    </div>
    
  </div>
</template>
<style scoped>
  /* ---  common style  ---- */
  .pageTemp {
    background-color: white;
  }
  .scene {
    position: absolute;
    width: 100%;
    height: 100%;
    left: 0;
    top: 0;
    overflow: hidden;
  }
  .bg {
    position: absolute;
    width: 100%;
    height: 100%;
    left: 0;
    top: 0;
    overflow: hidden;
  }
  .show {
    display: block !important;
  }

  /* ---  scene one start  ---- */
  .scene_one_bg {
    background: url(../images/sceneOne/scene_one_bg.png) 50% no-repeat;
    background-size: cover;
    transform: scale(1);
    z-index: 100;
  }
  .scene_one_icon {
    background: url(../images/sceneOne/scene_one_icon.png) 50% no-repeat;
    background-size: cover;
    transform: scale(1);
    z-index: 110;
  }
  .scene_one_people {
    background: url(../images/sceneOne/scene_one_people.png) 50% no-repeat;
    background-size: cover;
    transform: scale(1);
    z-index: 110;
  }
  .scene_one_sky {
    background: url(../images/sceneOne/scene_one_sky.png) 50% no-repeat;
    background-size: cover;
    transform: scale(1);
    z-index: 1;
  }
  .scene_one_word {
    background: url(../images/sceneOne/scene_one_word.png) 50% no-repeat;
    background-size: cover;
    transform: scale(1);
    z-index: 110;
  }
  #scene_one_airplane {
    position: absolute;
    width: 540px;
    height: 330px;
    z-index: 50;
    transform: scale(0.5);
  }

  /* ---  scene two start  ---- */
  .scene_two_bg_all {
    width: 130%;
    height: 100%;
    background: url(../images/sceneTwo/scene_two_bg_all.png) 50% no-repeat;
    background-size: cover;
    transform: scale(1);
    z-index: 120;
    display: none;
  }
  .scene_two_bg {
    width: 130%;
    height: 100%;
    transform: scale(1);
    z-index: 110;
    display: none;
  }
  .hamburger {
    width: 100%;
    background: url(../images/sceneTwo/scene_two_bg_hamburger.png) 50% no-repeat;
    background-size: cover;
  }
  .power {
    width: 100%;
    background: url(../images/sceneTwo/scene_two_bg_power.png) 50% no-repeat;
    background-size: cover;
  }
  .sandwich {
    width: 100%;
    background: url(../images/sceneTwo/scene_two_bg_sandwich.png) 50% no-repeat;
    background-size: cover;
  }
  .scene_two_people_head_up {
    width: 95%;
    background: url(../images/sceneTwo/people_head_up.png) 50% no-repeat;
    background-size: cover;
    display: none;
    z-index: 126;
  }
  .scene_two_people_head_down {
    width: 95%;
    background: url(../images/sceneTwo/people_head_down.png) 50% no-repeat;
    background-size: cover;
    z-index: 121;
  }
  .scene_two_hostess_bg {
    background: url(../images/sceneTwo/scene_two_hostess_bg.png) 50% no-repeat;
    background-size: cover;
    transform: scale(1);
    z-index: 130;
    opacity: 0
  }
  #scene_two_hostess {
    position: absolute;
    z-index: 140;
    width: 35%;
    height: auto;
  }
  .scene_two_other_bg {
    width: 130%;
    height: 100%;
    background: url(../images/sceneTwo/scene_two_hostess_other.png) 50% no-repeat;
    background-size: cover;
    transform: scale(1);
    z-index: 160;
  }
  /* .scene_two_hostess_other_big {
    width: 130%;
    height: 100%;
    background: url(../images/sceneTwo/scene_two_hostess_other_big.png) 50% no-repeat;
    background-size: cover;
    transform: scale(1);
    display: none;
    z-index: 180;
  } */
  .scene_two_word {
    width: 100%;
    height: 100%;
    background: url(../images/sceneTwo/scene_two_word.png) 50% no-repeat;
    background-size: cover;
    transform: scale(1);
    display: none;
    z-index: 190;
  }
  .scene_two_word1 {
    width: 100%;
    height: 100%;
    background: url(../images/sceneTwo/scene_two_word1.png) 50% no-repeat;
    background-size: cover;
    transform: scale(1);
    display: none;
    z-index: 190;
  }
  .scene_two_word2 {
    width: 100%;
    height: 100%;
    background: url(../images/sceneTwo/scene_two_word2.png) 50% no-repeat;
    background-size: cover;
    transform: scale(1);
    display: none;
    z-index: 190;
  }

  /* ---  scene three start  ---- */
  .scene_three_bg {
    background: url(../images/sceneThree/scene_three_bg01.png) 50% no-repeat;
    background-size: cover;
    transform: scale(1);
    z-index: 300;
    opacity: 0;
    display: none;
  }
  .scene_three_store {
    background: url(../images/sceneThree/scene_three_store.png) 50% no-repeat;
    background-size: cover;
    transform: scale(1);
    z-index: 350;
  }
  /* .scene_three_bg_big {
    background: url(../images/sceneThree/scene_three_bg_big.png) 50% no-repeat;
    background-size: cover;
    transform: scale(1);
    z-index: 350;
    display: none;
  } */
  #scene_three_people {
    background: url(../images/sceneThree/scene_three_people.png) 50% no-repeat;
    background-size: cover;
    position: absolute;
    z-index: 340;
  }
  .scene_three_rain_1 {
    background: url(../images/sceneThree/rain_1.png) 50% no-repeat;
    background-size: cover;
    transform: scale(1);
    z-index: 360;
    display: none;
  }
  .scene_three_rain_2 {
    background: url(../images/sceneThree/rain_2.png) 50% no-repeat;
    background-size: cover;
    transform: scale(1);
    z-index: 360;
  }


  /* ---  scene four start  ---- */
  .scene_four_bg {
    background: url(../images/sceneFour/scene_four_bg01.png) 50% no-repeat;
    background-size: cover;
    transform: scale(1);
    z-index: 400;
    display: none;
  }
  .scene_four_bg_big {
    background: url(../images/sceneFour/scene_four_bg_big.png) 50% no-repeat;
    background-size: cover;
    transform: scale(1);
    z-index: 440;
    display: none;
  }
  .scene_four_right_hand {
    background: url(../images/sceneFour/scene_four_right_hand.png) 50% no-repeat;
    background-size: cover;
    transform: scale(1);
    z-index: 440;
  }
  .scene_four_left_hand {
    background: url(../images/sceneFour/scene_four_left_hand.png) 50% no-repeat;
    background-size: cover;
    transform: scale(1);
    z-index: 440;
  }

  /* ---  scene five start  ---- */
  .scene_five_bg {
    background: url(../images/sceneFive/scene_five_bg.png) 50% no-repeat;
    background-size: cover;
    transform: scale(1);
    z-index: 510;
  }
  .scene_five_door {
    background: url(../images/sceneFive/scene_five_door.png) 50% no-repeat;
    background-size: cover;
    transform: scale(1);
    z-index: 500;
    display: none;
  }
  .scene_five_box {
    background: url(../images/sceneFive/scene_five_box.png) 50% no-repeat;
    background-size: cover;
    transform: scale(1);
    z-index: 540;
  }

  /* ---  scene six start  ---- */
  .scene_six_bg {
    background: url(../images/sceneSix/scene_six_bg.png) 50% no-repeat;
    background-size: cover;
    transform: scale(1);
    z-index: 600;
    display: none;
  }
  .scene_six_word_1 {
    background: url(../images/sceneSix/scene_six_word_1.png) 50% no-repeat;
    background-size: cover;
    transform: scale(1);
    z-index: 620;
    display: none;
  }
  .scene_six_word_2 {
    background: url(../images/sceneSix/scene_six_word_2.png) 50% no-repeat;
    background-size: cover;
    transform: scale(1);
    z-index: 640;
    display: none;
  }

  /* ---- next button ------ */
  .question_part {
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    text-align: center;
    color: red;
    font-size: 25px;
    display: none;
    z-index: 100000;
    overflow: hidden;
  }
  .question{
    position: absolute;
    width: 100%;
    top: 20%;
  }
  button {
    position: absolute;
    left: 1%;
    top: 90%;
    width: 200px;
    height: 50px;
    line-height: 30px;
    z-index: 100000;
  }
  .next{
    position: absolute;
    width: 72%;
    left: 14%;
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
        demo_el: null,
        demo_action: null,
        main_action: null,
        questionList:[
            {
              id:1,
              quesition:require('@/images/question/1.png'),
              answer:[require('@/images/question/1_01.png'),require('@/images/question/1_02.png'),require('@/images/question/1_03.png')],
            },
            {
              id:2,
              quesition:require('@/images/question/2.png'),
              answer:[require('@/images/question/2_01.png'),require('@/images/question/2_02.png'),require('@/images/question/2_03.png')],
            },
            {
              id:3,
              quesition:require('@/images/question/3.png'),
              answer:[require('@/images/question/3_01.png'),require('@/images/question/3_02.png'),require('@/images/question/3_03.png')],
            },
            {
              id:4,
              quesition:require('@/images/question/4.png'),
              answer:[require('@/images/question/4_01.png'),require('@/images/question/4_02.png'),require('@/images/question/4_03.png')],
            },
            {
              id:5,
              quesition:require('@/images/question/5.png'),
              answer:[require('@/images/question/5_01.png'),require('@/images/question/5_02.png'),require('@/images/question/5_03.png')],
            },
            {
              id:6,
              quesition:require('@/images/question/6.png'),
              answer:[require('@/images/question/6_01.png'),require('@/images/question/6_02.png'),require('@/images/question/6_03.png')],
            },
        ],//问题列表
        questionOrder: 1,
        questionAnswer: null,
        allAnswer:[],//六个答案,
        preAnswer:null,
        result_number:null,//接受的海报数值
        result_id:null,//接收的海报id
        user_name:null,
        isClick:false
      };
    },
    filters: {
    },
    computed: {
    },
    methods: {
      answer(index){
        console.log('hahaha:'+this.questionOrder);
        var questionOrde = this.questionOrder;

        var answerNum;
        if(this.isClick == true){
                  if(index == 'A'){
          console.log(this.questionList[this.questionOrder-1].answer[0]);
          $('#ansA').attr('src',require('@/images/question/'+this.questionOrder+'-01-01.png'));
          gtag('event', 'answer'+this.questionOrde, {
          'event_category': 'pageView',
          'event_label': 'click'
        });
          console.log("我选了a");
          this.isClick = false;
        }
        else if(index == 'B'){
          console.log(this.questionList[this.questionOrder-1].answer[1]);
          $('#ansB').attr('src',require('@/images/question/'+this.questionOrder+'-02-02.png'));
          
          gtag('event', 'answer'+this.questionOrde, {
          'event_category': 'pageView',
          'event_label': 'click'
        });
          console.log("我选了b");
          this.isClick = false;
        }
        else if(index == 'C'){
          console.log(this.questionList[this.questionOrder-1].answer[2]);
          $('#ansC').attr('src',require('@/images/question/'+this.questionOrder+'-03-03.png'));
          console.log("我选了c");
          gtag('event', 'answer'+this.questionOrde, {
            'event_category': 'pageView',
            'event_label': 'click'
          });
          this.isClick = false;
        }
        console.log(this.questionList);
        this.changeAudioState(questionOrde);

          if(this.questionOrder == 1) {
            this.questionAnswer = index;
            console.log(this.questionAnswer);
          }
          this.allAnswer.push(index);
          console.log(this.allAnswer);
          this.preAnswer = index;
          console.log(this);
          if(this.questionOrder == '6'){
            //发送答案接收海报id
            this.$http.post(
                this.URL+'/api/save-result-and-get-final-answer',
                {'question':this.allAnswer},
                {emulateJSON:true},
              )
            .then(function (response) {
                // 响应成功回调
                console.log(response.data.code);
                $('.question_part').fadeOut();
                if(response.data.code ==0){
                  console.log(response.data.data);
                  this.result_number = response.data.data.result_number;
                  this.result_id = response.data.data.id;
                  console.log('id:'+response.data.data.id);
                  // this.$f7.dialog.alert('发送请求成功');
                  this.$f7router.navigate('/result/'+this.result_id+'/'+this.result_number+'/'+this.user_name);

                }

                console.log(response);
              }, function (response) {
                // 响应错误回调
                console.log(response)
                console.log('failed')
              });
          }else{
            // $('.question_part').fadeOut();
            window.setTimeout(()=>{
              $('.question_part').fadeOut();
              this.main_action.play();
            },1100);

          }
          
        }

      },
      changeAudioState (questionOrder) {
        console.log(questionOrder);
        switch(questionOrder) {
          case 1:
            this.audioPaused('airplane_audio');
            window.setTimeout(()=>{
              this.audioPlay('iphone_play', 0.7);
            },9000);
            break;

          case 2:
            window.setTimeout(()=>{
              this.audioPaused('iphone_play');
            },3500);
            window.setTimeout(()=>{
              this.audioPlay('rain_paly', 0.8);
            },5500);
            break;

          case 3:
            setTimeout(()=>{
              this.audioPaused('rain_paly');
            },5000);
            setTimeout(()=>{
              this.audioPlay('eat_dinner', 1);
            },9900);
            break;

          case 4:
            setTimeout(()=>{
              this.audioPaused('eat_dinner');
            },1000);
            setTimeout(()=>{
              this.audioPlay('evening_sound', 1);
            },6200);
            setTimeout(()=>{
              this.audioPlay('open_door', 1);
            },6000);
            break;

          case 5:
            this.audioPaused('open_door');
            break;

          case 6:
            this.audioPaused('evening_sound');
            break;
        }
      },
      audioPlay(audio_name, value) {
        var wx = this.is_weixn();
        var u = navigator.userAgent;
        var isiOS = !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/);
        var audio = document.getElementById(audio_name);

        if (isiOS == true&&wx == false) {

          audio.play();
          audio.volume = value;
          if (/i(Phone|P(o|a)d)/.test(navigator.userAgent)) {
            $(document).one('touchstart',
              function(e) {
                  $("#" + audio_name).get(0).touchstart = true;
                  $("#" + audio_name).get(0).play();
                  $("#" + audio_name).get(0).volume = value;
                  return false;
              });
          }

        } else {
          // 1: paly. 2: pause
          this.Teast(audio_name, 1, value);
        }

        audio.volume = value;
      },
      audioPaused(audio_name) {
        $("#" + audio_name).remove();
      },
      audioVolume(audio_name, value, limit_value) {
        var audio = document.getElementById(audio_name);

        // console.log(audio.volume);
        if(audio.volume <= 0 || audio.volume >= 1) {
          return ;
        } else {
          var volume = audio.volume;
          volume += value;

          volume = volume <= 0 ? 0 : volume;
          volume = volume >= 1 ? 1 : volume;
          audio.volume = volume;
        }
      },
      Teast(audio_name, action, value) {
        if (window.WeixinJSBridge) {
          WeixinJSBridge.invoke('getNetworkType', {}, function(e) {
            if(action == 1) {
              $("#" + audio_name).get(0).play();
              $("#" + audio_name).get(0).volume = value;
            } else {
              $("#" + audio_name).get(0).pause();
            }

          }, false);
        }else {
          document.addEventListener("WeixinJSBridgeReady", function() {
              WeixinJSBridge.invoke('getNetworkType', {}, function(e) {
                  if(action == 1) {
                    $("#" + audio_name).get(0).play();
                    $("#" + audio_name).get(0).volume = value;
                  } else {
                    $("#" + audio_name).get(0).pause();
                  }
              });
          }, false);
        }
        if(action == 1) {
          $("#" + audio_name).get(0).play();
          $("#" + audio_name).get(0).volume = value;
        } else {
          $("#" + audio_name).get(0).pause();
        }
      },
      is_weixn(){
        var ua = navigator.userAgent.toLowerCase();
        if(ua.match(/MicroMessenger/i)=="micromessenger") {
            return true;
        } else {
            return false;
        }
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
      },
      pageAfterIn(event, page) {
        console.log(page.view.id + ': page after in ' + page.route.url);
        
        function calcSize() {

          var ww = $(window).width();
          var wh = $(window).height();

          var sw = 375;
          var sh = 812;

          if (ww / wh > sw / sh) {
          
            var h = sh * ww / sw;

            $(".page").width(ww);
            $(".page").height(h);

            $(".page").css("margin-left", 0);
            $(".page").css("margin-top", (wh - h)/2);



          }
          else {

            var w = sw * wh / sh;

            $(".page").height(wh);
            $(".page").width(w);

            $(".page").css("margin-left", (ww - w)/2);
            $(".page").css("margin-top", 0);

          }

        }

        calcSize();

        var name = document.createElement("div");
        name.innerHTML = this.user_name;
        var contant = document.getElementById("scene_one_word");
        // detail.appendChild(canvas);
        contant.appendChild(name);

          // 最后设置img标签为正常高度宽度 提高清晰度
        $(name).css({
          "z-index": 199,
          "font-size": "17px",
          "position": "absolute",
          "width": "20px",
          "word-break": "break-all",
          "left": "80%",
          "color": "white",
          "top": "31%",
          "line-height": "20px",
          "letter-spacing": "5px"
        }).addClass('f-style');

        // setInterval(calcSize, 500);

        var my_vue = this; 

        // question function
        function showQuestion(question_order) {
          // console.log(question_order);
          my_vue.questionOrder = question_order;

          scene_two_word.hide();
          scene_two_word1.hide();
          scene_two_word2.hide();
          scene_six_word_1.hide();
          scene_six_word_2.hide();

          $('#quesition').attr('src',my_vue.questionList[question_order-1].quesition);
          $('#ansA').attr('src',my_vue.questionList[question_order-1].answer[0]);
          $('#ansB').attr('src',my_vue.questionList[question_order-1].answer[1]);
          $('#ansC').attr('src',my_vue.questionList[question_order-1].answer[2]);

          // console.log("this:" + my_vue.questionOrder);
          my_vue.isClick = true;
          $('.question_part').fadeIn();
        }

        // ------  init animate  ----------
        this.main_action = new TimelineMax();

        // function onTouchStart(e) {
        //   my_vue.main_action.play();
        // }

        // function onTouchEnd(e) {
        //   my_vue.main_action.stop();
        // }

        // var scene = document.getElementsByClassName('scene');
        // for (var i = 0; i <= scene.length - 1; i++) {
        //   scene[i].addEventListener('touchstart', onTouchStart, false);
        //   scene[i].addEventListener('touchend', onTouchEnd, false);
        // }

        // var next = $("#next");
        // next.click(function() {
        //   $('.question_part').hide();
        //   // main_action.play();
        // })

        // ------  params  ---------
        // scene one
        var scene_one           = $('#scene_one');
        var scene_one_bg_all    = $('.scene_one_bg_all');
        var scene_one_sky       = $('.scene_one_sky');
        var scene_one_bg        = $('.scene_one_bg');
        var scene_one_word      = $('.scene_one_word');
        var scene_one_airplane  = $('#scene_one_airplane');
        var scene_one_people    = $('.scene_one_people');
        // scene two
        var scene_two           = $('#scene_two');
        var scene_two_bg_all    = $('.scene_two_bg_all');
        // var scene_two_bg_all_big= $('.scene_two_bg_all_big');
        var scene_two_head_up   = $('.scene_two_people_head_up');
        var scene_two_head_down = $('.scene_two_people_head_down');
        var scene_two_hostess_bg= $('.scene_two_hostess_bg');
        var scene_two_hostess   = $('#scene_two_hostess');
        var scene_two_hostess_other   = $('.scene_two_other_bg');
        var scene_two_word      = $('.scene_two_word');
        var scene_two_word1     = $('.scene_two_word1');
        var scene_two_word2     = $('.scene_two_word2');
        // scene three
        var scene_three         = $('#scene_three');
        var scene_three_bg      = $('.scene_three_bg');
        // var scene_three_bg_big  = $('.scene_three_bg_big');
        var scene_three_rain_1  = $('.scene_three_rain_1');
        var scene_three_rain_2  = $('.scene_three_rain_2');
        var scene_three_people  = $('#scene_three_people');
        var scene_three_num     = 0;
        // scene four
        var scene_four           = $('#scene_four');
        var scene_four_bg        = $('.scene_four_bg');
        var scene_four_bg_big    = $('.scene_four_bg_big');
        var scene_four_left_hand = $('.scene_four_left_hand');
        var scene_four_right_hand= $('.scene_four_right_hand');
        // scene five
        var scene_five          = $('#scene_five');
        var scene_five_door     = $('.scene_five_door');
        var scene_five_bg       = $('.scene_five_bg');
        var scene_five_box      = $('.scene_five_box');
        // scene six
        var scene_six           = $('#scene_six');
        var scene_six_bg        = $('.scene_six_bg');
        var scene_six_word_1    = $('.scene_six_word_1');
        var scene_six_word_2    = $('.scene_six_word_2');

        // ------  params init  ---------
        this.main_action.set(scene_one_word, {opacity: 0})
          .set(scene_two_bg_all, {scale: 4, x: "-185%", y: "15%"})
          // .set(scene_two_bg_all_big, {opacity:0, scale: 1, y: "0%", x: "0%"})
          .set(scene_two_hostess_bg, {opacity:0, scale: 4, y: "110%", x: "-100%"})
          .set(scene_two_hostess, {opacity:0, y: "20%", x: "155%"})
          .set(scene_two_head_up, {opacity:0})
          // .set(scene_two_hostess_other_big, {opacity:1})
          .set(scene_two_word, {opacity:0})
          .set(scene_two_word1, {opacity:0})
          .set(scene_two_word2, {opacity:0})

          .set(scene_three_bg, {opacity:0, scale: 7.2, y: "-23%", x: "-185%"})
          .set(scene_three_people, {opacity:1, scale: 1})

          .set(scene_four_bg, {opacity:0, scale: 4.5, y: "178%", x: "-44%"})
          .set(scene_four_left_hand, {opacity:1, scale: 1, y: "5%", x: "-10%"})
          .set(scene_four_right_hand, {opacity:1, scale: 1, y: "0%", x: "0%"})

          .set(scene_five_door, {opacity:0, scale: 1, y: "0%", x: "0%"})
          .set(scene_five_bg, {opacity:0, scale: 1, y: "0%", x: "0%"})
          .set(scene_five_box, {opacity:1, scale: 1, y: "5%", x: "-5%"})

          .set(scene_six_bg, {opacity:0, scale: 1.8, y: "21%", x: "6%"})
          .set(scene_six_word_1, {opacity:0})
          .set(scene_six_word_2, {opacity:0})


        // ------  start scene one animate  -------
        // params init
          .set(scene_one_bg_all, {scale:1})
          .set(scene_one_airplane, {scale:0.7, x: "265px", y:"265px"})
          .set(scene_one_people, {scale:0.95, x: "55%", y:"18%"});
          this.main_action.to(scene_one_word, 4, {opacity: 1, ease: Power4.easeOut, force3D:false}, 3)
          .to(scene_one_people, 4, {scale: 1, y: "0%", x: "0%", ease: Power4.easeOut, force3D:false}, "-=1.5")
        // animate start;
          .to(scene_one_airplane, 6, {scale: 1.5, y: "-40px", x: "-400px", ease: Power4.easeOut, force3D:false, onStart: function () {
            // my_vue.audioPlay('airplane_audio', 0.99);
          }, onUpdate: function () {
            // my_vue.audioVolume('airplane_audio', -0.006, 0.2);
          }, onComplete: function () {
            // my_vue.audioPaused('airplane_audio');
          }}, "-=2.3")
          .to(scene_one_bg_all, 5.5, {scale: 2.5, y: "60%", x: "60%", ease: Power4.easeOut, force3D:false, onComplete: function() {
            scene_two_bg_all.show();
          }}, "-=5.5")

        // ------  start scene two animate  -------
        // params init
          .set(scene_one_bg, {opacity:0})
        // animate start
          .to(scene_two_bg_all, 2, {scale: 2.5, x: "-30%", y: "12%", ease: Power4.easeOut, force3D:false, onStart: function () {
            scene_two_bg_all.show();
            scene_one_bg.hide();
            scene_one_airplane.hide();
          }}, "-=3.1")
          .to(scene_two_bg_all, 3, {scale: 1, y: "0%", x: "0%", ease: Power4.easeOut, force3D:false, onComplete: function () {
          }}, "-=3.1")
          .to(scene_one_sky, 3, {scale: 1, y: "0%", x: "10%", ease: Power4.easeOut, force3D:false, onStart: function() {
            scene_two_bg_all.show();
          }}, "-=3")
          .to(scene_two_bg_all, 1, {scale: 1, ease: Power4.easeOut, force3D:false})
          .add('question_one')
          // 抬头
          .to(scene_two_head_up, 2, {opacity: 1, ease: Power4.easeOut, force3D:false, onStart: function () {
            scene_two_head_up.show();
          }})
          .to(scene_two_head_down, 2, {opacity: 0, ease: Power4.easeOut, force3D:false}, "-=1.5")

          // 拉近
          .to(scene_two_bg_all, 0.5, {ease: Power4.easeOut, force3D:false})
          // .to(scene_two_bg_all, 2, {scale: 3.5, y: "43%", x: "75%", ease: Power0.easeNone, force3D:false, onComplete: function () {
          //   scene_two_bg_all_big.show();
          // }}, "-=0.5")
          // .set(scene_two_bg_all_big, {opacity:0.7})
          .to(scene_two_bg_all, 6, {scale: 58, y: "1010%", x: "1930%", opacity: 0,ease: Power0.easeNone, force3D:false,onStart: function() {
            // scene_two_bg_all.hide();
            scene_one_sky.hide();
          }}, "-=0.5")
          // .to(scene_two_bg_all_big, 5, {scale: 23, y: "414%", x: "950%", ease: Power0.easeNone, force3D:false}, "-=7.8")
          // .to(scene_two_bg_all_big, 5, {opacity: 1, ease: Power0.easeNone, force3D:false}, "-=7.5")
          .to(scene_two_bg_all, 1, {opacity: 0, ease: Power0.easeNone, force3D:false, onStart: function() {
            // scene_two_bg_all.hide();
            scene_one_sky.hide();
          }}, "-=3")

            // 显示空姐
          .to(scene_two_hostess_bg, 3, {opacity: 1, ease: Power0.easeNone, force3D:false}, "-=5.5")
          .to(scene_two_hostess, 3, {opacity: 1, ease: Power0.easeNone, force3D:false}, "-=5.5")
          .to(scene_two_hostess_bg, 4, {scale: 1, y: "0%", x: "0%", ease: Power0.easeNone, force3D:false}, "-=4.5")
          .to(scene_two_word, 1.5, {opacity: 1, ease: Power4.easeOut, force3D:false, onStart: function () {
            scene_two_word.show();
          }}, "+=1.2")
          .to(scene_two_word1, 1.5, {opacity: 1, ease: Power4.easeOut, force3D:false, onStart: function () {
            scene_two_word1.show();
          }}, "-=0.1")
          .to(scene_two_word2, 1.5, {opacity: 1, ease: Power4.easeOut, force3D:false, onStart: function () {
            scene_two_word2.show();
          }}, "-=0.1")
          // .to(scene_two_word, 1, {opacity: 0, ease: Power4.easeOut, force3D:false})
          .to(scene_two_hostess, 3, {scale: 1.1, y: "25%", x: "150%", ease: Power4.easeOut, force3D:false}, "-=1.5")
          .add('question_two')
          .to(scene_two_hostess_bg, 2, {scale: 7, y: "-187%", x: "-2%", ease: Power0.easeNone, force3D:false, onComplete: function() {
            // scene_two_hostess_bg.hide();
            scene_two_word.hide();
            // scene_two_hostess_other_big.show();
          }}, "+=1")
          .to(scene_two_hostess_bg, 0.5, {opacity:0, ease: Power0.easeNone, force3D:false,onComplete: function() {
            // scene_two_hostess_bg.hide();
            scene_two.hide();
            // scene_two_hostess_other_big.show();
          }}, "-=0.5")
          // .to(scene_two_hostess_other, 3, {scale: 1, y: "-176%", x: "45%", ease: Power0.easeNone, force3D:false, onStart: function() {
          //   // scene_two_hostess_other_big.show();
          //   // scene_two_hostess_other_big.hide();
          //   scene_one_sky.hide();
          // }})
          // .to(scene_two_hostess_other_big, 3, {opacity: 0, ease: Power0.easeNone, force3D:false, onStart: function() {
          //   scene_two_hostess_other_big.hide();
          //   scene_one_sky.hide();
          // }})

        // // ------  start scene three animate  -------
        // .set(scene_three_bg, {opacity: 1,})
        // .to(scene_three_bg, 0.5, {opacity: 1, ease: Power0.easeNone,force3D:false, onStart: function () {
        //   // my_vue.audioPlay('rain_paly', 0.99);
        //   scene_three_bg.show();
        //   scene_one.hide();
        //   scene_two.hide();
        // }, onUpdate() {
        //   if (scene_three_num % 10 == 0 && (scene_three_num/10) % 2 > 0) {
        //     scene_three_rain_1.show();
        //     scene_three_rain_2.hide();
        //     // console.log(scene_three_num);
        //   }
        //   if (scene_three_num % 10 == 0 && (scene_three_num/10) % 2 == 0) {
        //     scene_three_rain_1.hide();
        //     scene_three_rain_2.show();
        //     // console.log(scene_three_num);
        //   }
        //   scene_three_num++;
        // }}, "-=0.5")
        .to(scene_three_bg, 3, {scale: 1, y: "0%", x: "0%", opacity: 1, ease: Power0.easeNone, force3D:false, onStart() {
          scene_three_bg.show();
          scene_one.hide();
          // scene_two.hide();
        }, onUpdate() {
          if (scene_three_num % 10 == 0 && (scene_three_num/10) % 2 > 0) {
            scene_three_rain_1.show();
            scene_three_rain_2.hide();
            // console.log(scene_three_num);
          }
          if (scene_three_num % 10 == 0 && (scene_three_num/10) % 2 == 0){
            scene_three_rain_1.hide();
            scene_three_rain_2.show();
            // console.log(scene_three_num);
          }
          scene_three_num++;
        }}, "-=1")
        .to(scene_three_bg, 2.5, {scale: 1, y: "0%", x: "0%", ease: Power4.easeOut, force3D:false}, "-=1")
        .add('question_three')
        .to(scene_three_people, 1.5, {scale: 1, y: "3%", x: "5%", ease: Power4.easeOut, force3D:false, onUpdate() {
          if (scene_three_num % 10 == 0 && (scene_three_num/10) % 2 > 0) {
            scene_three_rain_1.show();
            scene_three_rain_2.hide();
            // console.log(scene_three_num);
          }
          if (scene_three_num % 10 == 0 && (scene_three_num/10) % 2 == 0){
            scene_three_rain_1.hide();
            scene_three_rain_2.show();
            // console.log(scene_three_num);
          }
          scene_three_num++;
        }})
        .to(scene_three_bg, 3, {scale: 15, y: "300%", x: "-170%", ease: Power0.easeNone, force3D:false, onUpdate() {
          if (scene_three_num % 10 == 0 && (scene_three_num/10) % 2 > 0) {
            scene_three_rain_1.show();
            scene_three_rain_2.hide();
            // console.log(scene_three_num);
          }
          if (scene_three_num % 10 == 0 && (scene_three_num/10) % 2 == 0){
            scene_three_rain_1.hide();
            scene_three_rain_2.show();
            // console.log(scene_three_num);
          }
          scene_three_num++;
        }, onComplete: function () {
          // scene_three_bg.show();
          // scene_three_bg.hide();

          // my_vue.audioPaused('rain_paly');
          scene_four_bg.show();
        }})
        // .to(scene_three_bg, 0.5, {opacity:0, ease: Power0.easeNone, force3D:false,onStart:function() {scene_four_bg.show()},onComplete: function () {
        //   // scene_three_bg_big.show();
        //   // my_vue.audioPaused('rain_paly');
        //   // scene_four_bg.show();
        //   scene_three_bg.hide();
        //   scene_four_bg.show();
        // }},'-=0.5')
        // .to(scene_three_bg_big, 4, {scale: 4.2, y: "72%", x: "-41%", ease: Power0.easeNone, force3D:false, onUpdate() {
        //   if (scene_three_num % 10 == 0 && (scene_three_num/10) % 2 > 0) {
        //     scene_three_rain_1.show();
        //     scene_three_rain_2.hide();
        //     // console.log(scene_three_num);
        //   }
        //   if (scene_three_num % 10 == 0 && (scene_three_num/10) % 2 == 0){
        //     scene_three_rain_1.hide();
        //     scene_three_rain_2.show();
        //     // console.log(scene_three_num);
        //   }
        //   scene_three_num++;
        // }, onComplete: function () {
        //   scene_three_bg.hide();
        //   scene_four_bg.show();
        // }}, "-=0.1")

        // // ------  start scene four animate  -------
        .to(scene_four_bg, 2, {opacity: 1, ease: Power0.easeNone, force3D:false, onStart() {
        }}, "-=0.5")
        .to(scene_four_bg, 3, {scale: 1, y: "0%", x: "0%", ease: Power4.easeOut, force3D:false})
        .to(scene_four_right_hand, 1.5, {scale: 1, y: "10%", x: "10%", ease: Power4.easeOut, force3D:false})
        .to(scene_four_left_hand, 1.5, {scale: 1, y: "0%", x: "0%", ease: Power4.easeOut, force3D:false}, "-=1.3")
        .to(scene_four_right_hand, 1.5, {scale: 1, y: "0%", x: "0%", ease: Power4.easeOut, force3D:false})
        .to(scene_four_left_hand, 1.5, {scale: 1, y: "5%", x: "-10%", ease: Power4.easeOut, force3D:false}, "-=1.3")
        .add('question_four')
        .to(scene_four_right_hand, 1.5, {scale: 1, y: "10%", x: "10%", ease: Power4.easeOut, force3D:false})
        .to(scene_four_left_hand, 1.5, {scale: 1, y: "0%", x: "0%", ease: Power4.easeOut, force3D:false}, "-=1.3")
        .to(scene_four_bg, 3, {scale: 30, y: "985%", x: "-530%", ease: Power0.easeNone, force3D:false,onStart:function () {
          $("#scene_three").hide();
        }, onComplete: function () {
          // scene_five_door.show();
          
        }})
        .to(scene_four_bg, 1, {opacity:0, ease: Power0.easeNone, force3D:false, onStart: function () {
          scene_five_door.show();
          // scene_four_bg_big.show();
        }},'-=1')
        // .to(scene_four_bg, 1.5, {scale: 6, y: "170%", x: "-107%", ease: Power0.easeNone, force3D:false, onStart: function() {
        //   scene_five_door.show();
        // }},'-=1.5')

        //   // ------  start scene five animate  -------
        .to(scene_five_door, 2, {opacity: 1, ease: Power0.easeNone, force3D:false, onComplete: function() {
          scene_four.hide();
        }}, "-=1")
        .to(scene_five_bg, 2, {opacity: 1, ease: Power4.easeOut, force3D:false, onStart: function() {
          scene_five_bg.show();
        }}, "-=0.5")
        .to(scene_five_box, 2, {y: "0%", x: "0%", ease: Power4.easeOut, force3D:false}, "-=0.5")
        .add('question_five')
        .to(scene_five_bg, 3, {scale: 4.1, y: "85.5%", x: "21%", ease: Power4.easeOut, force3D:false, onComplete: function () {
          scene_six_bg.show();
          scene_five_door.hide();
        }})
        .to(scene_five_bg, 3, {opacity: 0, ease: Power4.easeOut, force3D:false, onStart: function() {
          // scene_three_bg_big.hide();
        }})

          // ------  start scene six animate  -------
        .to(scene_six_bg, 3, {opacity: 1, ease: Power0.easeNone, force3D:false}, "-=4.5")
        .to(scene_six_bg, 3, {scale: 1, y: "0%", x: "0%", ease: Power4.easeOut, force3D:false, onStart: function() {
          scene_six_word_1.show();
          scene_six_word_2.show();
        }})
        .to(scene_six_word_1, 1, {opacity: 1, y: "0%", x: "0%", ease: Power4.easeOut, force3D:false})
        .to(scene_six_word_2, 1.5, {opacity: 1, y: "0%", x: "0%", ease: Power4.easeOut, force3D:false})
        .add('question_six')

        // animate stop, question show
        .addPause('question_one', showQuestion, [1])
        .addPause('question_two+=1', showQuestion, [2])
        .addPause('question_three', showQuestion, [3])
        .addPause('question_four', showQuestion, [4])
        .addPause('question_five', showQuestion, [5])
        .addPause('question_six', showQuestion, [6])

      },
      pageBeforeOut(event, page) {
        console.log(page.view.id + ': page before out ' + page.route.url);
      },
      pageAfterOut(event, page) {
        console.log(page.view.id + ': page after out ' + page.route.url);
      },
      pageBeforeRemove(event, page) {
        console.log(page.view.id + ': page before remove ' + page.route.url);
      }
    },
    created(){
      gtag('config', this.gaId, {
        'page_title': 'animates',
      });
    },
    mounted() {
      console.log(this.$f7route.params.user_name);
      this.user_name = this.$f7route.params.user_name;
    }
  }
</script>