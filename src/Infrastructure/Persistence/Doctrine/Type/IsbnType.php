<?php
/**
 * @copyright Copyright (c) Vasil Dakov <http://vasildakov.com>
 */
namespace Infrastructure\Persistence\Doctrine\Type {

    use Doctrine\DBAL\Types\Type;
    use Doctrine\DBAL\Platforms\AbstractPlatform;
    use Domain\ValueObject\Isbn\Isbn;

    class IsbnType extends Type
    {
        const NAME = 'isbn';

        /**
         * {@inheritdoc}
         */
        public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
        {
            return $platform->getGuidTypeDeclarationSQL($fieldDeclaration);
        }

        /**
         * {@inheritdoc}
         *
         * @param string|null                               $value
         * @param \Doctrine\DBAL\Platforms\AbstractPlatform $platform
         */
        public function convertToPHPValue($value, AbstractPlatform $platform)
        {
            if (empty($value)) {
                return null;
            }

            if ($value instanceof Isbn) {
                return $value;
            }

            try {
                $isbn = Isbn::fromString($value);
            } catch (InvalidArgumentException $e) {
                throw ConversionException::conversionFailed($value, self::NAME);
            }

            return $isbn;
        }


        /**
         * {@inheritdoc}
         *
         * @param Isbn|null                                 $value
         * @param \Doctrine\DBAL\Platforms\AbstractPlatform $platform
         */
        public function convertToDatabaseValue($value, AbstractPlatform $platform)
        {
            if (empty($value)) {
                return null;
            }
            if ($value instanceof Isbn || Isbn::isValid($value)) {
                return (string) $value;
            }
            throw ConversionException::conversionFailed($value, self::NAME);
        }


        /**
         * {@inheritdoc}
         */
        public function getDefaultLength(AbstractPlatform $platform)
        {
            return $platform->getVarcharDefaultLength();
        }

        /**
         * {@inheritdoc}
         */
        public function getName()
        {
            return self::NAME;
        }
    }
}