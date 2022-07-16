<?php declare(strict_types=1);

namespace SwagBasicExample\Storefront\Controller;

use Shopware\Core\Framework\Routing\Annotation\RouteScope;
use Shopware\Core\System\SalesChannel\SalesChannelContext;
use Shopware\Storefront\Controller\StorefrontController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Shopware\Core\Framework\DataAbstractionLayer\EntityRepositoryInterface;
/**
 * @RouteScope(scopes={"storefront"})
 */
class ExampleController extends StorefrontController
{
    public $swagExampleRepository;
    public function __construct(EntityRepositoryInterface $swagExampleRepository)
    {
        $this->swagExampleRepository = $swagExampleRepository;
    }
    /**
     * @Route("/example", name="frontend.example.example", methods={"GET"})
     */
    public function showExample(): Response
    {
        return $this->renderStorefront('@SwagBasicExample/storefront/page/example/index.html.twig', [
            'example' => 'Hello world'
        ]);
    }

    /**
     * @Route("/add-appointment", name="add-appointment", methods={"Post"})
     */
    public function addAppointment(Request $request,SalesChannelContext $context): Response
    {
        // dd($context);
        $result=$this->swagExampleRepository->create([
        [
            'name' => $request->request->get('name'),
            'type' => $request->request->get('type'),
            'firstName' => $request->request->get('first_name'),
            'email' => $request->request->get('email'),
            'phone' => $request->request->get('phone'),
            'pickDate' => $request->request->get('pick_date')
        ]
    ], $context);
    if($result){
        dd('ok');
    }
    else{
        dd('error');
    }

    }
}
