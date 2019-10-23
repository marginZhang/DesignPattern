<?php
//工厂模式

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

abstract class CommsManager {
    abstract function getHeaderText();
    abstract function getAppEncoder();
    abstract function getFooterText();
}

class BloggsCommsManager extends CommsManager {
    function getHeaderText()
    {
        // TODO: Implement getHeaderText() method.
        return "BloggsCal header\n";
    }

    function getAppEncoder()
    {
        // TODO: Implement getAppEncoder() method.
        return new BloggsAppEncoder();
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
        return "MegaCal header\n";
    }

    function getAppEncoder()
    {
        // TODO: Implement getAppEncoder() method.
        return new MegaAppEncoder();
    }

    function getFooterText()
    {
        // TODO: Implement getFooterText() method.
        return "MegaCal footer\n";
    }
}

$bloggsObj = new BloggsCommsManager();
$msg = $bloggsObj->getAppEncoder()->encode();
echo $msg;

$megaObj = new MegaCommsManager();
$msg = $megaObj->getAppEncoder()->encode();
echo $msg;


