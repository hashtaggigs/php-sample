<?php if (session_id() === "") {session_start();}
/**
 * Created by Aaron C. Schafer.
 * User: aaron
 * Date: 4/18/2018
 * Time: 12:31 PM
 */

// Without knowing a lot about security, I used this technique to ensure all php files are executed via my php code and
// not manually invoked by a hacker. The 'require_once' file has a "if" statement to check if $db_secure is set and
// true, if not, I'm able do what I want, including by not limited to: sending email, logging error, redirecting user to
// home page, etc.
//
// The only issue with this technique, is that it is prone to typos.
//
// TODO: Looking for a better alternative, maybe look into file permissions.

$db_secure = true; require_once ('_area51db/db.php'); unset($db_secure);
$models_secure = true; require_once ('models/models.php'); unset($models_secure);

$models = new \PhpSample\Models\Models();

$db = new Db();
$rows = $db->select('SELECT ' . $models->Tables()->Test()->NAME() . ' FROM test');
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $models->Text()->Common()->HOME_PAGE_TITLE(); ?></title>
    <style>
        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1><?php echo $models->Text()->Common()->HOME_PAGE_TITLE(); ?></h1>
    <br />
    <h3>Names</h3>
    <ol>
        <?php
        foreach ($rows as $value) {
        ?>
        <li>
            <?php echo $value[$models->Tables()->Test()->NAME()]; ?>
        </li>
        <?php
        }
        ?>
    </ol>
</body>
</html>
<?php

unset($rows);
unset($models);
unset($db);
