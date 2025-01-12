<?php

namespace App\Repository;

use App\Entity\ExpenseCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ExpenseCategory>
 */
class ExpenseCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExpenseCategory::class);
    }

    public function save(ExpenseCategory $expenseCategory)
    {
        $this->getEntityManager()->persist($expenseCategory);
        $this->getEntityManager()->flush();
    }

    public function selectAll(): iterable
    {
        $sql =
            'SELECT
                expenseCategory, administrator
            FROM
                App\Entity\ExpenseCategory expenseCategory
            INNER JOIN
                expenseCategory.administrator administrator'
        ;

        $query = $this->getEntityManager()->createQuery($sql);

        return $query->toIterable([], Query::HYDRATE_ARRAY);
    }
}
