<template>
  <div class="page pageTemp">
    <div class="bg-part" id="whole-bg-1">
      <div id="sky-bg">1231</div>
      <div id="people-bg"></div>
    </div>
    <div class="bg-part" id="whole-bg-2">
      <div class="bg"></div>
      <div class="bg-eye"></div>
      <div class="bg-end"></div>
    </div>
    <div id="airplane">
      <img src="../images/tweenTemp/airplane.png">
    </div>
    <button id="next">next</button>
  </div>
</template>
<style scoped>
  .pageTemp {
    background-color: white;
  }
  .bg-part {
    position: absolute;
    left:0;
    top:0;
    width: 100%;
    height: 100%;
    overflow: hidden;
  }
  #whole-bg-1 {
    z-index: 100;
  }
  #people-bg{
    position: absolute;
    left:0;
    top:0;
    width: 100%;
    height: 100%;
    background: url(../images/tweenTemp/people.png) 50% no-repeat;
    background-size: cover;
    z-index: 100;
  }
  #sky-bg{
    position: absolute;
    left:0;
    top:0;
    width: 100%;
    height: 100%;
    background: url(../images/tweenTemp/sky.png) 50% no-repeat;
    background-size: cover;
    z-index: 100;
  }
  .bg {
    position: absolute;
    overflow: hidden;
    width: 198%;
    height: 100%;
    background: url(../images/tweenTemp/window-people.png) 50% no-repeat;
    background-size: cover;
    z-index: 0;
    transform: scale(1.65);
    left: -162%;
    top: 17%;
    display: none;
    z-index: 200;
  }
  .bg-eye {
    position: absolute;
    overflow: hidden;
    width: 100%;
    height: 100%;
    background: url(../images/tweenTemp/people-eye.png) 50% no-repeat;
    background-size: cover;
    left: 0;
    top: 0;
    display: none;
    z-index: 210;
  }
  .bg-end {
    position: absolute;
    overflow: hidden;
    width: 100%;
    height: 100%;
    background: url(../images/tweenTemp/end.png) 50% no-repeat;
    background-size: cover;
    left: -80%;
    top: 90%;
    transform: scale(3);
    z-index: 210;
  }
  #airplane {
    position: absolute;
    left: 100%;
    top: 30%;
    width: 300px;
    height: 200px;
    transform: scale(1);
    /*z-index: 40;*/
  }
  #airplane img {
    width: 100%;
    height: auto;
    z-index: 50;
  }
  button {
    position: absolute;
    left: 200px;
    top: 400px;
    width: 200px;
    height: 50px;
    line-height: 30px;
    z-index: 10000;
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
      };
    },
    filters: {
    },
    computed: {
      
    },
    methods: {
      startToRun () {
      }
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

        this.demo_airplane = $("#airplane");
        this.demo_bg_1 = $("#whole-bg-1");
        this.demo_bg_2 = $("#whole-bg-2");
        var next = $("#next");

        var demo_action = new TimelineMax();
        demo_action.set($(".bg-end"), {opacity:0})
        .to(this.demo_airplane, 3.5, {scale: 1.2, y: "-200%", x: "-300%", ease: Power4.easeOut, force3D:false }, 1)
        .to(this.demo_bg_1, 3, {scale: 2, x:"50%", y:"50%", ease: Power4.easeOut, force3D:false },"-=3")
        .to($(".bg"), 3, {scale: 1, x: "81%", y: "-17%", ease: Power4.easeOut, force3D:false,onStart:function(){
          $(".bg").show();
        } },'-=1.5')
        .addPause()
        .to($(".bg"), 2, {scale: 5, x: "208%", y: "100%", ease: Power4.easeOut, force3D:false, onComplete:function() {
          $(".bg").hide();
        }})
        .to($(".bg-eye"), 2, {scale: 10, x: "190%", y: "167%", ease: Power4.easeOut, force3D:false,onStart:function(){
          $(".bg-eye").show();
        }, onComplete:function () {
          $(".bg-eye").hide();
        }},'-=1')
        .to($(".bg-end"), 2, {opacity: 1, ease: Power4.easeOut, force3D:false},'-=1')
        .to($(".bg-end"), 2, {scale: 1, x: "80%", y: "-90%", ease: Power4.easeOut, force3D:false},'-=1');

        next.click(function() {
          demo_action.play();
        })

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
    mounted() {
      
      // this.$http({
      //   url: this.URL + '/question/get-all-question-and-answer',
      //   method: 'GET',
      // }).then(function (response) {
      //   console.log(response);
      //   console.log('success');

      // }, function (response) {
      //   console.log(response);
      //   console.log('failed');

      // });

      

      
    }
  }
</script>