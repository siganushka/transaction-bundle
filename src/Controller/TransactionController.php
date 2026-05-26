<?php

declare(strict_types=1);

namespace Siganushka\TransactionBundle\Controller;

use Knp\Component\Pager\PaginatorInterface;
use Siganushka\TransactionBundle\Dto\TransactionQueryDto;
use Siganushka\TransactionBundle\Repository\TransactionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapQueryString;

class TransactionController extends AbstractController
{
    public function __construct(private readonly TransactionRepository $transactionRepository)
    {
    }

    public function getCollection(PaginatorInterface $paginator, #[MapQueryString] TransactionQueryDto $dto): Response
    {
        $queryBuilder = $this->transactionRepository->createQueryBuilderByDto('t', $dto);
        $pagination = $paginator->paginate($queryBuilder);

        return $this->json($pagination, context: [
            'groups' => ['transaction.collection'],
        ]);
    }

    public function getItem(string $number): Response
    {
        $entity = $this->transactionRepository->findOneByNumber($number)
            ?? throw $this->createNotFoundException();

        return $this->json($entity, context: [
            'groups' => ['transaction.item'],
        ]);
    }
}
