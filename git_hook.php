<?php

try
{
  $payload = json_decode($_REQUEST['payload']);
}
catch(Exception $e)
{
  print "can't decode payload";
  exit(0);
}

file_put_contents('logs/git_hook.log', print_r($payload, TRUE), FILE_APPEND);

if ($payload->ref == 'refs/heads/master')
{
  print "update triggered";
  exec('./git_pull.sh');
} else {

}

?>
