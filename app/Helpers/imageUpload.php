<?php

namespace App\Helpers;

trait imageUpload {
     /**
     * Common Image Upload Function
     * @param $attachment
     * @param $type
     * @return string
     */
    public function commonImageUpload($attachment, $type): string
    {
        //  Laravel file helper methods /
        $attachmentExtension = $attachment->getClientOriginalExtension();
        $attachmentMimeType = $attachment->getClientMimeType();
        $attachmentName = $attachment->getClientOriginalName();
        $attachmentSize = $attachment->getSize();

        //  New attachment name, v - milliseconds /
        $attachmentNewName = 's' . date('YmdHisv') . '.' . $attachmentName;

        //  Instead of storage I will demo you storing in PUBLIC path same as that of assets folder /
        
        if ($type == 'insta') {
        $uploadPath = public_path() . '/image';
        }

        //  Moving the uploaded path of public folder /
        $attachment->move($uploadPath, $attachmentNewName);
        return $attachmentNewName;
    }
}
