<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::unprepared('CREATE TRIGGER update_saldo_dompet AFTER INSERT ON `topup` FOR EACH ROW
            BEGIN
                INSERT INTO dompet 
                        SET id = NEW.dompet_id,
                            saldo = NEW.saldo,
                            bonus = NEW.bonus
                        ON DUPLICATE KEY UPDATE 
                            saldo = saldo + NEW.saldo,
                            bonus = bonus + NEW.bonus;
            END
        ');

        DB::unprepared('CREATE TRIGGER tambah_saldo_akun BEFORE INSERT ON akun FOR EACH ROW 
            BEGIN
                INSERT INTO dompet (saldo, bonus) VALUES (`10000`, `1`);
            
                SET @dompet_id = LAST_INSERT_ID();
            
                SET NEW.dompet_id = @dompet_id;
            END
        ');

        DB::unprepared('CREATE TRIGGER create_item_kurir AFTER INSERT ON akun FOR EACH ROW
            BEGIN
                IF NEW.level = `kurir`
                THEN
                    INSERT INTO kurir (nama_kurir) VALUES (NEW.fullname);
                END IF;
            END
        ');
    }

    public function down(): void
    {
        DB::unprepared('DROP TRIGGER "update_saldo_dompet, tambah_akun_dompet"');
    }
};
