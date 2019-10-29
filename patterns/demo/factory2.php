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

    function getHeadText() {
        switch ($this->mode) {
            case self::BLOGGS:
                return "BloggsCal header\n";
                break;
            default:
                return "MegaCal header\n";
                break;
        }
    }

    function getApptEncoder() {
        switch ($this->mode) {
            case self::BLOGGS:
                return new MegaAppEncoder();
                break;
            default:
                return new BloggsAppEncoder();
                break;
        }
    }
}

$comms = new CommsManger(CommsManger::MEGA);
$apptHeader = $comms->getHeadText();
print_r($apptHeader);
$apptEncoder = $comms->getApptEncoder();
print_r($apptEncoder->encode());