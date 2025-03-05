<?php 

namespace App\Enums;

enum MessageType: string {
    case CREATED = 'Berhasil menambahkan data' ;
    case UPDATED = 'Berhasil mengubah data' ;
    case DELETED = 'Berhasil menghapus data' ;
    case ERROR = 'Terjadi kesalahan. Silahkan coba lagi' ;
    case NOT_FOUND = 'Data tidak ditemukan' ;
    case UNAUTHORIZED = 'Anda tidak memiliki akses' ;
    
    public function message(string $entity='', ?string $error = null): string {

        if ($this == MessageType::ERROR && $error) {
            return "{$this->value}{$error}";
        }

        return "{$this->value} {$entity}";
    }
}


?>