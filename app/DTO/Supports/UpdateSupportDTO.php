<?php

namespace App\DTO\Supports;

use App\Enums\SupportStatus;
use App\Http\Requests\StoreUpdateSupport;

class UpdateSupportDTO
{
    public function __construct(
        public string $id,
        public string $subject,
        public SupportStatus $status,
        public string $body,
    ) {}

    // recebendo a \request com um objeto da própria classe
    public static function makeFromRequest(StoreUpdateSupport $request, string $id = null): self
    {
        return new self(
            $id ?? $request->id,
            $request->subject,
            // setando um valor default
            SupportStatus::Pending,
            $request->body,
        );
    }
}