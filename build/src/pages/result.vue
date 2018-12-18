<template>
  <div class="page pageTemp" >
  	<div class="result_01" v-if="!result_img">
  		<div class="result_text">
  			<img src="@/images/result/result_text.png">
  		</div>
  		<div class="result_btn"  @touchstart="result_start()" @touchend="result_end()">
  				<!-- <div style="text-align:center;font-size:30px;">用户姓名：</div> -->
  			<img src="@/images/result/result_btn.png">
  				
  		</div>
  	</div>
  	<div style="text-align:center;opacity:0;" id="page">
  		<div class="saveImg" >
  			<img src="@/images/result/changanbaocun.png">
  		</div>
  		<div class="img-part01" id="img-part">
  			<div id="whole-bg" class="whole-bg01">
  				<img :src="result_lists[index]"  style="width:100%;">
  				<p class="name01" id="name">{{user_name}}</p>
  			</div>
  		</div>
  		
  		<div class="text" style="margin-top:6px;">
  			<img src="@/images/result/text.png">
  		</div>
  		<div class="jiantou">
  			<img src="@/images/result/jiantou.png">
  		</div>
  		<div class="receive_btn" @touchstart="receive_start()" @touchend="receive_end()">
  			<img src="@/images/result/result_receive.png">
  		</div>
  		<div class="goback_btn" @touchstart="goback_start()" @touchend="goback_end()">
  			<img src="@/images/result/result_goback.png">
  		</div>
  	</div>
  </div>

