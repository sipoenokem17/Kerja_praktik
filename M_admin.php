<?php

namespace App\Models;

use CodeIgniter\Model;

class M_admin extends Model
{
    public function dataUser()
    {
        return $this->db->table('users u')
            ->select("*,
            UPPER(CONCAT(LEFT(u.nama,1),IF(INSTR(u.nama,' ') > 0, LEFT(SUBSTRING_INDEX(u.nama, ' ', -1), 1), '') )) AS inisial")
            ->join('booth b', 'b.id_booth = u.id_booth', 'left')
            // ->where('u.user_level', '1')
            ->get()->getResultArray();
    }

    public function dataBooth()
    {
        return $this->db->table('booth')
            ->select("*")
            ->get()->getResultArray();
    }

    public function getdetailUser($id_user)
    {
        return $this->db->table('users u')
            ->select("*,
        UPPER(CONCAT(LEFT(u.nama,1),IF(INSTR(u.nama,' ') > 0, LEFT(SUBSTRING_INDEX(u.nama, ' ', -1), 1), '') )) AS inisial")
            ->join('booth b', 'b.id_booth = u.id_booth', 'left')
            ->where('u.id_user', $id_user)
            ->get()->getResultArray();
    }

    public function tambahUser($data)
    {
        return $this->db->table('users')
            ->insert($data);
    }

    public function hapusUser($id_user)
    {
        return $this->db->table('users')
        ->where('id_user',$id_user)
        ->delete();
    }

    public function ubahDataUser($data, $id_user)
    {
        return $this->db->table('users')
            ->where('id_user', $id_user)
            ->update($data);
    }
}
