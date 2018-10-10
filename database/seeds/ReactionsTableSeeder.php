<?php

use Illuminate\Database\Seeder;

class ReactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ユーザーがすべてのメッセージに対して30%くらいの確率で、何らかのリアクションをする
        $allUsers = \App\User::all();

        // insert用データ
        $insertDatas = array();
        foreach ($allUsers as $userKey => $user) {









//            // 所属するチャンネルのメッセージに対してリアクションするように設定する
//            $allChannels = $user->channels();
//
//            foreach ($allChannels as $key => $channel) {
//                // チャンネルごとのメッセージの一覧を取得する
//                $allMessages = \App\Model\Message::where('channel_id', $channel['id'])->get();
//
//                foreach ($allMessages as $message) {
//                    $user->reactions()->attach(5, [
//                        'icon_id' => 3
//                    ]);
//                }
//            }
        }
    }
}
