<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Model\Workspace;
use App\Model\Channel;

class UserWorkspaceChannelReactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 全てのユーザーが、2,3個ワークスペースに所属するように
        $allUsers = User::all();
        $allWorkspaces = Workspace::all();

        // インサート用データ
        $insertDatas = array();
        $channelDatas = array();
        foreach ($allUsers as $key => $user) {
            $workspaceIds = array();
            foreach ($allWorkspaces as $workspaceKey => $workspace) {
                // 33%の確率で登録する
                if (rand(0, 100) % 3 == 0) {
                    $workspaceIds[] = $workspace->id;
                }
            }

            foreach ($workspaceIds as $workspaceId) {
                if (rand(0, 100) % 5 == 0) {
                    $is_inviting = false;
                    $insertDatas[] = [
                        'user_id' => $user->id,
                        'workspace_id' => $workspaceId,
                        'is_inviting' => $is_inviting
                    ];

                    // is_invitingがfalseのときに、channel_userも登録しておく
                    $channles = \App\Model\Channel::where('workspace_id', $workspaceId)->get();
                    // channelに所属する確率は70%くらいといったところか
                    foreach ($channles as $channle) {
                        if (rand(0,100) % 3 === 0 || 1) {
                            $channelDatas[] = [
                                'user_id' => $user->id,
                                'channel_id' => $channle->id,
                                'is_inviting' => (rand(0, 100) > 30)? false: true,
                            ];

                            // そのチャンネルのメッセージ一覧
                            $messages = \App\Model\Message::where('channel_id', $channle->id)->get();

                            foreach ($messages as $message) {
                                if (rand(0, 100) > 70) {
                                    DB::table('reactions')->insert([
                                        'user_id' => $user->id,
                                        'message_id' => $message->id,
                                        'icon_id' => \App\Model\ReactionIcon::all()->random()->id
                                    ]);
                                }
                                if (rand(0, 100) > 30) {
                                    DB::table('stars')->insert([
                                        'user_id' => $user->id,
                                        'message_id' => $message->id,
                                    ]);
                                }
                            }
                        }
                    }

                } else {
                    $is_inviting = true;
                    $insertDatas[] = [
                        'user_id' => $user->id,
                        'workspace_id' => $workspaceId,
                        'is_inviting' => $is_inviting,
                    ];
                }
            }
        }

        DB::table('user_workspace')->insert($insertDatas);
        DB::table('channel_user')->insert($channelDatas);
    }
}
