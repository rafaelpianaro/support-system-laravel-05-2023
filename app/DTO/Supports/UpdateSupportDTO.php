<?php

namespace App\DTO\Supports;

use App\Http\Requests\StoreUpdateSupport;

class UpdateSupportDTO
{
    public function __construct(
        public string $id,
        public string $subject,
        public string $status,
        public string $body,
    ) {}

    // recebendo a \request com um objeto da própria classe
    public static function makeFromRequest(StoreUpdateSupport $request): self
    {
        return new self(
            $request->id,
            $request->subject,
            // setando um valor default
            'pending',
            $request->body,
        );
    }
}