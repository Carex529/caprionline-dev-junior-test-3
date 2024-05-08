<?php

namespace App\Repository;

use App\Entity\Movie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Movie>
 *
 * @method Movie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Movie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Movie[]    findAll()
 * @method Movie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MovieRepository extends ServiceEntityRepository
{
    public function findAllSortedBy($orderBy)
    {
        switch ($orderBy) {
            case 'latest':
                return $this->createQueryBuilder('m')
                ->orderBy('m.releaseDate', 'DESC')
                ->getQuery()
                ->getResult();
            case 'rating':
                return $this->createQueryBuilder('m')
                ->orderBy('m.rating', 'DESC')
                ->getQuery()
                ->getResult();
            case 'genres':
                // Supponiamo che ce un metodo che restituisce i film ordinati per genere
                return $this->findByGenres();
            default:
                return $this->findAll(); //Restituisce tutti i film per impostazione predefinita
        }
    }

    //    /**
    //     * @return Movie[] Returns an array of Movie objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('m')
    //            ->andWhere('m.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('m.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Movie
    //    {
    //        return $this->createQueryBuilder('m')
    //            ->andWhere('m.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
