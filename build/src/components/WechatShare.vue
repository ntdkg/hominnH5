<template>
  <div>{{message}}</div>
</template>

<style></style>

<script>
  import wx from 'weixin-js-sdk';
  import $ from 'jquery';
  export default {
    name: 'wechatShare',
    data() {
      return {
        message: 'wechat',
        title: '听，国宝在唱歌',
        desc: '玩唱新国风，点开有惊喜'
      }
    },
    mounted() {
      this.$on('useShare', () => {
        this.getSdk();
        console.log( window.location.href.split("#")[0]);

      })
    },
    methods: {
      getSdk(){
        var shareUrl, url;
        console.log(window.location.host);
        if (window.location.host == 'homeinn-h5-uat.archisense.cn'){
          // Vue.prototype.URL = 'http://homeinn-h5-uat.archisense.cn';//uat测试平台
          shareUrl = 'http://homeinn-h5-uat.archisense.cn';
          url = 'http://homeinn-h5-uat.archisense.cn/share/get-share';
        }
        else if (window.location.host == 'thanksgiving.solomotech.cn'){
          // Vue.prototype.URL = 'http://thanksgiving.solomotech.cn';//正式平台
          shareUrl = 'http://thanksgiving.solomotech.cn/?utm_source=wechat&utm_medium=h5&utm_campaign=thanksgiving';
          url = 'http://thanksgiving.solomotech.cn/share/get-share';
        }
        console.log(shareUrl);

        var init = {
          site: {
            url: window.location.href.split('#')[0],
            getPath: function () {
              return this.url.substring(0, this.url.lastIndexOf('/') + 1)
            }
          }
        }


        // var shareUrlFd = "http://" + app.productionDomain + "/index.html";
        // var shareUrlTl = "http://" + app.productionDomain + "/index.html";


        var shareDataFriend = {
            title: '2018年最值得感谢的人竟然是Ta',
            desc: '你走过的每一公里，都有意义',
            link: shareUrl,
            imgUrl:init.site.getPath() + require('@/images/share/share.jpeg'),
            success: function () {


                app.tracker.event("share", "click", "share_friend");

            }
        };
        var shareDataTimeLine = {
            title: '2018年最值得感谢的人竟然是Ta',
            desc: '',
            link: shareUrl,
            imgUrl:init.site.getPath() + require('@/images/share/share.jpeg'),
            success: function () {

                app.tracker.event("share", "click", "share_moment");

            }
        };


        console.log(window.location.host);
        // if (window.location.host.indexOf('homeinn-h5-uat.archisense.cn/') != -1) {

                    $.ajax({
                        url:url,
                        data: {url: document.location.href.split("#")[0]},
                        type:'post',
                        dataType: "json",
                        cache: false,
                        success: function (data) {
                          console.log(data.appId);
                            wx.config({
                                "debug": false,
                                "appId": data.appId,
                                "timestamp": data.timestamp,
                                "nonceStr": data.nonceStr,
                                "signature": data.signature,
                                "jsApiList": ["onMenuShareTimeline","onMenuShareAppMessage","onMenuShareQQ","onMenuShareWeibo","onMenuShareQZone"]
                            });


                            wx.ready(function () {

                                //alert("wx ready");

                                wx.onMenuShareAppMessage(shareDataFriend);
                                wx.onMenuShareTimeline(shareDataTimeLine);
                            });

                        },
                        error: function (XHR, textStatus, errorThrown) {

                        }
                    })


        // }

      }


    }
  }

</script>
