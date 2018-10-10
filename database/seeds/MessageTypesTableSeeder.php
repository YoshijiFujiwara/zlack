<?php

use Illuminate\Database\Seeder;

class MessageTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('message_types')->insert([
            [
                'name' => 'sentence',
                'column_name' => 'sentence',
                'description' => '普通の文字列形式'
            ],
            [
                'name' => 'file',
                'column_name' => 'file_path',
                'description' => 'ファイルの添付のとき'
            ],
            [
                'name' => 'share',
                'column_name' => 'share_message_id',
                'description' => 'メッセージの共有の場合'
            ],
        ]);
    }
}
