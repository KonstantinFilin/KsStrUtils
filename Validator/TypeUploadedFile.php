<?php

namespace Utils\Validator;

class TypeUploadedFile extends \Utils\Validator
{
    public function check($value)
    {
        if (! $value) {
            return true;
        }        
        
        if ( $value instanceof \Form\UploadedFile ) {
            if ($value->getError() != UPLOAD_ERR_OK) {
                $this->setErrorMessage($this->getErrorDescription($value->getError()));
                return false;
            }
        } else {
            $this->setErrorMessage("Должен быть файл");
            return false;
        }
        
        return true;
    }
    
    public function getErrorDescription($errNo)
    {
        switch ($errNo) {
            case UPLOAD_ERR_INI_SIZE:
                return "Слишком большой файл";
            case UPLOAD_ERR_FORM_SIZE:
                return "Слишком большой файл";
            case UPLOAD_ERR_PARTIAL:
                return "Ошибка загрузки файла (файл загружен частично)";
            case UPLOAD_ERR_NO_FILE:
                return "Файл не указан";
            case UPLOAD_ERR_NO_TMP_DIR:
                return "Отсутствует временная папка";
            case UPLOAD_ERR_CANT_WRITE:
                return "Недоступно для записи";
            case UPLOAD_ERR_EXTENSION:
                return "Расширение PHP остановило загрузку файла";
            default: 
                return "Неизвестная ошибка";
        }
    }
}
