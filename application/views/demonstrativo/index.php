<!DOCTYPE html>
<html>
<head>
	<title>Demonstrativo de Nota</title>
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=1"> -->
	<style>
		*, *::before, *::after{
			padding: 0;
			margin: 0;
			box-sizing: border-box;
		}
		body{
			zoom: 120%;
			font-family: Arial, sans-serif;
			font-family: 100%;
		}
		.dropmenu{
			width: 20%;
			padding:5px;
		}
		.color-line {
		    background: #f7f9fa;
		        background-position-x: 0%;
		        background-position-y: 0%;
		        background-repeat: repeat;
		        background-image: none;
		        background-size: auto;
		    height: 10px;
		    background-image: -webkit-linear-gradient(left, #34495e, #34495e 25%, #9b59b6 25%, #9b59b6 35%, #3498db 35%, #3498db 45%, #62cb31 45%, #62cb31 55%, #ffb606 55%, #ffb606 65%, #e67e22 65%, #e67e22 75%, #e74c3c 85%, #e74c3c 85%, #c0392b 85%, #c0392b 100%);
		    background-image: -moz-linear-gradient(left, #34495e, #34495e 25%, #9b59b6 25%, #9b59b6 35%, #3498db 35%, #3498db 45%, #62cb31 45%, #62cb31 55%, #ffb606 55%, #ffb606 65%, #e67e22 65%, #e67e22 75%, #e74c3c 85%, #e74c3c 85%, #c0392b 85%, #c0392b 100%);
		    background-image: -ms-linear-gradient(left, #34495e, #34495e 25%, #9b59b6 25%, #9b59b6 35%, #3498db 35%, #3498db 45%, #62cb31 45%, #62cb31 55%, #ffb606 55%, #ffb606 65%, #e67e22 65%, #e67e22 75%, #e74c3c 85%, #e74c3c 85%, #c0392b 85%, #c0392b 100%);
		    background-image: linear-gradient(to right, #34495e, #34495e 25%, #9b59b6 25%, #9b59b6 35%, #3498db 35%, #3498db 45%, #62cb31 45%, #62cb31 55%, #ffb606 55%, #ffb606 65%, #e67e22 65%, #e67e22 75%, #e74c3c 85%, #e74c3c 85%, #c0392b 85%, #c0392b 100%);
		    background-size: 100% 10px;
		    background-position: 50% 100%;
		    background-repeat: no-repeat;
		}
	</style>
</head>
<body>
<div class="color-line"></div>
<table width="100%" style="border-collapse: collapse;  background: #F8F9FA;">
    <tr>
        <td colspan="2" style="background-color: #FFF; text-align: center;">
            <img src="<?=base_url('assets/images/logo-seculo-negativo.png')?>" height="90">        
        </td>
    </tr>
    <tr style="background-color: #FFFFFF;"> 
        <td style="border:1px solid #efefef; padding:5px;"> 
            <div style="text-align:left; color:#000; display:block; ">
                Nome: <strong><?= $listar[0]['NM_ALUNO']; ?></strong>
            	<input type="hidden" id="p_ra" name="p_ra" value="<?= $listar[0]['RA']; ?>">
            </div>
        </td>

        <td style="border:1px solid #efefef;  padding:5px;">
            <div style="text-align:left; color:#000; display:block;">
                Turma: <strong><?= $listar[0]['CODTURMA']; ?></strong>
            </div>
        </td>
    </tr>
    <tr>
		<td colspan="2" style="text-align:left; border:1px solid #efefef; padding:10px;">
    		<!--<div style="font-weight: bold; color:#17365D; text-transform: uppercase; font-size:1rem;">
    			Selecione a Etapa: 
    			<select id="codetapa" name="codetapa" class="dropmenu">
    				<option value="0">Boletim Final</option>
    				<option value="1">1º Bimestre</option>
    				<option value="2">2º Bimestre</option>
    				<option value="3">3º Bimestre</option>
    				<option value="4">4º Bimestre</option>
    			</select>
    		</div>-->
    	</td>   	
    </tr>
</table>

<div id="body-content">
<table width="100%" style="border-collapse: collapse;  background: #fff;">
		<tr>
			<td colspan="18" style="text-align:center; border:1px solid #efefef; padding:10px;">        
				<div style="font-weight: bold; color:#17365D; text-transform:uppercase; font-size:1rem; display:block;">
				    <!-- Demonstrativo de Notas -->
				    Boletim
				</div>
			</td>
		</tr>
		<tr>
			<td></td>
			<td colspan="3" style="border:1px solid #a0a0a0; padding:5px; font-weight:bold; text-align:center;">1º Bimestre</td>
			<td colspan="4" style="border:1px solid #a0a0a0; padding:5px; font-weight:bold; text-align:center;">2º Bimestre</td>
			<td colspan="3" style="border:1px solid #a0a0a0; padding:5px; font-weight:bold; text-align:center;">3º Bimestre</td>
			<td colspan="4" style="border:1px solid #a0a0a0; padding:5px; font-weight:bold; text-align:center;">4º Bimestre</td>
		</tr>
		<tr style="text-align: center;">
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold; width:250px;">Disciplina</td>
			<!-- <td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">N1</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">N2</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">MAIC</td> -->
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">MB</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">FALTAS</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">MBR</td>
<!-- 			<td style="border:1px solid #a0a0a0; padding:5x; font-weight:bold;">N1</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">N2</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">MAIC</td> -->
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">MB</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">FALTAS</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">RS</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">MBR</td>
 <!--            <td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">N1</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">N2</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">MAIC</td> -->
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">MB</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">FALTAS</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">MBR</td>
<!-- 			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">N1</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">N2</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">MAIC</td> -->
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">MB</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">FALTAS</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">RS</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">MBR</td>

			
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">MA</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">RF</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">MF</td>
		</tr>

	

        <?php foreach($listar as $row): ?>
		<tr>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;"><?= $row["NM_DISCIPLINA"]; ?></td>
<!-- 		<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["N1_1B"])) ? "-" : $row["N1_1B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["N2_1B"])) ? "-" : $row["N2_1B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["MAIC_1B"])) ? "-" : $row["MAIC_1B"]; ?></td> -->
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["MB_1B"])) ? "-" : $row["MB_1B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["FT_1B"])) ? "-" : $row["FT_1B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["MBR_1B"])) ? "-" : $row["MBR_1B"]; ?></td>

