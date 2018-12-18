  import wx from 'weixin-js-sdk';
  import $ from 'jquery';
  console.log(123);

  // var init = {
  // 	site: {
  // 		url: window.location.href.split('#')[0],
  // 		getPath: function () {
  // 			return this.url.substring(0, this.url.lastIndexOf('/') + 1)
  // 		}
  // 	}
  // }
  // init.projectData = {
  // 	share: {
  // 		moment: {
  // 			title: this.title,
  // 			// imgUrl: init.site.getPath() + require("../images/share_img.jpg"),
  // 			link: window.location.href.split('?')[0]
  // 		},
  // 		friend: {
  // 			title: this.title,
  // 			desc: this.desc,
  // 			// imgUrl: init.site.getPath() + require("../images/share_img.jpg"),
  // 			link: window.location.href.split('?')[0]
  // 		}
  // 	}
  // }
  //       //正式环境获取微信接口
  //       $.ajax({
  //       	type: "post",
  //       	url: '',
  //       	dataType: 'text',
  //       	data: {
  //       		r: Math.random(),
  //       		type: "signature",
  //       		url: window.location.href.split("#")[0],
  //       		weixinidx: 1
  //       	},
  //       	dataType: 'json',
  //       	success: function (config) {
  //       		console.log(config);
  //       		var wxConfig = {
  //       			debug: false,
  //       			appId: config.appid,
  //       			timestamp: config.timestamp,
  //       			nonceStr: config.nonceStr,
  //       			signature: config.signature,
  //       			jsApiList: ['addCard', 'onMenuShareTimeline', 'onMenuShareAppMessage', 'onMenuShareQQ',
  //       			'onMenuShareWeibo'
  //       			]
  //       		};
  //       		wx.config(wxConfig);
  //       	}
  //       });

  //       //绑定微信分享事件
  //       try {
  //       	wx.ready(function () {

  //           //设置分享后的回调函数
  //           var callback = {
  //           	success: function (msg) {
  //           		msg = JSON.stringify(msg).toLowerCase();
  //           		if (msg.indexOf('timeline') > -1) {
  //                 //分享到朋友圈
  //             } else if (msg.indexOf('message') > -1) {
  //                 //分享到给朋友
  //             }
  //         }
  //     };
  //     wx.onMenuShareTimeline($.extend({}, init.projectData.share.moment, callback));
  //     wx.onMenuShareAppMessage($.extend({}, init.projectData.share.friend, callback));
  // });

  //       } catch (e) {
  //       	var msg = '错误：微信js-sdk未引用或者错误!';
  //       	try {
  //       		console.log(msg);
  //       	} catch (e) {
  //       		alert(msg);
  //       	}
  //       	return;
  //       }
