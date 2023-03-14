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
        $collection = collect([   // Nested array
            ["namaProduk" => "Asus N544", "harga" => 6000000],
            ["namaProduk" => "Asus ROG", "harga" => 20000000],
            ["namaProduk" => "Asus ROG", "harga" => 8500000],
            ["namaProduk" => "HP eliteBook", "harga" => 7000000],
        ]);

        // dump($collection->sortBy('harga')); // diurutkan berdasarkan harga termurah
        // dump($collection->sortByDesc('harga')); // diurutkan berdasarkan harga tertinggi


        // dump($collection->sortBy('harga')->all()); //di urutkan berdasarkan key dan ditampilkan dalam bentuk array

        // dump($collection->sortByDesc('harga')->each(function ($key, $val) { // Urutkan berdasarkan key harga dan tampilkan menggunakan method each()
        //     dump($key['namaProduk'], $key['harga']);
        // }));

        // $cek = $collection->filter(function ($val, $key) {
        //     return $val['harga'] > 8000000;
        // });
        // dump($cek);

        // dump($collection->where('harga', 6000000)); //mencari element dengan harga 6000000
        // dump($collection->where('harga', '>=', 7000000)); // mencari element dengn harga lebih atau sama dengan7jt
        // dump($collection->where('harga', 20000000)->first()); //ditampilkan dalam bentuk array biasa bukan collection
        // dump($collection->firstWhere('harga', 20000000)); //ditampilkan dalam bentuk array biasa bukan collection
        // dump($collection->where('harga', '>=', 7000000)->all()); // mencari element dengn harga lebih atau sama dengan7jt ditampilkan dalam array Biasa
        // dump($collection->whereBetween('harga', [7000000, 20000000])); // Cari element dengan harga antara 700000 - 20000000
        // dump($collection->whereNotBetween('harga', [7000000, 20000000])); // Cari element dengan harga bukan di antara 700000 - 20000000
        dump($collection->whereBetween('harga', [7000000, 20000000])->sortBy('harga')->first()); //cari element dari harga 7jt -20jt urutkan ascending tampilkan dalam bentuk array biasa

    }
}
