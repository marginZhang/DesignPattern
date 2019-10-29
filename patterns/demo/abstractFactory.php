<?php
//抽象工厂模式

/**
 * Class ApptEncoder
 * 预约
 */
abstract class ApptEncoder {
    abstract function encode();
}
/**
 * Class TtdEncoder
 * 待办事项
 */
abstract class TtdEncoder {
    abstract function encode();
}
/**
 * Class ContactEncoder
 * 联系人
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
 * Mega格式
 * Class ApptEncoder
 */
class MegaApptEncoder extends ApptEncoder {
    function encode() {
        return "Appointment data encode in MegaApptEncoder\n";
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
 * Mega格式
 * Class TtdEncoder
 */
class MegaTtdEncoder extends TtdEncoder {
    function encode() {
        return "Appointment data encode in MegaTtdEncoder\n";
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
/**
 * Mega格式
 * Class ContactEncoder
 */
class MegaContactEncoder extends ContactEncoder {
    function encode() {
        return "Appointment data encode in MegaContactEncoder\n";
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

class MegaCommsManager extends CommsManager {
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
                return new MegaApptEncoder();
                break;
            case self::TTD:
                return new MegaTtdEncoder();
                break;
            case self::CONTANT:
                return new MegaContactEncoder();
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
echo $msg . "\n";


$megaObj = new MegaCommsManager();
$msg = $megaObj->make($megaObj::CONTANT)->encode();
echo $msg . "\n";





