<?php
/**
 * Created by Aaron C. Schafer.
 * User: aaron
 * Date: 4/19/2018
 * Time: 5:05 PM
 */
namespace PhpSample\Models\Text;

$errors_secure = true; require_once('errors.php'); unset($errors_secure);
$common_secure = true; require_once('common.php'); unset($common_secure);

use PhpSample\Models\Text\Errors\Errors;
use PhpSample\Models\Text\Common\Common;

if (isset($text_secure) && $text_secure) {
    class Text {
        public function Errors () {
            return new Errors();
        }
        public function Common () {
            return new Common();
        }
    }
} else {
    header('Location: ' . (new Common())->URL());
}