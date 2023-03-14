<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CollectionController extends Controller
{

    public function collectionSatu()
    {
        $array = [1, 2, 3, 4, 5, 6, 7, 8, 9, "firstName", "lastName"];
        // echo $array; // Tidak Bisa karena array harus memakai fungsi collect

        $colllection = collect($array);
        echo $colllection[9];
        dd($colllection);
    }

    public function collectionDua()
    {
        // collection berbagai tipe dta
        $collection = collect(['Hello', "firstName", "lastName", 2, 3, 4, true]);

        // dd($collection);
        // echo $collection[2];

        // collection associative array
        $collection = collect([
            "firstName" => "Adri",
            "lastName" => "Lukman",
            "github" => "LK4"
        ]);

        echo $collection;
        echo $collection['firstName'];
    }

    public function collectionTiga()
    {
        $collection = collect([1, 9, 3, 4, 5, 3, 5, 7]);

        dump($collection->sum());
        dump($collection->avg());
        dump($collection->max());
        dump($collection->min());

        dump($collection->random());


        $collection2 = collect([1, 2, 3]);
        dump($collection2->concat([10, 9, 8]));

        dump($collection2->contains(2));
        echo $collection->unique();
    }


    public function collectionEmpat()
    {
        $varA = [1, 2, 3, 4, 5];
        $varB = collect([11, 12, 13, 14, 15, 8, 9]);
        dump($varA);
        dump($varB);
        // echo $varA; // tidak bisa langsung di echo karen array PHP
        echo $varB;

        dump($varB->last());
        dump($varB->first());
        dump($varB->count()); // menjumlahkan Total ELement Array Collection
        dump($varB->sort()); //mengurutkan secara menaik


        $collection = collect([
            "name" => "Adri Lukman",
            "city" => "Sukabumi",
            "prodi" => "Sistem Informasi"
        ]);
        dump($collection->keys()); // mengambil semua Key dari collection
        dump($collection->values()); // mengambil semua Value dari collection
        dump($collection->get('city'));  //Mengabil Nilai berdasarkan KEY yg di input
        dump($collection->has('Country'));  //Memerika sebuah KEY ada dalam collection atau tidak

        $result = $collection->replace([   // Mengganti Nilai Yang ada dalam Collection
            'name' => "Ashan Lukman Alfatih",
            'city' => "Jampang Kulon"
        ]);

        dump($result);

        dump($collection->forget('name')); // Menghapus salah satu element yg ada dalam collection
        dump($collection->flip()); //membalikan key dan element

        $collectionNew = collect([
            "type" => "samsung",
            "price" => "menegah",
            "productBy" => "China",
        ]);

        dump($collectionNew->search('samsung')); // Mencari sebuh nilai dari collection

        dump($collectionNew->each(function ($val, $key) {
            echo "$key : $val <br>";
        }));
    }

    public function collectionLima()
    {
        $collection = collect([
            "name" => "adri lukman",
            "job" => "Fullstack Engineer",
            "specialist" => "Web Dev",
        ]);
    }
}
