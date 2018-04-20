<?php
/**
 * Created by Aaron C. Schafer.
 * User: aaron
 * Date: 4/19/2018
 * Time: 6:31 PM
 */
namespace PhpSample\Models\Text\Common;

const URL = 'http://localhost/php-sample';

if (isset($common_secure) && $common_secure) {
    class Common {
        const URL = URL;
        const HOME_PAGE_TITLE = 'PHP Sample';

        public function URL () {
            return self::URL;
        }
        public function HOME_PAGE_TITLE () {
            return self::HOME_PAGE_TITLE;
        }
    }
} else {
    header('Location: ' . URL);
}
