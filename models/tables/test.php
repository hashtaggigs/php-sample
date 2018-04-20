<?php
/**
 * Created by Aaron C. Schafer.
 * User: aaron
 * Date: 4/19/2018
 * Time: 8:42 PM
 */
namespace PhpSample\Models\Tables\Test;

$common_secure = true; require_once('models/text/common.php'); unset($common_secure);

use PhpSample\Models\Text\Common\Common;

if (isset($test_secure) && $test_secure) {
    class Test {
        const NAME = 'name';
        const ID = 'id';

        public function NAME () {
            return self::NAME;
        }
        public function ID () {
            return self::ID;
        }
    }
} else {
    header('Location: ' . (new Common())->URL());
}