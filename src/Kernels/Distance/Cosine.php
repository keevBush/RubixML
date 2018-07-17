<?php

namespace Rubix\ML\Kernels\Distance;

use MathPHP\LinearAlgebra\Vector;

/**
 * Cosine
 *
 * Cosine Similarity is a measure that ignores the magnitude of the distance
 * between two vectors thus acting as strictly a judgement of orientation. Two
 * vectors with the same orientation have a cosine similarity of 1, two vectors
 * oriented at 90° relative to each other have a similarity of 0, and two
 * vectors diametrically opposed have a similarity of -1. To be used as a
 * distance function, we subtract the Cosine Similarity from 1 in order to
 * satisfy the positive semi-definite condition, therefore the Cosine distance
 * is a number between 0 and 2.
 *
 * @category    Machine Learning
 * @package     Rubix/ML
 * @author      Andrew DalPino
 */
class Cosine implements Distance
{
    /**
     * Compute the distance between two coordinates.
     *
     * @param  array  $a
     * @param  array  $b
     * @return float
     */
    public function compute(array $a, array $b) : float
    {
        $a = new Vector(array_values($a));
        $b = new Vector(array_values($b));

        return 1 - ($a->dotProduct($b) / ($a->length() * $b->length()));
    }
}