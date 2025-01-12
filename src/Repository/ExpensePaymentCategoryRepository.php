<?php

namespace App\Repository;

use App\Entity\ExpensePaymentCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ExpensePaymentCategory>
 */
class ExpensePaymentCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExpensePaymentCategory::class);
    }

    public function save(ExpensePaymentCategory $expensePaymentCategory)
    {
        $this->getEntityManager()->persist($expensePaymentCategory);
        $this->getEntityManager()->flush();
    }

    public function selectAll(): iterable
    {
        $sql =
            'SELECT
                expensePaymentCategory, administrator
            FROM
                App\Entity\ExpensePaymentCategory expensePaymentCategory
            INNER JOIN
                expensePaymentCategory.administrator administrator'
        ;

        $query = $this->getEntityManager()->createQuery($sql);
        return $query->toIterable([], Query::HYDRATE_ARRAY);
    }
}
