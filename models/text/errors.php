<?php
/**
 * Created by Aaron C. Schafer.
 * User: aaron
 * Date: 4/19/2018
 * Time: 1:04 PM
 */
namespace PhpSample\Models\Text\Errors;

$common_secure = true;
require_once('common.php');
unset($common_secure);

use PhpSample\Models\Text\Common\Common;

if (isset($errors_secure) && $errors_secure) {
    class Errors {
        const INVALID_PAGE_LOAD = 'Invalid page load. Please use links and buttons to get around the site.';
        const INVALID_USERNAME = 'Invalid username';

        public function INVALID_PAGE_LOAD () {
            return self::INVALID_PAGE_LOAD;
        }

        public function INVALID_USERNAME () {
            return self::INVALID_USERNAME;
        }
    }
} else {
    header('Location: '. Common::URL);
}