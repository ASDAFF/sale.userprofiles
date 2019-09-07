<?php
/**
 * Copyright (c) 7/9/2019 Created By/Edited By ASDAFF asdaff.asad@yandex.ru
 */

/**
 * @author Smotrov Dmitriy <dsxack@gmail.com>
 */

namespace WS\SaleUserProfiles;


class Module extends Singleton{
    const MODULE_ID = 'sale.userprofiles';

    private $_moduleDir;

    public function includeLangFile() {
        if (!file_exists($path = $this->getModuleDir() . "/lang/" . LANG . ".php")) {
            return false;
        }

        return $this->_includeLangArray(static::MODULE_ID, require $path);
    }

    private function _includeLangArray($prefix = "", $messages = array()) {
        global $MESS;

        foreach ($messages as $key => $message) {
            if (is_string($message)) {
                $MESS["{$prefix}_{$key}"] = $message;
            }
            if (is_array($message)) {
                $this->_includeLangArray("{$prefix}_{$key}", $message);
            }
        }

        return true;
    }

    public function getMessage($name) {
        return GetMessage(static::MODULE_ID . '_' . $name);
    }

    public function getModuleDir() {
        if (!$this->_moduleDir) {
            $this->_moduleDir = realpath(sprintf('%s/bitrix/modules/%s/', $_SERVER['DOCUMENT_ROOT'], static::MODULE_ID));
        }

        return $this->_moduleDir;
    }
} 