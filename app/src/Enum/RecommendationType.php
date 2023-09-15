<?php

namespace App\Enum;

enum RecommendationType: string
{
    case RANDOM = "random";
    case FIRST_LETTER_W_AND_EVEN_CHARACTERS = "first_letter_w_and_even_characters";
    case MULTI_WORD = "multi_word";
}
