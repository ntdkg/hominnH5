<?php
namespace app\commands;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        // 添加 "userList" 权限
        $userList = $auth->createPermission('userList');
        $userList->description = '创建用户';
        $auth->add($userList);
        // 添加 "userDetail" 权限
        $userDetail = $auth->createPermission('userDetail');
        $userDetail->description = '用户详情';
        $auth->add($userDetail);
        // 添加 "messageList" 权限
        $messageList = $auth->createPermission('messageList');
        $messageList->description = '消息列表';
        $auth->add($messageList);



        // 添加 "userAdmin" 角色并赋予 "updateUser" “deleteUser” “viewUser”
        $userAdmin = $auth->createRole('userAdmin');
        $userAdmin->description = '会员管理员';
        $auth->add($userAdmin);
        $auth->addChild($userAdmin, $userList);
        $auth->addChild($userAdmin, $userDetail);

        // 添加 "messageAdmin" 角色并赋予  “messageList”
        $messageAdmin = $auth->createRole('messageAdmin');
        $messageAdmin->description = '消息管理员';
        $auth->add($messageAdmin);
        $auth->addChild($messageAdmin, $messageList);
        $auth->addChild($userAdmin, $messageList);

        // 添加 "admin" 角色并赋予所有其他角色拥有的权限
        $admin = $auth->createRole('admin');
        $admin->description = '系统管理员';
        $auth->add($admin);
        $auth->addChild($admin, $userAdmin);
        $auth->addChild($admin, $messageAdmin);


        // 为用户指派角色。其中 1 和 2 是由 IdentityInterface::getId() 返回的id （译者注：user表的id）
        // 通常在你的 User 模型中实现这个函数。
        $auth->assign($admin, 1);
        $auth->assign($userAdmin, 2);
        $auth->assign($messageAdmin, 3);
    }}