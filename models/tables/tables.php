<?php
/**
 * Created by Aaron C. Schafer.
 * User: aaron
 * Date: 4/19/2018
 * Time: 8:45 PM
 */
namespace PhpSample\Models\Tables;

$test_secure = true; require_once('test.php'); unset($test_secure);
$common_secure = true; require_once('models/text/common.php'); unset($common_secure);

use PhpSample\Models\Tables\Test\Test;
use PhpSample\Models\Text\Common\Common;

if (isset($tables_secure) && $tables_secure) {
    class Tables {
        public function Test () {
            return new Test();
        }
    }
} else {
    header('Location: ' . (new Common())->URL());
}