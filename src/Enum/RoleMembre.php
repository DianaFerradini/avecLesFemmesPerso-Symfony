<?php

namespace App\Enum;

enum RoleMembre: string {
    case PRESIDENTE = "présidente";
    case TRESORIERE = "trésorière";
    case SECRETAIRE = "secrétaire";
    case SIMPLE = "simple";
}