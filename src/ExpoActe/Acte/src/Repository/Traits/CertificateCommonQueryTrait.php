<?php

namespace ExpoActe\Acte\Repository\Traits;

use Doctrine\DBAL\Exception;
use ExpoActe\Acte\Certificate\CertificateTypeEnum;

/**
 * Explication des éléments de la requête:
 *
 * SELECT: Définit les colonnes que vous souhaitez récupérer dans le résultat de la requête.
 *
 * COMMUNE, DEPART, '' as LIBELLE: Les colonnes de votre table que vous sélectionnez. '' as LIBELLE crée une colonne LIBELLE avec des valeurs vides.
 * COUNT(*) as ctot: Compte le nombre total de lignes dans le groupe.
 * DEPOSANT: La colonne DEPOSANT.
 * MAX(DTDEPOT) as ddepot: La date de dépôt maximale.
 * MIN(IF(YEAR(LADATE)>0, YEAR(LADATE), NULL)) as dmin: La date minimale où l'année de LADATE est supérieure à zéro.
 * MAX(YEAR(LADATE)) as dmax: L'année maximale de LADATE.
 * SUM(IF(LENGTH(CONCAT_WS('',P_PRE,M_NOM,M_PRE))>0,1,0)) as cfil: Compte le nombre de lignes où la concaténation de P_PRE, M_NOM, M_PRE a une longueur supérieure à zéro.
 * SUM(IF(YEAR(LADATE)>0,1,0)) as cnnul: Compte le nombre de lignes où l'année de LADATE est supérieure à zéro.
 * FROM: Spécifie la table à partir de laquelle les données doivent être récupérées (act_nai3).
 *
 * WHERE: Filtre les résultats pour inclure uniquement les lignes où la valeur de la colonne COMMUNE est égale à 'Achêne'.
 *
 * GROUP BY: Regroupe les résultats en fonction des colonnes spécifiées (COMMUNE, DEPART, LIBELLE, DEPOSANT).
 * Cela signifie que les agrégations (comme COUNT, MAX, MIN, SUM) seront calculées pour chaque groupe distinct défini par ces colonnes.
 *
 */
trait CertificateCommonQueryTrait
{
    /**
     * @param string $type
     * @param string $municipalityName
     * @return array
     * @throws Exception
     */
    public function statistics(string $type, string $municipalityName): array
    {
        $municipalityName = addslashes($municipalityName);
        $libel = match ($type) {
            CertificateTypeEnum::BIRTH->value, CertificateTypeEnum::DEATH->value, CertificateTypeEnum::MARRIAGE->value => ",'' as LIBELLE",
            CertificateTypeEnum::OTHER->value, CertificateTypeEnum::OTHER_SPECIAL->value => ",LIBELLE",
            default => '',
        };

        $tableName = $this->getClassMetadata()->table['name'];
        $sql = "SELECT certificate.commune, certificate.depart, certificate.deposant $libel, COUNT(*) AS ctot, 
        MAX(certificate.dtdepot) AS ddepot,
        MIN(CASE WHEN YEAR(certificate.ladate) > 0 THEN YEAR(certificate.ladate) ELSE NULL END) AS dmin, 
        MAX(YEAR(certificate.ladate)) AS dmax, 
        SUM(CASE WHEN LENGTH(CONCAT_WS('', certificate.p_pre, certificate.m_nom, certificate.m_pre)) > 0 THEN 1 ELSE 0 END) AS cfil,
        SUM(CASE WHEN YEAR(certificate.ladate) > 0 THEN 1 ELSE 0 END) AS cnnul 
        FROM $tableName certificate                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
        WHERE certificate.commune = '$municipalityName' GROUP BY certificate.commune, certificate.depart, certificate.deposant;";

        $conn = $this->getEntityManager()->getConnection();
        $resultSet = $conn->executeQuery($sql);

        return $resultSet->fetchAllAssociative();
    }

    public function findSurnameByDepartmentAndMunicipality(string $department, string $municipality): array
    {
        $queryBuilder = $this->createQb();

        return $queryBuilder
            ->select(
                $queryBuilder->expr()->substring(
                    'certificate.nom',
                    1,
                    1
                ).' as firstLetter, COUNT(distinct certificate.nom) as distinctCount, MIN(certificate.nom) as firstName, MAX(certificate.nom) as lastName'
            )
            ->andWhere('certificate.depart = :depart')
            ->setParameter('depart', $department)
            ->andWhere('certificate.commune = :municipality')
            ->setParameter('municipality', $municipality)
            ->groupBy('firstLetter')
            ->getQuery()
            ->getResult();
    }

}