<?php 
	/**
	 * 
	 */
	class model
	{
		protected $koneksi1;

		function __construct()
		{
			$this->koneksi1 = mysqli_connect('localhost', 'root', '', 'b');
		}

		function input($fields){
			$koneksi1 = mysqli_connect('localhost', 'root', '', 'b');
			$this->koneksi1;
			$this->nama=$fields[0]['value'];
            $this->password=$fields[1]['value'];
            $this->kelas=$fields[2]['value'];
            $this->angkatan=$fields[3]['value'];
            $this->peminatan=$fields[4]['value'];
            $this->alamat=$fields[5]['value'];

			$queryinput="INSERT INTO tiga
							VALUES('',
									'$this->nama',
									'$this->password', 
									'$this->kelas', 
									'$this->angkatan', 
									'$this->peminatan', 
									'$this->alamat'
								)";
			// echo "-------1---- </br>";
			// echo "$this->nama </br>";
			// echo "$this->password </br>";
			// echo "$this->kelas </br>";
			// echo "$this->angkatan </br>";
			// echo "$this->peminatan </br>";
			// echo "$this->alamat </br>";
			// echo "------2----- </br>";
			// echo "$queryinput";
			// echo "------3----- </br>";
			$result = mysqli_query($koneksi1, $queryinput);
			// echo "------4----- </br>";
			mysqli_error($koneksi1);
			// echo $result."aye";
			if ($result==1) {
				echo "Data berhasil diinput";
			} else {
				echo "Data gagal diinput";
			}
			
			echo "</br>";
		}

		function cetakMahasiswa(){
			$this->koneksi1;
			$queryoutput="SELECT * FROM tiga";
			$result = mysqli_query($koneksi1, $queryoutput);
		}
			
	}
	
?>