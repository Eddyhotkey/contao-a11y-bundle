<?php

    declare(strict_types=1);

    namespace Weba11y\ContaoA11yBundle;

    use Symfony\Component\DependencyInjection\ContainerBuilder;
    use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
    use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

    class ContaoA11yBundle extends AbstractBundle
    {
        public function loadExtension(
            array $config,
            ContainerConfigurator $containerConfigurator,
            ContainerBuilder $containerBuilder,
        ): void {
            // Lädt die Service-Konfiguration des Bundles
            $containerConfigurator->import('../config/services.yaml');
        }
    }
