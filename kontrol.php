<?php 
	/**
	 * 
	 */
	require "form.php";
	require "model.php";
	class control
	{
		protected $nama;
		protected $password;
		protected $kelas;
		protected $angkatan;
		protected $peminatan;
		protected $alamat;

		function __construct($nama="Anonym", $password="", $kelas = "", $angkatan="", $peminatan="", $alamat="")
		{
			$this->nama= $nama;
			$this->password= $password;
			$this->kelas= $kelas;
			$this->angkatan= $angkatan;
			$this->peminatan= $peminatan;
			$this->alamat= $alamat;
		}

		public function inputForm(){
		$formMhs=new Form('','Input Mahasiswa'); 
        $formMhs->addField('nama','Nama');
        $formMhs->addField('password','Password','password');
        $formMhs->addField('kelas','Kelas', 'radio', 'a', 'b', 'c');
        $formMhs->addField('angkatan','Angkatan', 'select', '2017', '2018', '2019');
        $formMhs->addField('peminatan', 'Minat', 'checkbox', 'Internet Of Things', 'Sistem Informasi', 'Multimedia');
        $formMhs->addField('alamat','Alamat','textarea');
		
			if (isset($_POST['tombol']))
				{
					$formMhs->getForm();//input data
					$model_data = new model();
					$model_data->input($formMhs->fields);

		            $this->nama=$formMhs->fields[0]['value'];
		            $this->password=$formMhs->fields[1]['value'];
		            $this->kelas=$formMhs->fields[2]['value'];
		            $this->angkatan=$formMhs->fields[3]['value'];
		            $this->peminatan=$formMhs->fields[4]['value'];
		            $this->alamat=$formMhs->fields[5]['value'];
		            $data=$this;
		            $this-> displayView('Vmhs/VcetakMhs.php',$data);
			}else{
				// $formMhs->displayForm();
				$this->displayView('Vmhs/VinputMhs.php',$formMhs->displayForm());
			}
		}
		public function displayView($fileView, $data=''){
		// echo "2 </br>";
		// var_dump($data);
		require($fileView);
	}
	}
?>