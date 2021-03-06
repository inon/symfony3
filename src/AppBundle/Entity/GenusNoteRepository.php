<?php

namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * GenusRepository
 *
 * This class was generated by the PhpStorm "Php Annotations" Plugin. Add your own custom
 * repository methods below.
 */
class GenusNoteRepository extends EntityRepository
{

    public function findAllPublishedOrderedByRecentlyActive(Genus $genus)
    {
        return $this->createQueryBuilder('genus_note')
            ->andWhere('genus_note.genus = :genus')
            ->setParameter('genus', $genus)
            ->andWhere('genus_note.createdAt > :recentDate')
            ->setParameter('recentDate', new \DateTime('-3 months'))
            ->getQuery()
            ->execute();
    }
}
