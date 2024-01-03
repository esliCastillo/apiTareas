<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\TareaModel;

class Tareas  extends BaseController{
    use ResponseTrait;
    // get all tarea
    public function index(){
        $model = new TareaModel();
        $data = $model->findAll();
        return $this->respond($data, 200);
    }
    // get single tarea
    public function show($id = null){
        $model = new TareaModel();
        $data = $model->getWhere(['id_tarea' => $id])->getResult();
        if($data){
            return $this->respond($data);
        }else{
            return $this->failNotFound('No Data Found with id '.$id);
        }
    }
    // create a tarea
    public function create(){
        $model = new TareaModel();
        $data = [
            'titulo' => $this->request->getPost('titulo'),
            'descripcion' => $this->request->getPost('descripcion')
        ];
        $model->insert($data);
        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Data Saved'
            ]
        ];
         
        return $this->respondCreated($data, 201);
    }
    // update tarea
    public function update($id = null){
        $model = new TareaModel();
       /*  $json = $this->request->getJSON();
        if($json){
            $data = [
                'titulo' => $json->titulo,
                'descripcion' => $json->descripcion,
                'id_usuario_asignado' => $json->id_usuario_asignado,
                'estado' => $json->estado
            ]; */
        //}else{
            $input = $this->request->getRawInput();
            $data = [];
            if(!empty($input['titulo'])){
                $data["titulo"] = $input['titulo'];

            }
            if(!empty($input['descripcion'])){
                $data["descripcion"] = $input['descripcion'];

            }
            if(!empty($input['id_usuario_asignado'])){
                $data["id_usuario_asignado"] = $input['id_usuario_asignado'];

            }
            if(!empty($input['estado'])){
                $data["estado"] = $input['estado'];

            }
        //}
        // Insert to Database
        $model->update($id, $data);
        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Data Updated'
            ]
        ];
        return $this->respond($response);
    }
    // delete tarea
    public function delete($id = null)
    {
        $model = new TareaModel();
        $data = $model->find($id);
        if($data){
            $model->delete($id);
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Data Deleted'
                ]
            ];
            return $this->respondDeleted($response);
        }else{
            return $this->failNotFound('No Data Found with id '.$id);
        }    
    }
}
