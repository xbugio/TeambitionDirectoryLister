<?php
define('__FILENAME__', basename(__FILE__));
include 'resources/config.php';
include 'resources/function.php';
include 'resources/teambition.php';

$nodeId = $_GET['nodeId']??'';
if(empty($nodeId)) $nodeId = TEAMBITION_ROOT_NODEID;

$tb = new TeambitionPan;
$tb->setCookie(TEAMBITION_COOKIE);
$tb->setOrgId(TEAMBITION_ORGID);
$tb->setDriveId(TEAMBITION_DRIVEID);

$node = $tb->getNode($nodeId);
if(!$node) die('node not exists');
if($node['type'] == 'file')
{
    header('Location: '.$node['downloadUrl']);
    die;
}
$nodeName = $node['name'];

$nodes = $tb->listNodes($nodeId);
if(!is_array($nodes)) die('node not exists');

if($nodeId != TEAMBITION_ROOT_NODEID && $node['parentId'] != 'root')
{
    $node['name'] = '..';
    $node['nodeId'] = $node['parentId'];
    array_unshift($nodes, $node);
}

foreach($nodes as &$_node)
{
    $_node['link'] = './'. (REWRITE_MODE?'':__FILENAME__.'?nodeId=') . $_node['nodeId'];
    $_node['updated'] = date('Y-m-d H:i:s', $_node['updated']);
    $_node['size'] = humanSize($_node['size']);
}

include THEMEPATH . '/index.php';