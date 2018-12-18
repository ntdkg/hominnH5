<template>
  <div class="page pageTemp">
    <div class="scene" id="scene_one">
      <img class="cimg scene_one_bg_item scene_one_sky" src="@/images/sceneOne/scene_one_sky.png" alt="Scene one sky">
      <img class="cimg" id="scene_one_airplane" src="@/images/sceneOne/scene_one_airplane.png" alt="Scene one airplane">
      <img class="cimg scene_one_bg_item scene_one_bg" src="@/images/sceneOne/scene_one_bg.png"  alt="Scene one bg">
    </div>
    <div class="scene" id="scene_two">
      <img class="cimg scene_two_bg_all scene_two_bg" src="@/images/sceneTwo/scene_two_bg_all.png" alt="Scene two bg">
    </div>
  </div>
</template>
<style scoped>
  .pageTemp {
    background-color: white;
  }
  .scene {
    position: absolute;
    margin: 0;
    padding: 0;
    width: 750px;
    height: 100%;
  }
  .cimg {
    position: absolute;
  }

  /* ---  scene one start  ---- */
  #scene_one {
    z-index: 9999;
  }
  .scene_one_bg_item {
    width: 750px;
    height: 100%;
    left: 0;
    top: 0;
    transform: scale(1);
  }
  .scene_one_sky {
    z-index: 10;
  }
  .scene_one_bg {
    z-index: 99;
  }
  #scene_one_airplane {
    width: 540px;
    height: 330px;
    z-index: 50;
    transform: scale(0.5);
  }


  /* ---  scene one start  ---- */
  .scene_two {
    z-index: 19999;
  }
  .scene_two_bg_all {
    height: 100%;
    width: 900px !important;
    width: auto;
    left: 0;
    top: 0;
    z-index: 12000;
    display: none;
    transform: scale(3);
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
      },
      pageAfterIn(event, page) {
        console.log(page.view.id + ': page after in ' + page.route.url);

        // ------  init animate  ----------
        var main_action = new TimelineMax();

        // ------  params  ---------
        // scene one
        var scene_one_bg_all   = $('.scene_one_bg_item');
        var scene_one_sky      = $('.scene_one_sky');
        var scene_one_bg       = $('.scene_one_bg');
        var scene_one_airplane = $('#scene_one_airplane');
        // scene two
        var scene_two_bg_all   = $('.scene_two_bg_all');

        // ------  params init  ---------
        main_action.set(scene_two_bg_all, {scale: 3, x: "-160%", y: "15%"})

        // ------  start scene one animate  -------
        // params init
          .set(scene_one_bg_all, {scale:1})
          .set(scene_one_airplane, {scale:0.5, x: "80%", y:"80%"})
        // animate start
          .to(scene_one_airplane, 5, {scale: 1, y: "-100%", x: "-100%", ease: Power4.easeOut, force3D:false }, 1)
          .to(scene_one_bg_all, 4, {scale: 2.5, y: "60%", x: "60%", ease: Power4.easeOut, force3D:false}, "-=5")

        // ------  start scene two animate  -------
        // params init
          .set(scene_one_bg, {opacity:0})
        // animate start
          .to(scene_two_bg_all, 2, {scale: 2.5, x: "-120%", y: "12%", ease: Power4.easeOut, force3D:false, onStart: function () {
            scene_two_bg_all.show();
            scene_one_bg.hide();
          }}, "-=3")
          .to(scene_two_bg_all, 3, {scale: 1, y: "0%", x: "0%", ease: Power4.easeOut, force3D:false, onComplete: function () {
            scene_two_bg_all.attr('src', require('../images/sceneTwo/scene_two_bg_people.png'));
          }}, "-=3")
          .to(scene_one_sky, 3, {scale: 3, y: "35%", x: "170%", ease: Power4.easeOut, force3D:false}, "-=3")

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
      
    }
  }
</script>