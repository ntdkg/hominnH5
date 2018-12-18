## 目录

* 1.通用约定

* 2全部问题答案
>* 2.1问题答案查询
>* 2.2问题答案增改

* 3.答题结束结果返回
>* 3.1 结果返回
* 4.表单结果保存
* 5.微信授权


* * *

### 1.通用约定
* http://localhost 代表当前使用的环境域名
* 统一回复格式
```angular2html
{
    "code": 0,
    "msg": "success",
    "data": {…}
}
```  
> 返回值说明
<table>
    <tr>
        <td>参数</td>
        <td>类型</td>
        <td>说明</td>
        <td>示例</td>
    </tr>
    <tr>
        <td>id</td>
        <td>int</td>
        <td>API返回码，0为正常，更多返回码请查看Error Code</td>
        <td>0</td>
    </tr>
    <tr>
        <td>msg</td>
        <td>string</td>
        <td>错误信息，更多错误信息请查看Error Code</td>
        <td>0</td>
    </tr>
    <tr>
        <td>data</td>
        <td>Json</td>
        <td>请求返回的数据信息</td>
        <td>
          "data": {
          }
        </td>
    </tr>
</table>

* * *
### 2.全部问题答案

#### 2.1问题答案查询
###### 接口信息
 <table>
    <tr>
        <td>描述</td>
        <td>全部问题答案查询</td>
    </tr>
    <tr>
        <td>协议</td>
        <td>Http</td>
    </tr>
    <tr>
        <td>请求方式</td>
        <td>GET</td>
    </tr>
    <tr>
        <td>请求地址</td>
        <td>http://localhost/question/get-all-question-and-answer</td>
    </tr>
    <tr>
        <td>数据返回格式</td>
        <td>Json</td>
    </tr>
</table>


###### 请求参数
>无

###### 返回数据示例
```
{
	"code": 0,
	"msg": "Success",
	"data": {
		"data": [
		{
			"id": "1",
			"question": "Abrahamxxxxxx",
			"answer": {
				"answerA": "1",
				"answerB": "oKWDbwDApMEEI0twbbxsr6rGjCbE",
				"answerC": "oqFK809zuUmOHdoQi2APrz4adQHo",
				"answerD": "1",
				"
			},
			
		},{...}
		],
	 
	}
}
```
###### data参数说明
<table>
    <tr>
        <td>参数</td>
        <td>类型</td>
        <td>说明</td>
    </tr>
    <tr>
        <td>id</td>
        <td>int</td>
        <td>问题ID</td>
    </tr>
    <tr>
        <td>question</td>
        <td>string</td>
        <td>问题题目</td>
    </tr>
    <tr>
        <td>answer</td>
        <td>json</td>
        <td>问题答案</td>
    </tr>
    
</table>



#### 2.2最终答案结论查询
###### 接口信息
 <table>
    <tr>
        <td>描述</td>
        <td>问题答案增改</td>
    </tr>
    <tr>
        <td>协议</td>
        <td>Http</td>
    </tr>
    <tr>
        <td>请求方式</td>
        <td>post</td>
    </tr>
    <tr>
        <td>请求地址</td>
        <td>http://localhost/result/save-result-and-get-final-answer</td>
    </tr>
    <tr>
        <td>数据返回格式</td>
        <td>Json</td>
    </tr>
</table>

###### 请求数据示例
```
array (
  'question1' => 'A',
  'question2' => 'B',
  'question3' => 'C',
  'question4' => 'A',
  'question5' => 'A',
  'question6' => 'B',
)
```

###### 请求参数
<table>
    <tr>
        <td>参数</td>
        <td>类型</td>
        <td>是否必填</td>
        <td>说明</td>
        <td>示例</td>
    </tr>
    <tr>
        <td>id</td>
        <td>int</td>
        <td>否</td>
        <td>问题编号</td>
        <td>6</td>
    </tr>
    <tr>
        <td>question1</td>
        <td>string</td>
        <td>是</td>
        <td>问题内容</td>
        <td> A</td>
    </tr>
     <tr>
     <td>question2</td>
     <td>string</td>
     <td>是</td>
     <td>问题内容</td>
     <td> A</td>
     </tr>
     <tr>
      <td>question3</td>
      <td>string</td>
      <td>是</td>
      <td>问题内容</td>
      <td> A</td>
       </tr>
     <tr>
           <td>question4</td>
           <td>string</td>
           <td>是</td>
           <td>问题内容</td>
           <td> A</td>
            </tr>              
<tr>
      <td>question5</td>
      <td>string</td>
      <td>是</td>
      <td>问题内容</td>
      <td> A</td>
       </tr>
 <tr>
       <td>question6</td>
       <td>string</td>
       <td>是</td>
       <td>问题内容</td>
       <td> A</td>
        </tr>      	    
</table>

