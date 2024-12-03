<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class TaskController
{
    private string $filePath;

    public function __construct()
    {
        $this->filePath = __DIR__ . '/../../data/tasks.json';

        if (!file_exists($this->filePath)) {
            file_put_contents($this->filePath, json_encode([]));
        }
    }

    public function list(): JsonResponse
    {
        $tasks = json_decode(file_get_contents($this->filePath), true);
        return new JsonResponse($tasks);
    }

    public function create(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        if (empty($data['title']) || empty($data['description'])) {
            return new JsonResponse(['error' => 'Title and description are required'], 400);
        }

        $tasks = json_decode(file_get_contents($this->filePath), true);

        $newTask = [
            'id' => uniqid(),
            'title' => $data['title'],
            'description' => $data['description'],
            'status' => $data['status'] ?? 'todo',
            'created_at' => (new \DateTime())->format('Y-m-d H:i:s'),
            'updated_at' => (new \DateTime())->format('Y-m-d H:i:s'),
        ];

        $tasks[] = $newTask;

        file_put_contents($this->filePath, json_encode($tasks));

        return new JsonResponse($newTask, 201);
    }
}