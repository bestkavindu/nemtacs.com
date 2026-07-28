<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $name
 * @property string|null $company
 * @property string $email
 * @property string|null $phone
 * @property string|null $subject
 * @property string $message
 * @property string|null $ip_address
 * @property Carbon|null $read_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
#[Fillable(['name', 'company', 'email', 'phone', 'subject', 'message', 'ip_address', 'read_at'])]
class Enquiry extends Model
{
    /**
     * @var string
     */
    protected $table = 'enquiries';

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'read_at' => 'datetime',
        ];
    }
}
