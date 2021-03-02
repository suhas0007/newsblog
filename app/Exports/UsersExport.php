<?php

namespace App\Exports;

use App\User;
use App\Article;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExport implements FromCollection, ShouldAutoSize, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // use Exportable;
    public function collection()
    {
        return  Article::with('user')->get();
       // dd($a);
    }

    public function map($art): array
    {

        return [
            $art->id,
            $art->title,
            $art->excerpt,
            $art->body,
            $art->user->name

            
        ];
    }
}
