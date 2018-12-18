<template>
  <div class="page pageTemp" id="page">
    <div class="bg-part" id="whole-bg">
      <img src="../images/cat-temp/out-cat.jpeg" id="bg" alt="">
      <p>这是截图中的可变文字</p>
    </div>
  </div>
</template>
<style scoped>
  .pageTemp {
    background-color: white;
  }
  #whole-bg {
    position: relative;
    width: 100%;
    height: 590px;
    overflow: hidden;
    z-index: 100;
  }
  img {
    width: 100%;
    height: auto;
  }
  p {
    position: absolute;
    margin: 0;
    height: 70%;
    line-height: 50px;
    font-size: 50px;
    top: 40%;
    left: 23%;
    z-index: 10000;
    color: #921f1f;
    font-weight: bold;
  }
</style>
<script type="text/javascript">
  import $ from 'jquery';

  import html2canvas from 'html2canvas';
  import Canvas2Image from 'canvas2image';

  export default{
    data() {
      return {
        demo_el: null,
        demo_action: null,
      };
    },
    filters: {
    },
    components: {
      html2canvas,
      Canvas2Image
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

      var cntElem = document.getElementById('whole-bg');
      var imgElem = document.getElementById('bg');

      var shareContent = cntElem; //需要截图的包裹的（原生的）DOM 对象
      var width = cntElem.offsetWidth; //获取dom 宽度
      var height = cntElem.offsetHeight; //获取dom 高度

      console.log(width + " " + height);

      var canvas = document.createElement("canvas"); //创建一个canvas节点
      var scale = 2; //定义任意放大倍数 支持小数
      canvas.width = width*scale; //定义canvas 宽度 * 缩放
      canvas.height = height*scale; //定义canvas高度 *缩放

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
      // 开始转化为canvs对象
      html2canvas(shareContent, opts).then(function(canvas) {

        var context = canvas.getContext('2d');
        // 【重要】关闭抗锯齿
        context.mozImageSmoothingEnabled = false;
        context.webkitImageSmoothingEnabled = false;
        context.msImageSmoothingEnabled = false;
        context.imageSmoothingEnabled = false;

        let base64ImgSrc = canvas.toDataURL("image/png")

        let img = document.createElement("img");
        img.src = base64ImgSrc;
        var detail = document.getElementById("page");
        detail.appendChild(canvas);
        detail.appendChild(img);
        // 最后设置img标签为正常高度宽度 提高清晰度
        $(img).css({
          "width": canvas.width / 2 + "px",
          "height": canvas.height / 2 + "px",
          "opacity": 0,
          "position": "absolute",
          "left": 0,
          "top": 0,
        }).addClass('f-full');

      });
    
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