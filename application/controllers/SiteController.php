<?php
class SiteController extends Controller
{   
    function actionSimpan_data()
    {
        $model=new Data_siswaTbl();
        $model->id_mahasiswa=rand(100000,9999999);
        $model->nama_mahasiswa=$_POST['nama'];
        $model->kelas=$_POST['kelas'];
        $model->jenis_kelamin=$_POST['jenis_kelamin'];
        $model->no_handphone=$_POST['no_handphone'];
        $model->save();
        echo json_encode(array(
            'status'=>'oke'
        ));
    }
    
    function actionTampil_data()
    {
        $query=query('SELECT* FROM data_siswa')->query();
        $data=array();
        foreach ($query as $query):
            $data[]=array(
                'id_mahasiswa'=>$query['id_mahasiswa'],
                'nama_mahasiswa'=>$query['nama_mahasiswa'],
                'jenis_kelamin'=>$query['jenis_kelamin'],
                'kelas'=>$query['kelas'],
                'no_handphone'=>$query['no_handphone'],
            );
        endforeach;
        echo json_encode(array(
            'data'=>$data
        ));
    }
    
    function actionEdit_data()
    {
        $model=  Data_siswaTbl::model()->findByAttributes(array(
            'id_mahasiswa'=>$_POST['id_mahasiswa']
        ));
        
        $model->nama_mahasiswa=$_POST['nama'];
        $model->kelas=$_POST['kelas'];
        $model->jenis_kelamin=$_POST['jenis_kelamin'];
        $model->no_handphone=$_POST['no_handphone'];
        $query=$model->save();
        if($query)
        {
            echo json_encode(array(
                'status'=>'data_update'
            ));
        }
        else
        {
            echo json_encode(array(
                'status'=>'update_gagal'
            ));
        }        
    }
    function actionHapus_data($id_mahasiswa)
    {
        $query=query('DELETE FROM data_siswa WHERE id_mahasiswa="'.$id_mahasiswa.'"')->execute();;
       
        if($query)
        {
            echo json_encode(array(
                'status'=>'data_terhapus'
            ));
        }
        else
        {
            echo json_encode(array(
                'status'=>'gagal_terhapus'
            ));
        }     
    }
}