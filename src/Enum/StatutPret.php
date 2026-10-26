<?php

namespace App\Enum;

enum StatutPret: string {
    case EN_ATTENTE = "en attente";
    case REFUSE = "refusé";
    case EN_COURS = "en cours";
    case REMBOURSE = "remboursé";
}