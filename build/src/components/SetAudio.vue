<template>
  <div class="audioBox">
  	<div class="audio_cover"></div>
  	<audio controls="controls" id="airplane_audio">
      <source src="@/media/airplane_audio.mp3" >
      Your browser does not support the audio tag.
    </audio>
    <audio controls="controls" id="bg" loop="loop">
      <source src="@/media/bg01.mp3" >
      Your browser does not support the audio tag.
    </audio>
    <audio controls="controls" id="iphone_play" loop="loop">
      <source src="@/media/iphone_play.mp3" >
      Your browser does not support the audio tag.
    </audio>
    <audio controls="controls" id="rain_paly" loop="loop">
      <source src="@/media/rain_paly.mp3" >
      Your browser does not support the audio tag.
    </audio>
    <audio controls="controls" id="eat_dinner" loop="loop">
      <source src="@/media/eat_dinner.mp3" >
      Your browser does not support the audio tag.
    </audio>
    <audio controls="controls" id="open_door">
      <source src="@/media/open_door.mp3" >
      Your browser does not support the audio tag.
    </audio>
    <audio controls="controls" id="evening_sound">
      <source src="@/media/evening_sound.mp3" >
      Your browser does not support the audio tag.
    </audio>
  </div>
</template>

<style>
  .videoBox {
  	position: absolute;
    width: 100%;
    height: 100%;
    left: 0;
    top: 0;
    z-index: 1;
  }
  .audio_cover {
  	position: absolute;
  	width: 100%;
  	height: 100%;
  	left: 0;
  	top: 0;
  	background-color: white;
  	z-index: 10;
  }
  audio {
  	width: 100%;
  	height: 50px;
  }
</style>

<script type="text/javascript">
  export default {
    name: 'setAudio',
    data() {
      return {}
    },
    mounted() {
    },
    methods: {
    }
  }

</script>
