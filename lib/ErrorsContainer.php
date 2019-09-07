<?php
/**
 * Copyright (c) 7/9/2019 Created By/Edited By ASDAFF asdaff.asad@yandex.ru
 */

namespace WS\SaleUserProfiles;


class ErrorsContainer extends Object{
    public $errors = array();

    function addErrorString($message) {
        $this->errors[] = $message;
        return $this;
    }

    function getErrorsAsString() {
        if (!empty($this->errors)) {
            return implode("\n", $this->errors);
        }
        return false;
    }
}