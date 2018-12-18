<template>
  <div class="abs videoBox" ref="videoBox">
    <video id="video" class="video1" src="@/media/video3.mp4" ref="playBtn" width="100%" height="auto"
      x5-video-player-type="h5" x5-video-player-fullscreen="true" webkit-playsinline="true" x-webkit-airplay="true"
      playsinline="true" preload="auto" poster=""></video>
    <!-- <video id="video" class="video1" src="@/media/video5.mp4" ref="playBtn" width="100%" height="auto" preload="auto"
      poster="" @click="clickPlay"></video> -->

    <!-- <div class="abs skip js-none" ref="skip" @click="skipVideo">跳过</div> -->
  </div>
</template>

<style>
  .videoBox {

    width:100%;
    /* height:100%; */

    left: 0;
    /* left: 100%; */
    top: 50%;
    transform: translate3d(0, -50%, 0);


    /* left:100%;
    width: 100vh !important;
    transform: rotate(90deg);
    transform-origin: 0 0; */

    /* display: none; */
    z-index: 20;

  }

  .skip {
    top: 120px;
    right: 30px;
    font-size: 28px;
    letter-spacing:5px;
    color: #fff;
    transform: rotate(90deg);
  }

  .skip::before {
    content: '';
    display: block;
    position: absolute;
    top: -15px;
    right: -15px;
    bottom: -15px;
    left: -15px;
  }

</style>

<script type="text/javascript">
  export default {
    name: 'playVideo',
    data() {
      return {}
    },
    mounted() {
      this.$on('play', () => {
        this.playVideo();
      })
    },
    methods: {
      playVideo() {
        var videoBox = this.$refs.videoBox;
        var video = this.$refs.playBtn;
        video.play();

        // videoBox.style.left = '-39%';
        // videoBox.style.top = '21.7%';

        // videoBox.style.left = '100%';
        // videoBox.style.display = 'block';
        // videoBox.style.left = 0;

        // setTimeout(() => {
        //   this.$refs.skip.style.display = 'block';
        // }, 1000)

        video.addEventListener('ended', () => {
          videoBox.style.display = 'none';
          this.$f7.router.navigate('/page2/', {
            'reloadCurrent': true
          });
        })
      },
      skipVideo() {
        this.$f7.router.navigate('/page2/', {
          'reloadCurrent': true
        });
      },
      clickPlay() {
        this.$refs.playBtn.play();
      }
    }
  }

</script>
