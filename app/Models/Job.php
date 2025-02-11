<?php

namespace App\Models;

use \Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Arr;

class Job {
    public static function all(): array 
    {
        return [
            [
                'id' => 1,
                'title' => 'Director',
                'salary' => '$50,000'
            ],
            [
                'id' => 2,
                'title' => 'Programmer',
                'salary' => '$10,000'
            ],
            [
                'id' => 3,
                'title' => 'Teacher',
                'salary' => '$40,000'
            ]
        ];
    }

    /**
     * Get the job by id and may throw an exception.
     *
     * @throws NotFoundHttpException If no job is found
    */
    public static function findById(int $id): array {
        return Arr::first(static::all(), fn($job) => $job['id'] === $id) ?? abort(404);
    }
}