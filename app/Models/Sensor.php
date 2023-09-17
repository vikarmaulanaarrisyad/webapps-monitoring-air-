<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sensor extends Model
{
    use HasFactory;
    protected $table = 'sensor';

    public function statusColor()
    {
        $color = '';

        switch ($this->status) {
            case 'Aman':
                $color = 'success';
                break;
            case 'Siaga':
                $color = 'warning';
                break;
            case 'Bahaya':
                $color = 'danger';
                break;
            default:
                break;
        }

        return $color;
    }

    public function ScopedataPerMinggu()
    {
        return $this->selectRaw('YEAR(created_at) as tahun, WEEK(created_at) as minggu, COUNT(*) as jumlah_data')
            ->groupBy('tahun', 'minggu')
            ->get();
    }
}
