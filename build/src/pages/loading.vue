<template>
  <div class="page pageTemp">

  	<div class="tree">
  		<img src="@/images/loading/tree.png">
  	</div>
  	<div class="tree_top">
  		<img src="@/images/loading/tree_top02.png">
  	</div>
  	<!-- <div class="text">
  		<img src="@/images/loading/text.png">
  	</div> -->
  	<!-- <p v-if="showBar" class="bar" :style="{width:proBar+'%',}" >{{proBar}}</p> -->
  	<div v-if="show" class="showInput">
  		<div class="start_text"><img src="@/images/loading/start_text.png"></div>
  		<input class="write-name" v-model="user_name" placeholder="你还没告诉我，你的名字">
  		<!-- <button  style="position:absolute">点击开始</button> -->
  		<div class="start-btn" @click="start()"><img src="@/images/loading/start_btn.png" class="btn_img"></div>
  	</div>
  	
  </div>
</template>
<style scoped>
  .pageTemp {
    background-color: #000;
  }
  .bar{
  	background-color: red;
  }
  .showInput{
  	/*display: none;*/
  	position: absolute;
  	width: 100%;
  	height: 100%;
  	background: url(../images/loading/start_bg.png) 50% no-repeat;
  	background-size: cover;
  	z-index: 999;

  }
  .tree{
  	position: absolute;
  	width: 100%;
  	top: 40%;
  	z-index: 50;
  }
  .tree_top{
  	position: absolute;
  	width: 30.67%;
  	top: 40%;
    left:;
  	z-index: 99;
  	left: 33%;
  	/*background-color: #000;*/
  	
  }
  .start_text{
  	position: absolute;
    width: 100%;
    top: 18%;
  }
  input::-webkit-input-placeholder {
  	color: rgba(49,45,67,0.8);
  }
  .write-name{
  	width: 52%;
    height: 80px;
    position: absolute;
    left: 23%;
    top: 33%;
    color: rgba(49,45,67,0.8);
    background-color: rgba(255,255,255,0.5);
    border: 1px solid #fff;
    font-size: 30px;
    text-align: center;
  }
  .text{
  	position: absolute;
  	width: 100%;
  	top: 47%;
  }
  .start-btn{
  	position: absolute;
    width: 40%;
    left: 30%;
    top: 75%;
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
      	proBar:30,
      	openiId:null,
      	arr:['A','B','C','A','B','C'],//收集的答案
      	result_number:null,//答案的编码
      	result_id:1,//答案的id
      	theRequest:{},
      	showBar:true,//控制进度条出现
      	show:false,//控制开始出现
      	user_name:null
      };
    },
    filters: {
    },
    computed: {
      
    },
    methods: {
		//点击按钮跳转
		start(){
      $('.btn_img').attr('src',require('@/images/loading/start_btn_click.png'));
			if(this.user_name == null){
				alert("你还没告诉我你的名字");
        $('.btn_img').attr('src',require('@/images/loading/start_btn.png'));
			}else{
        setTimeout(()=>{
          this.$f7router.navigate('/home/'+this.user_name);
          
          setTimeout(()=>{
            this.audioPlay('airplane_audio', 0.1);
          }, 5300);
        },200);
      }
		},
		startLoading(load_num, len) {
			var change_top = (load_num / len) * (40 - 23);
			var new_top = 40 - change_top;
			$(".tree_top").css('top', new_top+'%');
			// // var _num = 0;
			// // var _progress = setInterval(() => {
			// // 	_num++;
			// // 	$('.').css('height', _num + '%');
			// // 	if (_num == '100') {
			// // 		clearInterval(_progress);
					
			// // 	}
			// // }, 20)
			// var clearInt = setInterval(()=>{
			// 	this.proBar--;
   //      	// console.log(this.prpBar);
        	// $(".tree_top").css('top',this.proBar+'%');
   //      	if(this.proBar <= 0) {
   //      		this.proBar = 30;
   //      	}
   //      	}, 10000)
		},
		loadImg() {
			var loadImgNumber = 0;
			var imgLoadArr = [
        require('@/images/share/share.png'),
        require('@/images/loading/start_bg.png'),
        require('@/images/loading/start_btn.png'),
        require('@/images/loading/text.png'),
        require('@/images/sceneOne/scene_one_sky.png'),
        require('@/images/sceneOne/scene_one_people.png'),
		    require('@/images/sceneOne/scene_one_airplane.png'),
        require('@/images/sceneOne/scene_one_bg.png'),
        require('@/images/sceneOne/scene_one_word.png'),
        require('@/images/question/1.png'),
        require('@/images/question/1_01.png'),
        require('@/images/question/1_02.png'),
        require('@/images/question/1_03.png'),
        require('@/images/question/1-01-01.png'),
        require('@/images/question/1-02-02.png'),
        require('@/images/question/1-03-03.png'),
        require('@/images/sceneTwo/scene_two_bg_all.png'),
        // require('@/images/sceneTwo/scene_two_bg_all_big.png'),
        require('@/images/sceneTwo/people_head_down.png'),
        require('@/images/sceneTwo/people_head_up.png'),
        require('@/images/sceneTwo/scene_two_bg_power.png'),
        require('@/images/sceneTwo/scene_two_bg_hamburger.png'),
        require('@/images/sceneTwo/scene_two_bg_sandwich.png'),
        require('@/images/sceneTwo/scene_two_hostess_other.png'),
        // require('@/images/sceneTwo/scene_two_hostess_other_big.png'),
        require('@/images/sceneTwo/scene_two_hostess_bg.png'),
        require('@/images/sceneTwo/scene_two_word.png'),
        require('@/images/sceneTwo/scene_two_word1.png'),
        require('@/images/sceneTwo/scene_two_word2.png'),
        require('@/images/question/2.png'),
        require('@/images/question/2_01.png'),
        require('@/images/question/2_02.png'),
        require('@/images/question/2_03.png'),
        require('@/images/question/2-01-01.png'),
        require('@/images/question/2-02-02.png'),
        require('@/images/question/2-03-03.png'),
        require('@/images/sceneTwo/hostess.png'),
        require('@/images/sceneThree/scene_three_bg.png'),
        // require('@/images/sceneThree/scene_three_bg_big.png'),
        require('@/images/sceneThree/scene_three_people.png'),
        require('@/images/sceneThree/rain_1.png'),
        require('@/images/question/3.png'),
        require('@/images/question/3_01.png'),
        require('@/images/question/3_02.png'),
        require('@/images/question/3_03.png'),
        require('@/images/question/3-01-01.png'),
        require('@/images/question/3-02-02.png'),
        require('@/images/question/3-03-03.png'),
        require('@/images/sceneFour/scene_four_bg.png'),
        require('@/images/sceneFour/scene_four_right_hand.png'),
        require('@/images/sceneFour/scene_four_left_hand.png'),
        require('@/images/question/4.png'),
        require('@/images/question/4_01.png'),
        require('@/images/question/4_02.png'),
        require('@/images/question/4_03.png'),
        require('@/images/question/4-01-01.png'),
        require('@/images/question/4-02-02.png'),
        require('@/images/question/4-03-03.png'),
        require('@/images/sceneFive/scene_five_bg.png'),
        require('@/images/sceneFive/scene_five_door.png'),
        require('@/images/sceneFive/scene_five_box.png'),
        require('@/images/question/5.png'),
        require('@/images/question/5_01.png'),
        require('@/images/question/5_02.png'),
        require('@/images/question/5_03.png'),
        require('@/images/question/5-01-01.png'),
        require('@/images/question/5-02-02.png'),
        require('@/images/question/6-03-03.png'),
        require('@/images/sceneSix/scene_six_bg.png'),
        require('@/images/question/6.png'),
        require('@/images/question/6_01.png'),
        require('@/images/question/6_02.png'),
        require('@/images/question/6_03.png'),
        require('@/images/question/6-01-01.png'),
        require('@/images/question/6-02-02.png'),
        require('@/images/question/6-03-03.png'),
        require('@/images/result/result_bg.png'),
        require('@/images/result/result_btn.png'),
        require('@/images/result/result_goback.png'),
        require('@/images/result/result_text.png'),
        require('@/images/haibao/01.jpg'),
        require('@/images/haibao/02.jpg'),
        require('@/images/haibao/03.jpg'),
        require('@/images/haibao/04.jpg'),
        require('@/images/haibao/05.jpg'),
        require('@/images/haibao/06.jpg'),
        require('@/images/haibao/07.jpg'),
        require('@/images/haibao/08.jpg'),
        require('@/images/haibao/09.jpg'),
        require('@/images/information/information_btn01.png'),
        require('@/images/information/information_btn02.png'),
        require('@/images/information/input-bg.png'),
        require('@/images/information/mask_layer.png'),
        require('@/images/information/mask_layer_text.png'),
        ]
		for (var i = 0; i < imgLoadArr.length; i++) {
			var img = new Image();
			img.onload = () => {
				console.log(loadImgNumber);
				// if (loadImgNumber == 80) {
				this.startLoading(loadImgNumber, imgLoadArr.length);
				// this.show = true;
        		// this.showBar = false;
				// }
				loadImgNumber++;
				if(loadImgNumber >= imgLoadArr.length-1) {
					this.show = true;
				}
			}
			img.src = imgLoadArr[i];
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
      document.getElementById(audio_name).pause();

      var wx = this.is_weixn();
      var u = navigator.userAgent;
      var isiOS = !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/);
      var audio = document.getElementById(audio_name);

      if (isiOS == true&&wx == false) {

        audio.pause();
        if (/i(Phone|P(o|a)d)/.test(navigator.userAgent)) {
          $(document).one('touchstart',
            function(e) {
                $("#" + audio_name).get(0).touchstart = true;
                $("#" + audio_name).get(0).pause();
                return false;
            });
        }

      } else {
        // 1: paly. 2: pause
        this.Teast(audio_name, 2); 
      }
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



// //调用取值
// JSON.parse(window.sessionStorage.getItem("searchIndex")).indexId
// JSON.parse(window.sessionStorage.getItem("searchIndex")).indexName)

// //判断session是否存在
//  if (window.sessionStorage["searchIndex"]) 
// {
// }

// //移除session
// window.sessionStorage.removeItem("searchIndex");


  //   	GetRequest() {  
		//    var url = location.search; //获取url中"?"符后的字串  
		//    if (url.indexOf("?") != -1) {  
		//    	var str = url.substr(1);  
		//    	strs = str.split("&");  
		//    	for(var i = 0; i < strs.length; i ++) {  
		//    		this.theRequest[strs[i].split("=")[0]]=unescape(strs[i].split("=")[1]);  
		//    	}  
		//    }   
		// },  

  //     isweixin() {
  //      const ua = window.navigator.userAgent.toLowerCase();
  //      if(ua.match(/MicroMessenger/i) == 'micromessenger'){
  //      	 this.GetRequest();
  //        this.isWx = true;
  //        if(!this.theRequest.openid){
  //        	 location.replace(this.URL+'/wechat/wechat-oauth');
  //        	 var theRequest = JSON.stringify(this.theRequest);
 	// 		window.sessionStorage["wechatOauth"] = theRequest;

  //        }
        

  //      } else {
  //        return true;
  //      }
  //    }
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
        // new TweenMax('.tree_top', 2, {
        //   'top': '14%',
        //   repeat: -1,//动画将进行4次
        // });
        
        var my_vue = this;
        
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

        /*var t1=window.setInterval(changeTop, 1000);
        var load_num = 8;
        function changeTop() {
          load_num++;
          var change_top = (load_num / 40) * (40 - 23);
          var new_top = 40 - change_top;
          $(".tree_top").css('top', new_top+'%');
          console.log(load_num);

          if(load_num == 36) {
            console.log(load_num);
            window.clearInterval(t1);
            my_vue.show = true;
          }
        }*/

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
    beforeCreate(){
    	
    	// this.isweixin();
    },
    created(){
    	// console.log("laoding");
    	// this.isweixin();
      gtag('config', this.gaId, {
        'page_title': 'loading',
      });
      console.log(this.gaId);
    },
    mounted() {
    //发送答案接收海报id
      this.audioPlay('bg', 1);
      this.loadImg();
      // this.$http.post(
      //     this.URL+'/api/save-result-and-get-final-answer',
      //     {'question':this.arr},
      //     {emulateJSON:true},
      //   )
      // .then(function (response) {
      //     // 响应成功回调
      //     console.log(response.data.code);
      //     if(response.data.code ==0){
      //     	console.log(response.data.data);
      //     	this.result_number = response.data.data.result_number;
      //     	this.result_id = response.data.data.id;
      //     	// this.$f7.dialog.alert('发送请求成功');
      //     }
          

      //     console.log(response);
      //   }, function (response) {
      //     // 响应错误回调
      //     console.log(response)
      //     console.log('failed')
      //   });


    }
  }
</script>