<!--        <td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["N1_2B"])) ? "-" : $row["N1_2B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["N2_2B"])) ? "-" : $row["N2_2B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["MAIC_2B"])) ? "-" : $row["MAIC_2B"]; ?></td> -->

			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["MB_2B"])) ? "-" : $row["MB_2B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["FT_2B"])) ? "-" : $row["FT_2B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["RS_1"])) ? "-" : $row["RS_1"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["MBR_2B"])) ? "-" : $row["MBR_2B"]; ?></td>

<!--        <td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["N1_3B"])) ? "-" : $row["N1_3B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["N2_3B"])) ? "-" : $row["N2_3B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["MAIC_3B"])) ? "-" : $row["MAIC_3B"]; ?></td> -->


			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["MB_3B"])) ? "-" : $row["MB_3B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["FT_3B"])) ? "-" : $row["FT_3B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["MBR_3B"])) ? "-" : $row["MBR_3B"]; ?></td>

<!--        <td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["N1_4B"])) ? "-" : $row["N1_4B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["N2_4B"])) ? "-" : $row["N2_4/B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["MAIC_4B"])) ? "-" : $row["MAIC_4B"]; ?></td> -->


			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["MB_4B"])) ? "-" : $row["MB_4B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["FT_4B"])) ? "-" : $row["FT_4B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["RS_2"])) ? "-" : $row["RS_2"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["MBR_4B"])) ? "-" : $row["MBR_4B"]; ?></td>


			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["MA"])) ? "-" : $row["MA"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["RF"])) ? "-" : $row["RF"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["MF"])) ? "-" : $row["MF"]; ?></td>
		</tr>
        <?php endforeach; ?>
	</tbody>
</table>
</div>

<script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/jquery-ui.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/jquery.mask.js'); ?>"></script>
<script>
	$(document).on("change","#codetapa",function(e){
		var codetapa = $(this).val();
		var p_ra 	 = $("#p_ra").val();


		$.ajax({
			url: '<?= base_url('demonstrativo/inicio/filtro'); ?>',
			type: 'POST',
			data: {
				codetapa: codetapa,
				p_ra: p_ra
			},
			beforeSend: function(){
				$("#body-content").html("<h2 style='text-align:center;'>Carregando</h2>");
			},
			success: function(data){
				$("#body-content").html(data);
			}
		});

		e.preventDefault();
	});

</script>

</body>
</html>