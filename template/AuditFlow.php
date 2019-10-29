<?php
namespace Template;

interface AuditFlow
{
    public function getApproval($auditFlow);
}

class ApprovalOne implements AuditFlow
{
    public function getApproval($auditFlow)
    {
        echo "单人审批后的审批流";
    }
}

class ApprovalSign implements AuditFlow
{
    public function getApproval($auditFlow)
    {
        echo "加签审批后的审批流";
    }
}


class ApprovalRandom implements AuditFlow
{
    public function getApproval($auditFlow)
    {
        echo "随机审批后的审批流";
    }
}


class ApprovalProjectOne implements AuditFlow
{
    public function getApproval($auditFlow)
    {
        echo "项目单人审批后的审批流";
    }
}


class ApprovalProjectSign implements AuditFlow
{
    public function getApproval($auditFlow)
    {
        echo "项目并行审批后的审批流";
    }
}

class getAuditFlow
{
    private $approval_mode;

    public function __construct($model)
    {
        $this->approval_mode = $model;
    }

    public function getFlow($auditFlow)
    {
        $this->approval_mode->getApproval($auditFlow);
    }
}

$model = new getAuditFlow(new ApprovalSign());
$model->getFlow('侯跃杰;康峰;王梦如');