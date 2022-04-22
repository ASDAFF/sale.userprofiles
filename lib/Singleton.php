<?php
/**
 * Copyright (c) 7/9/2019 Created By/Edited By ASDAFF asdaff.asad@yandex.ru
 */

namespace WS\SaleUserProfiles;


class Singleton extends СObject{
    private static $_instances = array();

    /**
     * @return $this
     */
    static public function get() {
        $className = get_called_class();

        if (!isset(self::$_instances[$className])) {
            self::$_instances[$className] = new $className;
        }

        return self::$_instances[$className];
    }
} 