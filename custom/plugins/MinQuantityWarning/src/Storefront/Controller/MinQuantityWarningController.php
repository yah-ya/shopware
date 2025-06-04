<?php declare(strict_types=1);

namespace MinQuantityWarning\Storefront\Controller;

use Shopware\Core\Framework\Routing\Annotation\RouteScope;
use Shopware\Core\System\SalesChannel\SalesChannelContext;
use Shopware\Storefront\Controller\StorefrontController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @RouteScope(scopes={"storefront"})
 */
class MinQuantityWarningController extends StorefrontController
{
    /**
     * @Route("/min-quantity-warning/check", name="frontend.min-quantity-warning.check", methods={"POST"}, defaults={"XmlHttpRequest"=true})
     */
    public function checkQuantity(Request $request, SalesChannelContext $context): Response
    {
        $quantity = (int) $request->request->get('quantity', 1);
        $productId = $request->request->get('productId');

        // Get minimum quantity from your service
        $minQuantity = 5; // Replace with your actual service call

        return $this->renderStorefront('@MinQuantityWarning/storefront/min-quantity-warning.html.twig', [
            'quantity' => $quantity,
            'minQuantity' => $minQuantity,
            'showWarning' => $quantity < $minQuantity
        ]);
    }
} 