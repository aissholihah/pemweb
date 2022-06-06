<?php
	class Form{
		var $fields = array();
		var $action;
		var $submit = "";
		var $jumField=0;

		function __construct($action, $submit){
		$this->action = $action;
		$this->submit = $submit;
		}

		function displayForm(){

			echo"<form action='".$this->action."' method='post'>";
			echo"<table widht='100%'>";
			for($i=0;$i<$this->jumField;$i++)
			{
				// echo "ttttttttttt";
				// echo $this->fields[$i]['satu'];
				// echo $this->fields[$i]['dua'];
				// echo $this->fields[$i]['tiga'];
				// echo "uuuuuuuuuu";
				echo"<tr>
					 <td align='right'>".$this->fields[$i]['label']."</td>";

				switch ($this->fields[$i]['type']) {
					case 'radio':
						echo "<td>";
						echo "<input type='radio' name=".$this->fields[$i]['name']." value=".$this->fields[$i]['satu'].">";
						echo "<label for=".$this->fields[$i]['satu'].">".$this->fields[$i]['satu']." </label><br>";
						echo "<input type='radio' name=".$this->fields[$i]['name']." value=".$this->fields[$i]['dua'].">";
						echo "<label for=".$this->fields[$i]['dua'].">".$this->fields[$i]['dua']."</label><br>";
						echo "<input type='radio' name=".$this->fields[$i]['name']." value=".$this->fields[$i]['tiga'].">";
						echo "<label for=".$this->fields[$i]['tiga'].">".$this->fields[$i]['tiga']."</label><br>";
						echo "</td>";
						break;
					case 'select':
						echo "<td>";
						echo "<select name=".$this->fields[$i]['name'].">";
							echo "<option value=".$this->fields[$i]['satu'].">".$this->fields[$i]['satu']."</option>";
							echo "<option value=".$this->fields[$i]['dua'].">".$this->fields[$i]['dua']."</option>";
							echo "<option value=".$this->fields[$i]['tiga'].">".$this->fields[$i]['tiga']."</option>";
						echo "</select>";
						echo "</td>";
						break;
					case 'checkbox':
						echo "<td>";
						echo "<input type='checkbox' id=".$this->fields[$i]['satu']." name=".$this->fields[$i]['name']." value=".$this->fields[$i]['satu'].">";
						echo "<label for=".$this->fields[$i]['satu'].">".$this->fields[$i]['satu']."</label><br>";
						echo "<input type='checkbox' id=".$this->fields[$i]['dua']." name=".$this->fields[$i]['name']." value=".$this->fields[$i]['dua'].">";
						echo "<label for=".$this->fields[$i]['dua'].">".$this->fields[$i]['dua']."</label><br>";
						echo "<input type='checkbox' id=".$this->fields[$i]['tiga']." name=".$this->fields[$i]['name']." value=".$this->fields[$i]['tiga'].">";
						echo "<label for=".$this->fields[$i]['tiga'].">".$this->fields[$i]['tiga']."</label><br>";
						echo "</td>";
						break;
					case 'textarea':
						echo "<td>";
						echo "<textarea id=".$this->fields[$i]['name']." name=".$this->fields[$i]['name']." rows='4' cols='50'></textarea>";
						echo "</td>";
						break;
					default:
						echo"<td><input type='".$this->fields[$i]['type']."' name='".$this->fields[$i]['name']."'></td>";
						break;
				}
				echo "</tr>";
			}
			echo"<tr><td><input type='submit' name='tombol' value='".$this->submit."' ></td></tr>";
			echo"</table>";
		}

		function addField($name,$label,$type='text', $satu='', $dua='', $tiga=''){
			$this->fields[$this->jumField]['name']=$name;
			$this->fields[$this->jumField]['label']=$label;
			$this->fields[$this->jumField]['type']=$type;
			$this->fields[$this->jumField]['satu']=$satu;
			$this->fields[$this->jumField]['dua']=$dua;
			$this->fields[$this->jumField]['tiga']=$tiga;
			$this->jumField++;
		}

		function getForm(){
			for ($i=0; $i <$this->jumField ; $i++) { 
				$this->fields[$i]['value']=$_POST[$this->fields[$i]['name']];
			}
		}

		function cetakForm(){
		    for($i=0;$i<$this->jumField;$i++)
		    {
		        echo $this->fields[$i]['label'].":".$this->fields[$i]['value']."</br>";
		    }
		}
	}
?>