<?php

use Illuminate\Database\Seeder;
use App\Model\Message;
use App\Model\MessageType;
use Faker\Generator as Faker;

class MessageContentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /**
         * todo: このシーだーファイルは非常に醜い
         */

        // メッセージを取得
        $allMessages = Message::all();

        $insertDatas = array();
        foreach ($allMessages as $key => $message) {
            $columnName = MessageType::find($message->type_id)->column_name;
            $data = '';
            switch ($columnName) {
                case 'sentence':
                    $data = str_random(32);
                    DB::table('message_contents')->insert([
                        'origin_id' => $message->id,
                        'sentence' => $data,
                    ]);
                    break;
                case 'file_path':
                    $data = str_random(16) . '.jpg';
                    DB::table('message_contents')->insert([
                        'origin_id' => $message->id,
                        'file_path' => $data,
                    ]);
                    break;
                case 'share_message_id':
                    $randomMessageId = Message::where('id', '<>', $message->id)->inRandomOrder()->first()->id;
                    $data = $randomMessageId;
                    DB::table('message_contents')->insert([
                        'origin_id' => $message->id,
                        'share_message_id' => $data
                    ]);
                    break;
            }
        }
    }
}
