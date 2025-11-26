<?php

    declare(strict_types=1);

    namespace Weba11y\ContaoA11yBundle\EventListener;

    use Contao\CoreBundle\Event\ContaoCoreEvents;
    use Contao\CoreBundle\Event\MenuEvent;
    use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
    use Symfony\Component\HttpFoundation\RequestStack;
    use Weba11y\ContaoA11yBundle\Controller\A11yBackendController;

    #[AsEventListener(ContaoCoreEvents::BACKEND_MENU_BUILD, priority: -255)]
    class BackendMenuListener
    {
        public function __construct(
            private readonly RequestStack $requestStack,
        ) {
        }

        public function __invoke(MenuEvent $event): void
        {
            $factory = $event->getFactory();
            $tree    = $event->getTree();

            // Wir erweitern das Hauptmenü
            if ('mainMenu' !== $tree->getName()) {
                return;
            }

            // Kategorie "system" holen (neben Layout, Benutzer etc.)
            $systemNode = $tree->getChild('system');

            if (null === $systemNode) {
                return;
            }

            // Neuen Menüeintrag erstellen
            $node = $factory
                ->createItem('weba11y-tools', [
                    'route' => 'weba11y_a11y_backend', // Name aus #[Route(..., name: '...')]
                ])
                ->setLabel('WebA11y Tools')
                ->setLinkAttribute('title', 'WebA11y – Accessibility Tools')
                ->setLinkAttribute('class', 'weba11y-tools')
                ->setCurrent(
                    $this->requestStack->getCurrentRequest()?->attributes->get('_route') === 'weba11y_a11y_backend'
                )
            ;

            $systemNode->addChild($node);
        }
    }
