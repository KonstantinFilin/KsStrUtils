<?php

namespace Utils\Validator;

class TypeUploadedFileList extends \Utils\Validator\TypeUploadedFile
{
    public function check($value)
    {
        /*echo "<pre>";
        var_dump($value);
        die;
        $fileList = \Form\UploadedFile::createList($value);
        */
        foreach ($value as $file) {
            if ($file->getError() == UPLOAD_ERR_NO_FILE) {
                continue;
            }
            
            if (!parent::check($file)) {
                return false;
            }
        }
        
        return true;
    }
}
