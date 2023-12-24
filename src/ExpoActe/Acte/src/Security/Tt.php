<?php

namespace ExpoActe\Acte\Security;

class Tt
{
    public function menu_admin($root, $userlevel)
    {
        global $userlogin;
        $login = '&nbsp; &nbsp;&lt;' . $userlogin . '&gt;';

        echo '<div class="menu_zone">' . "\n";
        echo '<div class="menu_titre">Administration' . $login . '</div>' . "\n";
        echo '<div class="menuCorps"><dl>' . "\n";
        if ($userlevel >= 5) {
            echo '<dt><a href="' . $root . '/admin/index.php">Inventaire des actes</a></dt>' . "\n";
        }
        if ($userlevel >= CHANGE_PW) {
            echo '<dt><a href="' . $root . '/changepw.php">Changer le mot de passe</a></dt>' . "\n";
        }
        if ($userlevel >= 5) {
            echo '<dt><a href="' . $root . '/admin/charge.php">Charger des actes NIMEGUE</a></dt>' . "\n";
        }
        if ($userlevel >= 6) {
            echo '<dt><a href="' . $root . '/admin/chargecsv.php">Charger des actes CSV</a></dt>' . "\n";
        }
        if ($userlevel >= 5) {
            echo '<dt><a href="' . $root . '/admin/supprime.php">Supprimer des actes</a></dt>' . "\n";
            echo '<dt><a href="' . $root . '/admin/exporte.php">Réexporter des actes</a></dt>' . "\n";
        }
        if ($userlevel >= 7) {
            echo '<dt><a href="' . $root . '/admin/maj_sums.php">Administrer les données</a></dt>' . "\n";
        }
        if ($userlevel >= 9) {
            echo '<dt><a href="' . $root . '/admin/listusers.php">Administrer les utilisateurs</a></dt>' . "\n";
            echo '<dt><a href="' . $root . '/admin/gest_params.php">Administrer le logiciel</a></dt>' . "\n";
        }
        echo '<dt><a href="' . $root . '/admin/aide/aide.html">Aide</a></dt>' . "\n";
        echo '<dt><a href="' . $root . '/index.php?act=logout">Déconnexion</a></dt>' . "\n";
        echo '</dl></div>' . "\n";
        echo '</div>' . "\n";
    }
}
