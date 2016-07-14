
 <head>
<link rel="stylesheet" type="text/css" href="BioSolStyle.css">
<script src="jquery-3.0.0.min.js"></script>
</head>
<table id="headerTable" class="form" border="2">
 <tbody>
  <tr>
		<td colspan="2">
			<label>DATOS DEL EQUIPO</label>
		</td>
		<td>
			<label>FECHA:</label>
		</td>
		<td>
			<input type="text" name="reportDate">
		</td>
  </tr>

  <tr>
  		<td>
  			<label>EQUIPO:</label>
  		</td>
  		<td>
  			<input type="text" name="equipoInput">
  		</td>
  		<td>
  			<label>N/S:</label>
  		</td>
  		<td>
  			<input type="text" name="serialInput">
  		</td>
  </tr>
  <tr>
  		<td>
  			<label>AREA:</label>
  		</td>
  		<td>
  			<input type="text" name="areaInput">
  		</td>
  		<td>
  			<label>SUB-AREA:</label>
  		</td>
  		<td>
  			<input type="text" name="subInput">
  		</td>
  </tr>
  <tr>
  		<td>
  			<label>CLIENTE:</label>
  		</td>
  		<td>
  			<input type="text" name="clienteInput">
  		</td>
  		<td>
  			<label>MARCA:</label>
  		</td>
  		<td>
  			<input type="text" name="marcaInput">
  		</td>
  </tr>
  <tr>
  		<td>
  			<label>MODELO:</label>
  		</td>
  		<td>
  			<input type="text" name="modeloInput">
  		</td>
  		<td>
  			<label>MANTENIMIENTO:</label>
  		</td>
  		<td>
  			<input type="text" name="mantenimientoInput">
  		</td>
  </tr>
  <tr>
  		<td>
  			<label>ULTIMO MANTENIMIENTO:</label>
  		</td>
  		<td>
  			<input type="text" name="uMantenimientoInput">
  		</td>
  		<td>
  			<label>RESPONSABLE:</label>
  		</td>
  		<td>
  			<input type="text" name="responsableInput">
  		</td>
  </tr>
  <tr>
  		<td>
  			<label>PROXIMO MANTENIMIENTO:</label>
  		</td>
  		<td>
  			<input type="text" name="proxInput">
  		</td>
  </tr>
 </tbody>
</table>
<table id="bodyTable" class="form" border="2">
	<tbody>
			<tr>
				<td width="55%">
					<label>Descripcion</label>
				</td>
				<td>
					<label>Si</label>
				</td>
				<td>
					<label>No</label>
				</td>
				<td>
					<label>Observaciones</label>
				</td>
			</tr>
			<tr id="mainRow">
				<td width="55%">
					<textarea name="descriptionArea"></textarea>
				</td>
				<td>
					<input type="radio" name="radioCheck">
				</td>
				<td>
					<input type="radio" name="radioCheck">
				</td>
				<td>
					<textarea name="observacionArea"></textarea>
				</td>
			</tr>
	</tbody>
</table>
<div class="wrapper"><button onclick="addNewBodyEntry('bodyTable')">Agregar Fila</button> <button onclick="deleterow('bodyTable')">Borrar Fila</button></div>
<table id="obsTable" class="form" border="2">
	<tbody>
		<tr>
			<td>
				<label>OBSERVACIONES GENERALES</label>
			</td>
		</tr>
		<tr id="mainRow">
			<td>
				<textarea name="obsArea"></textarea>
			</td>
		</tr>
	</tbody>
</table>

 <div class="wrapper"><button onclick="addNewBodyEntry('obsTable')">Agregar Fila</button> <button onclick="deleterow('obsTable')">Borrar Fila</button></div>
 <div class="wrapper"><input type=button name=print value="Print" onClick="window.print()" align="center"></div>

<script type="text/javascript">
	var counter=1;
	function addNewBodyEntry(tablename){
	  var table = document.getElementById(tablename);
	  var row = table.rows[ table.rows.length - 1 ]; // find row to copy
       // find table to append to
      var clone = row.cloneNode(true); // copy children too
      clone.id = clone.id+counter; // change id or other attributes/contents
      if(tablename=="bodyTable"){
      var radioButtons=clone.getElementsByTagName("input");
      radioButtons[0].name="radioCheck"+counter;
      radioButtons[1].name="radioCheck"+counter;
      counter++;}
      table.appendChild(clone); // add new row to end of table
	}


	function deleterow(tablename) {
    var table2 = document.getElementById(tablename);
    var rowCount = table2.rows.length;
    if (!(rowCount<=2)) {
    	table2.deleteRow(rowCount -1);
	}
	else{
		window.alert("Numero minimo de filas alcanzado");
	}
}	
</script>

<!--

//Pong aqui todo lo que se desee proteger mediante privilegios de lOg In
// Include database connection and functions here.  See 3.1. 
sec_session_start(); 
if(login_check($mysqli) == true) {
        // Add your protected page content here!
} else { 
        echo 'You are not authorized to access this page, please login.';
}
*/
-->