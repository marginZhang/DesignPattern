<?php
//抽象工厂模式

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
        return "Appointment data encode in BloggsAppEncoder\n";
    }
}

/**
 * bloggs格式
 * Class BloggsAppEncoder
 */
class BloggsTtdEncoder extends AppEncoder {
    function encode() {
        return "Appointment data encode in BloggsTtdEncoder\n";
    }
}

/**
 * bloggs格式
 * Class BloggsAppEncoder
 */
class BloggsContactEncoder extends AppEncoder {
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
                return new BloggsAppEncoder();
                break;
            case self::TTD:
                return new BloggsTtdEncoder();
                break;
            case self::CONTANT:
                return new BloggsContactEncoder();
                break;
            default:
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
$msg = $bloggsObj->getAppEncoder()->encode();
echo $msg;




