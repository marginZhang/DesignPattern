<?php
//抽象工厂模式

/**
 * Class AppEncoder
 * 编码器
 */
abstract class ApptEncoder {
    abstract function encode();
}
/**
 * Class AppEncoder
 * 编码器
 */
abstract class TtdEncoder {
    abstract function encode();
}
/**
 * Class AppEncoder
 * 编码器
 */
abstract class ContactEncoder {
    abstract function encode();
}

/**
 * bloggs格式
 * Class ApptEncoder
 */
class BloggsApptEncoder extends ApptEncoder {
    function encode() {
        return "Appointment data encode in BloggsApptEncoder\n";
    }
}

/**
 * bloggs格式
 * Class TtdEncoder
 */
class BloggsTtdEncoder extends TtdEncoder {
    function encode() {
        return "Appointment data encode in BloggsTtdEncoder\n";
    }
}

/**
 * bloggs格式
 * Class ContactEncoder
 */
class BloggsContactEncoder extends ContactEncoder {
    function encode() {
        return "Appointment data encode in BloggsContactEncoder\n";
    }
}

abstract class CommsManager {
    const APPT = 1;
    const TTD = 2;
    const CONTANT = 3;
    abstract function getHeaderText();
    abstract function make($flagInt);
    abstract function getFooterText();
}

class BloggsCommsManager extends CommsManager {
    function getHeaderText()
    {
        // TODO: Implement getHeaderText() method.
        return "BloggsCal header\n";
    }

    function make($flagInt)
    {
        // TODO: Implement getAppEncoder() method.
        switch ($flagInt) {
            case self::APPT:
                return new BloggsApptEncoder();
                break;
            case self::TTD:
                return new BloggsTtdEncoder();
                break;
            case self::CONTANT:
                return new BloggsContactEncoder();
                break;
            default:
                return false;
                break;
        }
    }

    function getFooterText()
    {
        // TODO: Implement getFooterText() method.
        return "BloggsCal footer\n";
    }
}

$bloggsObj = new BloggsCommsManager();
$msg = $bloggsObj->make($bloggsObj::TTD)->encode();
echo $msg;




