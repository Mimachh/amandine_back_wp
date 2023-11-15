<?php
/**
 * @copyright © TMS-Plugins. All rights reserved.
 * @licence   See COPYING.md for license details.
 */

namespace AmeliaBooking\Infrastructure\API\ApiRoutes\Bookable;

use AmeliaBooking\Application\Controller\Bookable\Package\AddPackageController;
use AmeliaBooking\Application\Controller\Bookable\Package\AddPackageCustomerController;
use AmeliaBooking\Application\Controller\Bookable\Package\DeletePackageController;
use AmeliaBooking\Application\Controller\Bookable\Package\DeletePackageCustomerController;
use AmeliaBooking\Application\Controller\Bookable\Package\GetPackageDeleteEffectController;
use AmeliaBooking\Application\Controller\Bookable\Package\GetPackagesController;
use AmeliaBooking\Application\Controller\Bookable\Package\UpdatePackageController;
use AmeliaBooking\Application\Controller\Bookable\Package\UpdatePackageCustomerController;
use AmeliaBooking\Application\Controller\Bookable\Package\UpdatePackagesPositionsController;
use AmeliaBooking\Application\Controller\Bookable\Package\UpdatePackageStatusController;
use AmeliaBooking\Domain\ValueObjects\String\Status;
use AmeliaBooking\Infrastructure\API\Api;
use AmeliaBooking\Infrastructure\Common\Container;
use Slim\App;

/**
 * Class Package
 *
 * @package AmeliaBooking\Infrastructure\API\ApiRoutes\Bookable
 */
class Package
{
    /**
     * @param App $app
     */
    public static function routes(App $app, Container $container)
    {
        $app->get(
            '/api/v1/packages',
            function ($request, $response, $args) use ($container) {
                Api::callMainFunction($request, $response, $args, new GetPackagesController($container, true));
            }
        );

        $app->post(
            '/api/v1/packages',
            function ($request, $response, $args) use ($container) {
                $requestBody = $request->getParsedBody();
                if (empty($requestBody['calculatedPrice'])) {
                    $requestBody['calculatedPrice'] = true;
                }
                if (empty($requestBody['color'])) {
                    $requestBody['color'] = '#1788FB';
                }
                if (empty($requestBody['status'])) {
                    $requestBody['status'] = Status::VISIBLE;
                }
                if (empty($requestBody['discount'])) {
                    $requestBody['discount'] = 0;
                }
                if (empty($requestBody['quantity'])) {
                    $requestBody['quantity'] = 1;
                }
                if (empty($requestBody['depositPayment'])) {
                    $requestBody['depositPayment'] = 'disabled';
                }
                if (!isset($requestBody['deposit'])) {
                    $requestBody['deposit'] = 0;
                }
                if (empty($requestBody['position'])) {
                    $requestBody['position'] = 1;
                }
                if (empty($requestBody['position'])) {
                    $requestBody['position'] = 1;
                }
                if (empty($requestBody['description'])) {
                    $requestBody['description'] = '';
                }

                $request = $request->withParsedBody($requestBody);
                Api::callMainFunction($request, $response, $args, new AddPackageController($container, true));
            }
        );

        $app->post(
            '/api/v1/packages/delete/{id:[0-9]+}',
            function ($request, $response, $args) use ($container) {
                Api::callMainFunction($request, $response, $args, new DeletePackageController($container, true));
            }
        );

        $app->post(
            '/api/v1/packages/{id:[0-9]+}',
            function ($request, $response, $args) use ($container) {
                $getPackage = function () use ($container, $request, $args) {
                    return Api::getAllEntityFields($container->get('domain.bookable.package.repository'), $request, $args);
                };
                Api::callMainFunction($request, $response, $args, new UpdatePackageController($container, true), $getPackage);
            }
        );

        $app->get(
            '/api/v1/packages/effect/{id:[0-9]+}',
            function ($request, $response, $args) use ($container) {
                Api::callMainFunction($request, $response, $args, new GetPackageDeleteEffectController($container, true));
            }
        );

        $app->post(
            '/api/v1/packages/status/{id:[0-9]+}',
            function ($request, $response, $args) use ($container) {
                Api::callMainFunction($request, $response, $args, new UpdatePackageStatusController($container, true));
            }
        );

        $app->post(
            '/api/v1/packages/positions',
            function ($request, $response, $args) use ($container) {
                Api::callMainFunction($request, $response, $args, new UpdatePackagesPositionsController($container, true));
            }
        );

        $app->post(
            '/api/v1/packages/customers',
            function ($request, $response, $args) use ($container) {
                Api::callMainFunction($request, $response, $args, new AddPackageCustomerController($container, true));
            }
        );

        $app->post(
            '/api/v1/packages/customers/{id:[0-9]+}',
            function ($request, $response, $args) use ($container) {
                Api::callMainFunction($request, $response, $args, new UpdatePackageCustomerController($container, true));
            }
        );

        $app->post(
            '/api/v1/packages/customers/delete/{id:[0-9]+}',
            function ($request, $response, $args) use ($container) {
                Api::callMainFunction($request, $response, $args, new DeletePackageCustomerController($container, true));
            }
        );
    }
}
