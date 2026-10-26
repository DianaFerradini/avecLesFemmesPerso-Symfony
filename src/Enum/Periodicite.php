<?php

namespace App\Enum;

enum Periodicite: string {
    case HEBDOMADAIRE = "hebdomadaire";
    case BIMENSUEL = "bimensuel";
    case MENSUEL = "mensuel";
}