<?php
/**
 * @see http://docs.doctrine-project.org/projects/doctrine-orm/en/latest/reference/caching.html
 */
namespace Infrastructure\Persistence\Doctrine\Cache {

    use Interop\Container\ContainerInterface;
    use Doctrine\Common\Cache\MemcacheCache;

    final class MemcacheFactory
    {
        /**
         * @param  ContainerInterface $container
         * @return MemcacheCache
         */
        public function __invoke(ContainerInterface $container): MemcacheCache
        {
            if (class_exists(\Memcache::class)){
                throw new \Exception("Memcache is not loaded");
            }

            $memcache = new \Memcache();
            $memcache->connect('memcache_host', 11211);

            $driver = new MemcacheCache();
            $driver->setMemcache($memcache);

            return $driver;
        }
    }
}
