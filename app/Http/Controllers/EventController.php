<?php

namespace App\Http\Controllers;

use App\Application\ProcessEvent;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function __invoke(Request $request, ProcessEvent $useCase)
    {
        $payload = $request->validate([
            'type' => ['required', 'string'],
            'origin' => ['nullable', 'string'],
            'destination' => ['nullable', 'string'],
            'amount' => ['nullable', 'numeric'],
        ]);

        $result = $useCase->handle($payload);

        return response()->json($result->payload, 201);
    }
}
