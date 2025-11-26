<?php

    declare(strict_types=1);

    namespace Weba11y\ContaoA11yBundle\ContaoManager;

    use Contao\CoreBundle\ContaoCoreBundle;
    use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
    use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
    use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
    use Contao\ManagerPlugin\Routing\RoutingPluginInterface;
    use Symfony\Component\Config\Loader\LoaderResolverInterface;
    use Symfony\Component\HttpKernel\KernelInterface;
    use Weba11y\ContaoA11yBundle\ContaoA11yBundle;

    class Plugin implements BundlePluginInterface, RoutingPluginInterface
    {
        // Bundle laden (wie bisher)
        public function getBundles(ParserInterface $parser): array
        {
            return [
                BundleConfig::create(ContaoA11yBundle::class)
                    ->setLoadAfter([ContaoCoreBundle::class]),
            ];
        }

        // Routen des Bundles laden (Controller mit Attribut-Routing)
        public function getRouteCollection(LoaderResolverInterface $resolver, KernelInterface $kernel)
        {
            // Lädt alle Controller im Namespace Weba11y\ContaoA11yBundle\Controller
            return $resolver
                ->resolve(__DIR__.'/../Controller', 'attribute')
                ->load(__DIR__.'/../Controller')
                ;
        }
    }
