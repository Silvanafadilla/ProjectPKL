<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('provinsis')->insert([
            ['id' => 1,'kode_prov' => 11,'nama_prov' => 'ACEH'],
            ['id' => 2,'kode_prov' => 12,'nama_prov' => 'SUMATERA UTARA'],
            ['id' => 3,'kode_prov' => 13,'nama_prov' => 'SUMATERA BARAT'],
            ['id' => 4,'kode_prov' => 14,'nama_prov' => 'RIAU'],
            ['id' => 5,'kode_prov' => 15,'nama_prov' => 'JAMBI'],
            ['id' => 6,'kode_prov' => 16,'nama_prov' => 'SUMATERA SELATAN'],
            ['id' => 7,'kode_prov' => 17,'nama_prov' => 'BENGKULU'],
            ['id' => 8,'kode_prov' => 18,'nama_prov' => 'LAMPUNG'],
            ['id' => 9,'kode_prov' => 19,'nama_prov' => 'KEPULAUAN BANGKA BELITUNG'],
            ['id' => 10,'kode_prov' => 21,'nama_prov' => 'KEPULAUAN RIAU'],
            ['id' => 11,'kode_prov' => 31,'nama_prov' => 'DKI JAKARTA'],
            ['id' => 12,'kode_prov' => 32,'nama_prov' => 'JAWA BARAT'],
            ['id' => 13,'kode_prov' => 33,'nama_prov' => 'JAWA TENGAH'],
            ['id' => 14,'kode_prov' => 34,'nama_prov' => 'DI YOGYAKARTA'],
            ['id' => 15,'kode_prov' => 35,'nama_prov' => 'JAWA TIMUR'],
            ['id' => 16,'kode_prov' => 36,'nama_prov' => 'BANTEN'],
            ['id' => 17,'kode_prov' => 51,'nama_prov' => 'BALI'],
            ['id' => 18,'kode_prov' => 52,'nama_prov' => 'NUSA TENGGARA BARAT'],
            ['id' => 19,'kode_prov' => 53,'nama_prov' => 'NUSA TENGGARA TIMUR'],
            ['id' => 20,'kode_prov' => 61,'nama_prov' => 'KALIMANTAN BARAT'],
            ['id' => 21,'kode_prov' => 62,'nama_prov' => 'KALIMANTAN TENGAH'],
            ['id' => 22,'kode_prov' => 63,'nama_prov' => 'KALIMANTAN SELATAN'],
            ['id' => 23,'kode_prov' => 64,'nama_prov' => 'KALIMANTAN TIMUR'],
            ['id' => 24,'kode_prov' => 65,'nama_prov' => 'KALIMANTAN UTARA'],
            ['id' => 25,'kode_prov' => 71,'nama_prov' => 'SULAWESI UTARA'],
            ['id' => 26,'kode_prov' => 72,'nama_prov' => 'SULAWESI TENGAH'],
            ['id' => 27,'kode_prov' => 73,'nama_prov' => 'SULAWESI SELATAN'],
            ['id' => 28,'kode_prov' => 74,'nama_prov' => 'SULAWESI TENGGARA'],
            ['id' => 29,'kode_prov' => 75,'nama_prov' => 'GORONTALO'],
            ['id' => 30,'kode_prov' => 76,'nama_prov' => 'SULAWESI BARAT'],
            ['id' => 31,'kode_prov' => 81,'nama_prov' => 'MALUKU'],
            ['id' => 32,'kode_prov' => 82,'nama_prov' => 'MALUKU UTARA'],
            ['id' => 33,'kode_prov' => 91,'nama_prov' => 'PAPUA BARAT'],
            ['id' => 34,'kode_prov' => 94,'nama_prov' => 'PAPUA']

        ]);
   }
}