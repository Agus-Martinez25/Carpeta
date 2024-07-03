<?php

use App\Controllers\ApiController;

return [
    'GET /api/users' => [ApiController::class, 'getUsers'],
    'GET /api/users/{id}' => [ApiController::class, 'getUser'],
    'POST /api/users' => [ApiController::class, 'createUser'],
    'PUT /api/users/{id}' => [ApiController::class, 'updateUser'],
    'DELETE /api/users/{id}' => [ApiController::class, 'deleteUser'],
];