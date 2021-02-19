<?php
class TeambitionPan
{
    private $cookie;
    private $orgId;
    private $driveId;

    private $ch;

    public function __construct()
    {
        $this->ch = curl_init();
    }

    public function setCookie($cookie)
    {
        $this->cookie = $cookie;
    }

    public function setOrgId($orgId)
    {
        $this->orgId = $orgId;
    }

    public function setDriveId($driveId)
    {
        $this->driveId = $driveId;
    }

    public function getNode($node)
    {
        $api = "https://pan.teambition.com/pan/api/nodes";
        $params = array();
        $params['orgId'] = $this->orgId;
        $params['driveId'] = $this->driveId;

        $url = $api.'/'.$node.'?'.http_build_query($params);
        $r = $this->httpGet($url);
        $retObj = json_decode($r, true);
        if(!$retObj || !isset($retObj['id'])) return false;
        return $this->node2Item($retObj);
    }

    public function listNodes($parentId)
    {
        $api = "https://pan.teambition.com/pan/api/nodes";
        $params = array();
        $params['orgId'] = $this->orgId;
        $params['driveId'] = $this->driveId;
        $params['parentId'] = $parentId;
        $params['orderBy'] = 'updated_at';
        $params['orderDirection'] = 'DESC';
        $params['limit'] = '9999999999';
        $params['from'] = '';

        $url = $api.'?'.http_build_query($params);
        $r = $this->httpGet($url);
        $retObj = json_decode($r, true);
        if(!$retObj || !isset($retObj['data'])) return false;
        $ret = array();
        foreach($retObj['data'] as $node)
        {
            $ret[] = $this->node2Item($node);
        }
        return $ret;
    }

    private function node2Item($node)
    {
        $item = array();
        $item['nodeId'] = $node['nodeId'];
        $item['type'] = $node['kind'];
        $item['name'] = $node['name'];
        $item['created'] = strtotime($node['created']);
        $item['updated'] = strtotime($node['updated']);
        $item['parentId'] = $node['parentId'];

        if($node['kind'] == 'file')
        {
            $item['size'] = $node['size'];
            $item['ext'] = $node['ext'];
            $item['category'] = $node['category'];
            $item['downloadUrl'] = $node['downloadUrl'];
        }
        return $item;
    }

    private function httpGet($url)
    {
        curl_setopt($this->ch, CURLOPT_URL, $url);
        curl_setopt($this->ch, CURLOPT_COOKIE, $this->cookie);
        curl_setopt($this->ch, CURLOPT_TIMEOUT, 3000);
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($this->ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, false);
        $r = curl_exec($this->ch);
        return $r;
    }

    function __destruct()
    {
        curl_close($this->ch);
    }
}
