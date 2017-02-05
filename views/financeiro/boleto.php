<table width="100%" border="0">
	<tr>
		<td colspan="2">
		<table class="cabecalho" width="100%">
			<tr>
				<td><img src="images/logo-bradesco.jpg" border="0" /></td> 
				<td class="num_banco">237-2</td><td class="linhaD">99999.9999D 99999.99999D 99999.99999D D FFFF9999999999</td>
			</tr>
		</table>
		</td>
	</tr>
	<tr>
		<td colspan="2">
		<table border="1" cellpadding="3" cellspacing="0" width="100%">
			<tr>
				<td colspan="7">Local de Pagamento<p class="dados"><br/>Pag&aacute;vel em qualquer banco at&eacute; o vencimento.</p></td>
				<td>Vencimento<p class="dados"><br />00/00/0000</p></td>
			</tr>
			<tr>
				<td colspan="7">Nome do benefici&aacute;rio/CPF/CNPJ/Endere&ccedil;o<p class="dados">INSTITUTO CARIOCA DE EDUCA&Ccedil;&Atilde;O - CNPJ: 00.000.000/0001-00</p></td>
				<td>Ag&ecirc;ncia/C&oacute;digo do Benifici&aacute;rio<p class="dados">0000-0</p></td>
			</tr>
			<tr>
				<td colspan="2">Data do Documento<p class="dados">00/00/0000</p></td>
				<td colspan="2">N&uacute;mero do Documento<p class="dados">0000000000</p></td>
				<td>Esp&eacute;cie Documento<p class="dados">&nbsp;</p></td>
				<td>Aceite<p class="dados">&nbsp;</p></td>
				<td>Data Processamento<p class="dados">00/00/0000</p></td>
				<td>Nosso-N&uacute;mero<p class="dados">00/00000000000-0</p></td>
			</tr>
			<tr>
				<td>Uso do Banco<p class="dados">&nbsp;</p></td>
				<td>CIP<p class="dados">&nbsp;</p></td>
				<td>Carteira<p class="dados">19</p></td>
				<td>Moeda<p class="dados">R$</p></td>
				<td colspan="2">Quantidade<p class="dados">1</p></td>
				<td>Valor<p class="dados">&nbsp;</p></td>
				<td>Valor do Documento<p class="dados">0,00</p></td>
			</tr>
			<tr>
				<td colspan="7" rowspan="5">Informa&ccedil;&otilde;es de responsabilidade do benefici&aacute;rio<p class="dados"></p></td>
				<td>(-)Desconto/Abatimento<p class="dados"></p></td>
			</tr>
			<tr>
				<td>(-)Outras Dedu&ccedil;&otilde;es<p class="dados"></p></td>
			</tr>
			<tr>
				<td>(+)Juros/Multa<p class="dados"></p></td>
			</tr>
			<tr>
				<td>(+)Outros Acr&eacute;scimos<p class="dados"></p></td>
			</tr>
			<tr>
				<td>(=)Valor Cobrado<p class="dados"></p></td>
			</tr>
			<tr>
				<td colspan="7">Sacado / Pagador<p class="sacado">MAURILIO DE OUTEIRO LIMA<br />RUA LUCIARA, 200 - CAMPO GRANDE <br />RIO DE JANEIRO - RJ - CEP: 23095-040</p></td>
				<td>C&oacute;d. Baixa</td>
			</tr>
		</table>
		</td>
	</tr>
	<tr>
		<td class="cod_bar">Sacador / Avalista 
				<?php
				include "../barcode/barcode.class";
				$bc = new BarcodeI25();
				$bc->SetCode("12345678901234567890123456789012345678904444");
				$bc->Generate();
				?>
		</td>
		<td>Autentica&ccedil;&atilde;o Mec&acirc;nica</td>
	</tr>
</table>
