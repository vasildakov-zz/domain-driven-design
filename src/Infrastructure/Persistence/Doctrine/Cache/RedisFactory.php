<?php
/**
 * @see http://docs.doctrine-project.org/projects/doctrine-orm/en/latest/reference/caching.html
 */
namespace Infrastructure\Persistence\Doctrine\Cache {

    use Interop\Container\ContainerInterface;
    use Doctrine\Common\Cache\RedisCache;

    final class RedisFactory
    {
        /**
         * @param  ContainerInterface $container
         * @return RedisCache
         */
        public function __invoke(ContainerInterface $container): RedisCache
        {
            if (class_exists(\Redis::class)){
                throw new \Exception("Redis is not loaded");
            }

            $redis = new \Redis();
            $redis->connect('redis_host', 6379);

            $driver = new RedisCache();
            $driver->setRedis($redis);

            return $driver;
        }
    }
}
