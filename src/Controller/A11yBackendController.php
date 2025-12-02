<?php

    declare(strict_types=1);

    namespace Weba11y\ContaoA11yBundle\Controller;

    use Contao\CoreBundle\Controller\AbstractBackendController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;

    #[Route(
        path: '%contao.backend.route_prefix%/a11y-panel',
        name: 'weba11y_a11y_backend',
        defaults: ['_scope' => 'backend']
    )]
    class A11yBackendController extends AbstractBackendController
    {
        public function __invoke(): Response
        {
            return $this->render(
                '@Contao/weba11y_a11y_backend.html.twig',
                [
                    'title'     => 'WebA11y Tools',
                    'headline'  => 'WebA11y – Accessibility Tools',
                    'introText' => 'Hier kommen später deine Accessibility-Werkzeuge rein.',
                ]
            );
            
        }
    }
