<?php
/**
 * Created by Aaron C. Schafer.
 * User: aaron
 * Date: 4/19/2018
 * Time: 1:03 PM
 */
namespace PhpSample\Models;

$text_secure = true; require_once('text/text.php'); unset($text_secure);
$tables_secure = true; require_once('tables/tables.php'); unset($tables_secure);

use PhpSample\Models\Text\Common\Common;
use PhpSample\Models\Text\Text;
use PhpSample\Models\Tables\Tables;

if (isset($models_secure) && $models_secure) {
    class Models {
        public function Text () {
            return new Text();
        }
        public function Tables () {
            return new Tables();
        }
    }
} else {
    $error_secure = true; require_once('text/errors.php'); unset($error_secure);

    header('Location: ' . (new Common())->URL());
}