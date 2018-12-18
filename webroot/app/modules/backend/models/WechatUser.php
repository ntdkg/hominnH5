<?php

namespace app\modules\backend\models;
use yii\data\Pagination;

use Yii;

/**
 * This is the model class for table "tbl_wechat_user".
 *
 * @property string $wechat_user_id  微信用户在我们系统中的标识
 * @property string $user_id  CRM系统中的UserID
 * @property string $user_open_id 用户在微信上的标识号
 * @property string $user_union_id
 * @property int $gender 用户的性别
 * @property string $user_nickname 用户的微信昵称
 * @property string $remark 用户备注
 * @property string $country 用户所在国家
 * @property string $province 用户所在省
 * @property string $city 用户所在城市
 * @property string $group_id 用户所在的分组ID
 * @property string $tagid_list 用户被打上的标签ID列表
 * @property string $language 用户的语言，简体中文为zh_CN
 * @property int $subscribe 是否关注1：关注，0：取消关注
 * @property string $subscribe_time 关注时间
 * @property string $subscribe_scene 用户关注的渠道来源
 * @property int $qr_scene 二维码扫码场景（开发者自定义）
 * @property string $qr_scene_str 二维码扫码场景描述（开发者自定义）
 * @property int $is_bind
 * @property int $bind_date
 * @property string $head_img_url
 * @property int $create_at
 */
class WechatUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_wechat_user';
    }


    public function behaviors()
    {
        return [
            'audit' => [
                'class' => 'bedezign\yii2\audit\AuditTrailBehavior',

                'active' => true,
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_open_id', 'create_at'], 'required'],
            [['gender', 'group_id', 'subscribe', 'subscribe_time', 'qr_scene', 'is_bind', 'bind_date', 'create_at'], 'integer'],
            [['user_open_id'], 'string', 'max' => 200],
            [['user_union_id'], 'string', 'max' => 50],
            [['user_nickname'], 'string', 'max' => 800],
            [['remark', 'country', 'province', 'city', 'qr_scene_str'], 'string', 'max' => 100],
            [['tagid_list'], 'string', 'max' => 125],
            [['language'], 'string', 'max' => 10],
            [['subscribe_scene'], 'string', 'max' => 25],
            [['head_img_url'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'wechat_user_id' => 'Wechat User ID',
            'user_open_id' => 'User Open ID',
            'user_union_id' => 'User Union ID',
            'gender' => 'Gender',
            'user_nickname' => 'User Nickname',
            'remark' => 'Remark',
            'country' => 'Country',
            'province' => 'Province',
            'city' => 'City',
            'group_id' => 'Group ID',
            'tagid_list' => 'Tagid List',
            'language' => 'Language',
            'subscribe' => 'Subscribe',
            'subscribe_time' => 'Subscribe Time',
            'subscribe_scene' => 'Subscribe Scene',
            'qr_scene' => 'Qr Scene',
            'qr_scene_str' => 'Qr Scene Str',
            'is_bind' => 'Is Bind',
            'bind_date' => 'Bind Date',
            'head_img_url' => 'Head Img Url',
            'create_at' => 'Create At',
        ];
    }

    public static function afterSubscribe($userInfo){

        static ::saveUserInfo($userInfo);
        /*$weChatUser = WechatUser::find()->where(['user_open_id' => $userInfo['openid']])->one();
        if($weChatUser){


            $weChatUser->user_union_id = !empty($userInfo['unionid']) ? $userInfo['unionid'] : '';
            $weChatUser->head_img_url = !empty($userInfo['headimgurl']) ? $userInfo['headimgurl'] : '';
            $weChatUser->gender = !empty($userInfo['sex']) ? $userInfo['sex'] : 0;
            $weChatUser->user_nickname = !empty($userInfo['nickname']) ? $userInfo['nickname'] : '';
            $weChatUser->remark = !empty($userInfo['remark']) ? $userInfo['remark'] : '';
            $weChatUser->country = !empty($userInfo['country']) ? $userInfo['country'] : '';
            $weChatUser->province = !empty($userInfo['province']) ? $userInfo['province'] : '';
            $weChatUser->city = !empty($userInfo['city']) ? $userInfo['city'] : '';
            $weChatUser->group_id = !empty($userInfo['groupid']) ? $userInfo['groupid'] : 0;
            $weChatUser->tagid_list = !empty($userInfo['tagid_list']) ? $userInfo['tagid_list'] : '';
            $weChatUser->language = !empty($userInfo['language']) ? $userInfo['language'] : '';
            $weChatUser->subscribe = !empty($userInfo['subscribe']) ? $userInfo['subscribe'] : 0;
            $weChatUser->subscribe_time = !empty($userInfo['subscribe_time']) ? $userInfo['subscribe_time'] : 0;
            $weChatUser->subscribe_scene = !empty($userInfo['subscribe_scene']) ? $userInfo['subscribe_scene'] : '';
            $weChatUser->qr_scene = !empty($userInfo['qr_scene']) ? $userInfo['qr_scene'] : 0;
            $weChatUser->qr_scene_str = !empty($userInfo['qr_scene_str']) ? $userInfo['qr_scene_str'] : '';
            $weChatUser->save();
            return $weChatUser;

        }else{

            $model = new WechatUser();
            $model->user_open_id = !empty($userInfo['openid']) ? $userInfo['openid'] : 0;
            $model->user_union_id = !empty($userInfo['unionid']) ? $userInfo['unionid'] : '';
            $model->head_img_url = !empty($userInfo['headimgurl']) ? $userInfo['headimgurl'] : '';
            $model->gender = !empty($userInfo['sex']) ? $userInfo['sex'] : 0;
            $model->user_nickname = !empty($userInfo['nickname']) ? $userInfo['nickname'] : '';
            $model->remark = !empty($userInfo['remark']) ? $userInfo['remark'] : '';
            $model->country = !empty($userInfo['country']) ? $userInfo['country'] : '';
            $model->province = !empty($userInfo['province']) ? $userInfo['province'] : '';
            $model->city = !empty($userInfo['city']) ? $userInfo['city'] : '';
            $model->group_id = !empty($userInfo['groupid']) ? $userInfo['groupid'] : 0;
            $model->tagid_list = !empty($userInfo['tagid_list']) ? $userInfo['tagid_list'] : '';
            $model->language = !empty($userInfo['language']) ? $userInfo['language'] : '';
            $model->subscribe = !empty($userInfo['subscribe']) ? $userInfo['subscribe'] : 0;
            $model->subscribe_time = !empty($userInfo['subscribe_time']) ? $userInfo['subscribe_time'] : 0;
            $model->subscribe_scene = !empty($userInfo['subscribe_scene']) ? $userInfo['subscribe_scene'] : '';
            $model->qr_scene = !empty($userInfo['qr_scene']) ? $userInfo['qr_scene'] : 0;
            $model->qr_scene_str = !empty($userInfo['qr_scene_str']) ? $userInfo['qr_scene_str'] : '';
            $model->create_at = time();
            $model->save();
            return $model;



        }*/
    }

    public static function afterUnSubscribe($message){

        $weChatUser = WechatUser::find()->where(['user_open_id' => $message['FromUserName']])->one();
        if($weChatUser){

            $weChatUser->subscribe = 0;
            $weChatUser->subscribe_time = !empty($message['CreateTime']) ? $message['CreateTime'] : 0;
            $weChatUser->save();
            return $weChatUser;

        }else{
            return NULL;
        }
    }




    public static function saveUserInfo($userInfo){


        $weChatUser = WechatUser::find()->where(['user_open_id' => $userInfo['openid']])->one();
        if($weChatUser){

            $weChatUser->user_union_id = !empty($userInfo['unionid']) ? $userInfo['unionid'] : '';
            $weChatUser->head_img_url = !empty($userInfo['headimgurl']) ? $userInfo['headimgurl'] : '';
            $weChatUser->gender = !empty($userInfo['sex']) ? $userInfo['sex'] : 0;
            $weChatUser->user_nickname = !empty($userInfo['nickname']) ? $userInfo['nickname'] : '';
            $weChatUser->remark = !empty($userInfo['remark']) ? $userInfo['remark'] : '';
            $weChatUser->country = !empty($userInfo['country']) ? $userInfo['country'] : '';
            $weChatUser->province = !empty($userInfo['province']) ? $userInfo['province'] : '';
            $weChatUser->city = !empty($userInfo['city']) ? $userInfo['city'] : '';
            $weChatUser->group_id = !empty($userInfo['groupid']) ? $userInfo['groupid'] : 0;
            $weChatUser->tagid_list = !empty($userInfo['tagid_list']) ? $userInfo['tagid_list'] : '';
            $weChatUser->language = !empty($userInfo['language']) ? $userInfo['language'] : '';
            $weChatUser->subscribe = !empty($userInfo['subscribe']) ? $userInfo['subscribe'] : 0;
            $weChatUser->subscribe_time = !empty($userInfo['subscribe_time']) ? $userInfo['subscribe_time'] : 0;
            $weChatUser->subscribe_scene = !empty($userInfo['subscribe_scene']) ? $userInfo['subscribe_scene'] : '';
            $weChatUser->qr_scene = !empty($userInfo['qr_scene']) ? $userInfo['qr_scene'] : 0;
            $weChatUser->qr_scene_str = !empty($userInfo['qr_scene_str']) ? $userInfo['qr_scene_str'] : '';
            $weChatUser->save();
            return $weChatUser;

        }else{
            $model = new WechatUser();
            $model->user_open_id = !empty($userInfo['openid']) ? $userInfo['openid'] : 0;
            $model->user_union_id = !empty($userInfo['unionid']) ? $userInfo['unionid'] : '';
            $model->head_img_url = !empty($userInfo['headimgurl']) ? $userInfo['headimgurl'] : '';
            $model->gender = !empty($userInfo['sex']) ? $userInfo['sex'] : 0;
            $model->user_nickname = !empty($userInfo['nickname']) ? $userInfo['nickname'] : '';
            $model->remark = !empty($userInfo['remark']) ? $userInfo['remark'] : '';
            $model->country = !empty($userInfo['country']) ? $userInfo['country'] : '';
            $model->province = !empty($userInfo['province']) ? $userInfo['province'] : '';
            $model->city = !empty($userInfo['city']) ? $userInfo['city'] : '';
            $model->group_id = !empty($userInfo['groupid']) ? $userInfo['groupid'] : 0;
            $model->tagid_list = !empty($userInfo['tagid_list']) ? $userInfo['tagid_list'] : '';
            $model->language = !empty($userInfo['language']) ? $userInfo['language'] : '';
            $model->subscribe = !empty($userInfo['subscribe']) ? $userInfo['subscribe'] : 0;
            $model->subscribe_time = !empty($userInfo['subscribe_time']) ? $userInfo['subscribe_time'] : 0;
            $model->subscribe_scene = !empty($userInfo['subscribe_scene']) ? $userInfo['subscribe_scene'] : '';
            $model->qr_scene = !empty($userInfo['qr_scene']) ? $userInfo['qr_scene'] : 0;
            $model->qr_scene_str = !empty($userInfo['qr_scene_str']) ? $userInfo['qr_scene_str'] : '';
            $model->create_at = time();
            $model->save();
            $user = new User();
            $user -> user_name = $model->user_nickname;
            $user -> create_time = time();
            if($user -> save()){
                $model->user_id = $user->id;
                $model->save();
            }
            return $model;
        }
    }



    public static function getNewWechatFansCount(){

        $beginToday = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
        $endToday = mktime(0, 0, 0, date('m'), date('d') + 1, date('Y')) - 1;

        $data = static::find()
            ->asArray()
            //->select('count(*) as count')
            ->where(['between', 'create_at', $beginToday, $endToday])
            ->count();

        return $data;
    }

    public static function getNewWechatFans(){

        $data = static::find()
                ->select('from_unixtime(subscribe_time)  subscribe_time,user_nickname')
                ->limit(8)
                ->orderBy('subscribe_time desc')
                ->asArray()
                ->all();

        return $data;
    }

}
