<?php

namespace Heyday\CacheInclude\Configs;

use CacheCache\Cache;
use Symfony\Component\Yaml\Yaml;

/**
 * Class YamlConfig
 * @package Heyday\CacheInclude\Configs
 */
class YamlConfig extends ArrayConfig
{
    /**
     * @param       $yaml
     * @param Cache $cache
     */
    public function __construct($yaml, Cache $cache = null)
    {
        if ($cache instanceof Cache) {
            if (!($result = $cache->load(md5($yaml)))) {
                $cache->save($result = Yaml::parse($yaml));
            }
        } else {
            $result = Yaml::parse($yaml);
        }
        parent::__construct($result);
    }
}
