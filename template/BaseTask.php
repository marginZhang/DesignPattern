<?php
namespace Template;

abstract class BaseTask
{
    //各种方法
    const FUN_ADD = 'add'; //新增
    const FUN_EDIT = 'edit'; //编辑
    const FUN_APPROVAL = 'approval'; //审批
    const FUN_SIGN = 'sign'; //加签
    const FUN_REVOKE = 'revoke'; //撤回
    const FUN_REPEAL = 'repeal'; //作废

    final public function getAudit() : void
    {
        $this->checkParams();
        $this->changeAppStatus();
        $this->addNoticeTask();
        $this->switchCallBack();
    }

    //1.校验并获取必填业务参数
    protected function checkParams() : void
    {
        echo "1.校验并获取必填业务参数\n";
    }
    //2.根据审批动作更改状态
    abstract protected function changeAppStatus() : array;
    //3.通知人员
    abstract protected function addNoticeTask() : array;
    //4.返回审批流 - 同步接口/异步接口
    abstract protected function switchCallBack() : array;
}

class addApproval extends BaseTask
{
    protected $act = self::FUN_ADD;

    public function __construct()
    {
        echo "开始{$this->act}的流程\n";
    }

//    protected function checkParams(): array
//    {
//        // TODO: Implement addNoticeTask() method.
//        echo "1.校验并获取必填业务参数\n";
//        return [];
//    }

    protected function changeAppStatus(): array
    {
        // TODO: Implement changeAppStatus() method.
        echo "2.根据审批动作更改状态\n";
        return [];
    }

    protected function addNoticeTask(): array
    {
        // TODO: Implement addNoticeTask() method.
        echo "3.通知人员\n";
        return [];
    }

    protected function switchCallBack(): array
    {
        // TODO: Implement switchCallBack() method.
        echo "4.返回审批流\n";
        return [];
    }
}

// TODO class editApproval extends BaseTask
// TODO class editApproval extends BaseTask
// TODO class approvalApproval extends BaseTask
// TODO class signApproval extends BaseTask
// TODO class revokeApproval extends BaseTask
// TODO class repealApproval extends BaseTask

(new addApproval())->getAudit();
