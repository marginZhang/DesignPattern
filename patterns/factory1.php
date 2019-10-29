<?php
/**
 * Class AppEncoder
 * 编码器
 */
abstract class AppEncoder {
    abstract function encode();
}

/**
 * bloggs格式
 * Class BloggsAppEncoder
 */
class BloggsAppEncoder extends AppEncoder {
    function encode() {
        return "Appointment data encode in BloggsCal format\n";
    }
}

class MegaAppEncoder extends AppEncoder {
    function encode() {
        return "Appointment data encode in MegaCal format\n";
    }
}

class CommsManger {
    const BLOGGS = 1;
    const MEGA = 2;
    private $mode = 1;

    function __construct($mode)
    {
        $this->mode = $mode;
    }

    function getApptEncoder() {
        switch ($this->mode) {
            case self::BLOGGS:
                return new BloggsAppEncoder();
                break;
            default:
                return new MegaAppEncoder();
                break;
        }
    }
}

$comms = new CommsManger(CommsManger::MEGA);
$apptEncoder = $comms->getApptEncoder();
print_r($apptEncoder->encode());