</template>
<style scoped>
  .pageTemp {
    background: url(../images/result/result_bg.png) 50% no-repeat;
    background-size: cover;
  }
  #page{
  	z-index:999;
  }
  .name{
  	position: relative;
  	font-size: 80px;
  	color:white;
  	margin-top: -820px;
  	margin-right: -230px;
    height: 30px;
    line-height: 30px;
    font-size: 28px;

    z-index: 1000;
  }
  .text{
  	display: none;
  }
  .jiantou{
  	width: 100%;
  	position: absolute;
  	top: 90%;
  }
  .name01{
  	position: relative;
  	font-size: 80px;
  	color:white;
  	margin-top: -1050px;
  	margin-right: -270px;
    height: 30px;
    line-height: 30px;
    font-size: 28px;

    z-index: 1000;
  }
  .result_01{
  	z-index: 999999;
    width: 100%;
    height: 100%;
  }
  .result_text{
  	position: absolute;
  	width: 100%;
  	top: 15%;
  }
  .result_btn{
  	position: absolute;
    top: 73%;
    width: 40%;
    left: 30%;
  }
  .receive_btn{
  	position: absolute;
  	top: 82%;
  	width: 36%;
  	left:10%;
  	z-index: 9999;
  	display: none;
  }
  .goback_btn{
  	position: absolute;
  	top: 82%;
  	width: 36%;
  	right:10%;
  	z-index: 9999;
  	display: none;
  }
  .img-part{
  	height: 850px;
    margin: auto;
    margin-top: 70px;
    width: 500px;
    overflow: hidden;
    border-radius: 25px;
  }
  .img-part01{
  	height: 1080px;
    margin: auto;
    margin-top: 70px;
    width: 650px;
    overflow: hidden;
    border-radius: 25px;
  }
  .whole-bg01{
  	height: 1080px;
    margin: auto;
    width: 650px;
    overflow: hidden;
    /*border-radius: 25px;*/
  }
  .whole-bg{
  	height: 850px;
    margin: auto;
    width: 500px;
    overflow: hidden;
    /*border-radius: 25px;*/
  }

  .saveImg{
  	position: absolute;
  	width: 100%;
  	top: 3%;
  }
  @media screen and (min-height: 700px) {
    .img-part {
        margin-top: 13%;
    }
    .saveImg{
  		top:2%;
  	}
  	.goback_btn,.receive_btn{
  		top: 72%;
  	}
  	.jiantou{
  		width: 100%;
  		position: absolute;
  		top: 80%;
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

  import html2canvas from 'html2canvas';
  import Canvas2Image from 'canvas2image';

  export default{
    data() {
      return {
        index: 1,//海报ID
        result_lists:[require('@/images/haibao/01.jpg'),require('@/images/haibao/02.jpg'),require('@/images/haibao/03.jpg'),require('@/images/haibao/04.jpg'),require('@/images/haibao/05.jpg'),require('@/images/haibao/06.jpg'),require('@/images/haibao/07.jpg'),require('@/images/haibao/08.jpg'),require('@/images/haibao/09.jpg')],
        user_name:null,
        result_img:false,
        btnShow:false,
        isBig :true,
        imgPart:'img-part',
        imgPart01:'img-part01'

      };
    },
    filters: {
    },
    computed: {
      
    },
    components: {
      html2canvas,
      Canvas2Image
    },
    methods: {
    	result_start(){
    		$(".result_btn>img").attr('src',require('@/images/result/result_btn_click.png'));
    		gtag('event', 'result', {
    			'event_category': 'button',
    			'event_label': 'click'
    		});
    	},
    	result_end(){
    		$(".result_btn>img").attr('src',require('@/images/result/result_btn.png'));
    		this.result_img = true;
    		// this.btnShow = true;
    		$("#page").css('opacity',1);
    		var t = new TimelineMax({repeat: -1});
    		if(screen.height>700){
    			t.to($(".jiantou"), 0.5, {top:'82%'})
    		 .to($(".jiantou"), 0.5, {top:'80%'});
    		}else{
    			t.to($(".jiantou"), 0.5, {top:'91%'})
    		 .to($(".jiantou"), 0.5, {top:'90%'});
    		}
    		


    		this.getImage();
    	},
    	goback_start(){
    		$(".goback_btn>img").attr('src',require('@/images/result/result_goback_click.png'));
    		gtag('event', 'goBack', {
    			'event_category': 'button',
    			'event_label': 'click'
    		});
    	},
    	goback_end(){
    		$(".goback_btn>img").attr('src',require('@/images/result/result_goback.png'));
    		window.location.reload();
    	},
    	receive_start(){
    		$(".receive_btn>img").attr('src',require('@/images/result/result_receive_click.png'));
    		gtag('event', 'receive', {
    			'event_category': 'button',
    			'event_label': 'click'
    		});
    	},
    	receive_end(){
    		$(".receive_btn>img").attr('src',require('@/images/result/result_receive.png'));
    		this.$f7router.navigate('/user-name/'+this.user_name+'/'+this.$f7route.params.result_number);

    	},
    	getImage() {
    		var cntElem = document.getElementById('whole-bg');
    		console.log(1111);
	        var shareContent = cntElem; //需要截图的包裹的（原生的）DOM 对象
	        var width = shareContent.offsetWidth; //获取dom 宽度
	        var height = shareContent.offsetHeight; //获取dom 高度

	        console.log(width + " " + height);

	        var canvas = document.createElement("canvas"); //创建一个canvas节点
	        var scale = 4; //定义任意放大倍数 支持小数
	        canvas.width = width*4; //定义canvas 宽度 * 缩放
	        canvas.height = height*4; //定义canvas高度 *缩放

	        canvas.style.width = width + "px";
      		canvas.style.height = height + "px";

	        //放大后再缩小提高清晰度
	        canvas.getContext("2d").scale(scale, scale);

	        console.log(width)
	        console.log(height)
	        // 设置html2canvas方法的配置
	        var opts = {
	          scale: scale, // 添加的scale 参数
	          canvas: canvas, //自定义 canvas
	          // allowTaint: true, //允许画布上有跨域图片 不建议使用 后面详细补充
	          // logging: true, //日志开关，便于查看html2canvas的内部执行流程
	          width: width, //dom 原始宽度
	          height: height,
	          useCORS: true // 【重要】开启跨域配置
	        };

	        html2canvas(shareContent, opts).then(function(canvas) {

	        	var context = canvas.getContext('2d');
		        // 【重要】关闭抗锯齿
		        context.mozImageSmoothingEnabled = false;
		        context.webkitImageSmoothingEnabled = false;
		        context.msImageSmoothingEnabled = false;
		        context.imageSmoothingEnabled = false;

	            let base64ImgSrc = canvas.toDataURL("image/png");

	            let img = document.createElement("img");
		        img.src = base64ImgSrc;
		        var detail = document.getElementById("page");
		        // detail.appendChild(canvas);
		        detail.appendChild(img);

	            // 最后设置img标签为正常高度宽度 提高清晰度
		        $(img).css({
		          "width": canvas.width / scale + "px",
		          "height": canvas.height / scale + "px",
		          "opacity": 0,
		          "position": "absolute",
		          "left": '16%',
		          "top": 0,
		          "z-index": 100
		        }).addClass('f-full');
	      });
    	}
    },
        on: {
      pageInit(event, page) {
        this.page = page;
        console.log(page.view.id + ': page init ' + page.route.url);
        var id = this.$f7route.params.result_id;
    	console.log(id);
    	this.index = id;
      },
      pageReinit(event, page) {
        console.log(page.view.id + ': page reinit ' + page.route.url);
      },
      pageBeforeIn(event, page) {
        console.log(page.view.id + ': page before in ' + page.route.url);
        console.log(page);
      },
      pageAfterIn(event, page) {

      	var startX,startY;
        console.log(page.view.id + ': page after in ' + page.route.url);

        var t = new TimelineLite();
          t.fromTo(page.el, 0.5, {
            opacity:0
          },{opacity:1});
        $('body').bind('touchstart',function(e){
        	startX = e.originalEvent.changedTouches[0].pageX,
        	startY = e.originalEvent.changedTouches[0].pageY;
        });
        $('body').bind('touchmove',function(e){
		    //获取滑动屏幕时的X,Y
		    var endX = e.originalEvent.changedTouches[0].pageX,
		    endY = e.originalEvent.changedTouches[0].pageY;
		    //获取滑动距离
		    var distanceX = endX-startX;
		    var distanceY = endY-startY;
		    //判断滑动方向
		    if(Math.abs(distanceX)>Math.abs(distanceY) && distanceX>0){
		    	console.log('往右滑动');
		    }else if(Math.abs(distanceX)>Math.abs(distanceY) && distanceX<0){
		    	console.log('往左滑动');
		    }else if(Math.abs(distanceX)<Math.abs(distanceY) && distanceY<0){
		    	console.log('往上滑动');
		    	$('.receive_btn').fadeIn();
		    	$('.goback_btn').fadeIn();
		    	$("#whole-bg").removeClass('whole-bg01');
		    	$("#whole-bg").addClass('whole-bg');
		    	$("#img-part").removeClass('img-part01');
		    	$("#img-part").addClass('img-part');
		    	$("#name").removeClass('name01');
		    	$("#name").addClass('name');
		    	$(".text").show();
		    	$('.jiantou').hide();

		    	
		    }else if(Math.abs(distanceX)<Math.abs(distanceY) && distanceY>0){
		    	// console.log('往下滑动');
		    	// $(".img-part01").css({'width':'650px','height':'1080px'});


		    	// $("#whole-bg").removeClass('whole-bg');
		    	// $("#whole-bg").addClass('whole-bg01');
		    	// $("#img-part").removeClass('img-part');
		    	// $("#img-part").addClass('img-part01');
		    	// $("#name").removeClass('name');
		    	// $("#name").addClass('name01');
		    	// $(".text").hide();
		    	// $('.receive_btn').fadeOut();
		    	// $('.goback_btn').fadeOut();
		    	// $('.jiantou').show();

		    	
		    }else{
		    	console.log('点击未滑动');
		    }

		});
        // 开始转化为canvs对象
        // if(this.result_img == true){
        	
        // }
        
      },
      pageBeforeOut(event, page) {
        console.log(page.view.id + ': page before out ' + page.route.url);
      },
      pageAfterOut(event, page) {
        console.log(page.view.id + ': page after out ' + page.route.url);
         t.fromTo(page.el, 1, {
            opacity:1
          },{opacity:0});
      },
      pageBeforeRemove(event, page) {
        console.log(page.view.id + ': page before remove ' + page.route.url);
      }
    },
    created() {
    	console.log(this.gaId);
    	gtag('config', this.gaId, {
    		'page_title': 'result',
    	});
       console.log(screen.height);
    	

    },
    mounted() {
    	
    	// ga('send','pageview','resultPage');
    	this.user_name = this.$f7route.params.user_name;
      
    }
  }
</script>