###### 返回数据示例
```
{
	"code": 0,
	"msg": "Success",
	"data": {
	    "id": "2",
            "final": "xxxxx",
             "result_number": "xxxxx",
	}
}
```
###### data参数说明
<table>
    <tr>
        <td>参数</td>
        <td>类型</td>
        <td>说明</td>
        <td>示例</td>
    </tr>
    <tr>
        <td>code</td>
        <td>int</td>
        <td>API返回码，0为正常，更多返回码请查看Error Code</td>
        <td>0</td>
    </tr>
    <tr>
        <td>msg</td>
        <td>string</td>
        <td>错误信息，更多错误信息请查看Error Code</td>
        <td>0</td>
    </tr>
    <tr>
            <td>final</td>
            <td>string</td>
            <td>最终答案</td>
            <td>fianl:{xx}</td>
        </tr>
         <tr>
                    <td>result_number</td>
                    <td>string</td>
                    <td>答案编码</td>
                    <td>result_number:"sdf"</td>
                </tr>
    <tr>
                 <td>data</td>
                 <td>Json</td>
                 <td>请求返回的数据信息</td>
                 <td>
                   "data": {}
                 </td>
             </tr>
             <tr>
                     <td>id</td>
                     <td>int</td>
                     <td>请求返回的结果编号</td>
                     <td>
                       1
                     </td>
                 </tr>
</table>

### 4.表单结果保存
####4.表单保存
###### 接口信息
 <table>
    <tr>
        <td>描述</td>
        <td>结果保存</td>
    </tr>
    <tr>
        <td>协议</td>
        <td>Http</td>
    </tr>
    <tr>
        <td>请求方式</td>
        <td>POST</td>
    </tr>
    <tr>
        <td>请求地址</td>
        <td>http://localhost/result/save-form</td>
    </tr>
    <tr>
        <td>数据返回格式</td>
        <td>Json</td>
    </tr>
</table>


###### 请求参数
<table>
    <tr>
        <td>参数</td>
        <td>类型</td>
        <td>是否必填</td>
        <td>说明</td>
        <td>示例</td>
    </tr>
            <tr>
        <td>name</td>
        <td>string</td>
        <td>是</td>
        <td>姓名</td>
        <td>王xx</td>
    </tr>
	    <tr>
            <td>phonenumber</td>
            <td>int</td>
            <td>是</td>
            <td>电话                        </td>
            <td>1</td>
        </tr>
        <tr>
                    <td>wechat_open_id</td>
                    <td>string</td>
                    <td>否</td>
                    <td>微信openid                        </td>
                    <td>1</td>
                </tr>
        	     <tr>
            <td>result_number</td>
            <td>string</td>
            <td>是</td>
            <td>答题结果编号</td>
            <td>sswwcm </td>
        </tr>
       
</table>

###### 返回数据示例
```
{
	"code": 0,
	"msg": "Success",
	"data": {
	
	}
	}
}
```
###### data参数说明
<table>
    <tr>
        <td>参数</td>
        <td>类型</td>
        <td>说明</td>
        <td>示例</td>
    </tr>
    <tr>
        <td>id</td>
        <td>int</td>
        <td>API返回码，0为正常，更多返回码请查看Error Code</td>
        <td>0</td>
    </tr>
    <tr>
        <td>msg</td>
        <td>string</td>
        <td>错误信息，更多错误信息请查看Error Code</td>
        <td>0</td>
    </tr>
    <tr>
        <td>data</td>
        <td>Json</td>
        <td>请求返回的数据统计信息</td>
        <td>"data": {}
        </td>
    </tr>
    <tr>
            <td>result_number</td>
            <td>string</td>
            <td>答题结果编号</td>
            <td>xxx
            </td>
        </tr>
    

### 5.微信授权
####5.授权接口
###### 接口信息

  <table>
    <tr>
            <td>描述</td>
            <td>结果保存</td>
        </tr>
        <tr>
            <td>协议</td>
            <td>Http</td>
        </tr>
        <tr>
            <td>请求方式</td>
            <td>get</td>
        </tr>
        <tr>
            <td>请求地址</td>
            <td>http://localhost/wechat/wechat-oauth</td>
        </tr>
        <tr>
            <td>数据返回格式</td>
            <td>url</td>
        </tr>
    </table>
    
    
###### 请求参数
 <table>
       无
    </table>
    
   ###### 返回数据示例
```
 {"openid":"oKWDbwG2mXYMHOzqyJoioreDFHhE","nickname":"KG"}
```
 ###### data参数说明
  <table>
        <tr>
            <td>参数</td>
            <td>类型</td>
            <td>说明</td>
            <td>示例</td>
        </tr>
        <tr>
            <td>openid</td>
            <td>string</td>
            <td>微信openid
            <td>xxxx</td>
        </tr>
        <tr>
            <td>nickname</td>
            <td>string</td>
            <td>微信昵称</td>
            <td>xxx</td>
        </tr>
                </table>
