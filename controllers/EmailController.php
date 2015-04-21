<?php

namespace app\controllers;

class EmailController extends \yii\web\Controller
{
    protected function sendMail($phforum_id, $message, $url)
    {
        $title = "Nuevo mensaje Foro:";
        $content = $message;

        $modelPost = Post::find()->where(['phforum_id' => $phforum_id])->addGroupBy(['user_id'])->all();
        foreach ($modelPost as $user) {
            // Contenido, tipo  1=Notificacion URL
            if($user->user->notification==User::EMAIL_DAILY)
                $user->user->sendEmail($content, $url, $title);
        }
    }
}
