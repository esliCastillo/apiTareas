<?php
namespace App\Models;

use CodeIgniter\Model;

class TareaModel extends Model
{
    protected $table = 'Tareas';
    protected $primaryKey = 'id_tarea';
    protected $allowedFields = ['titulo','descripcion','id_usuario_asignado','fecha_creacion','estado'];
}