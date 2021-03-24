<?php 
ini_set('max_execution_time','-1');
require_once "SimpleXLSX.php";

setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
 
class ImportaPlanilha{
 
	// Atributo recebe a instância da conexão PDO
	private $conexao  = null;
 
     // Atributo recebe uma instância da classe SimpleXLSX
	private $planilha = null;
 
	// Atributo recebe a quantidade de linhas da planilha
	private $linhas   = null;
 
	// Atributo recebe a quantidade de colunas da planilha
	private $colunas  = null;
 
	/*
	 * Método Construtor da classe
	 * @param $path - Caminho e nome da planilha do Excel xlsx
	 * @param $conexao - Instância da conexão PDO
	 */
	public function __construct($path, $conexao){
 
		if(!empty($path) && file_exists($path)):
			$this->planilha = new SimpleXLSX($path);
			list($this->colunas, $this->linhas) = $this->planilha->dimension();
		else:
			echo 'Arquivo não encontrado!';
			exit();
		endif;
 
		if(!empty($conexao)):
			$this->conexao = $conexao;
		else:
			echo 'Conexão não informada!';
			exit();
		endif;
 
	}
 
	/*
	 * Método que retorna o valor do atributo $linhas
	 * @return Valor inteiro contendo a quantidade de linhas na planilha
	 */
	public function getQtdeLinhas(){
		return $this->linhas;
	}
 
	/*
	 * Método que retorna o valor do atributo $colunas
	 * @return Valor inteiro contendo a quantidade de colunas na planilha
	 */
	public function getQtdeColunas(){
		return $this->colunas;
	}
 
	/*
	 * Método para ler os dados da planilha e inserir no banco de dados
	 * @return Valor Inteiro contendo a quantidade de linhas importadas
	 */
	public function insertDados($filial){

		$sqlAtualizaTabela = 'UPDATE refeicao_principal
		SET
		deletar = 1
		WHERE filial = '.$filial;
		$stmt = mysqli_prepare($this->conexao, $sqlAtualizaTabela);
		mysqli_stmt_execute($stmt);
 
		try{
			
			$linha = 0;
			$retorno = true;
			foreach($this->planilha->rows() as $chave => $valor):
				if ($chave >= 1):

					$diaTemp    = explode(" - ",trim($valor[0]));
					$dia  = $diaTemp[0];

					$mes = date("n");

					$p1   = trim($valor[1]);
					$p2    = trim($valor[2]);
					$g1    = trim($valor[3]);
					$g2   = trim($valor[4]);
					$sa1    = trim($valor[5]);
					$sa2    = trim($valor[6]);
					$sa3   = trim($valor[7]);
					$sa4    = trim($valor[8]);
					$so1   = trim($valor[9]);
					$so2    = trim($valor[10]);

					if($linha >= 1 && $linha <= date("t")){
						$sql = 'INSERT INTO refeicao_principal (filial
						, dia
						, mes
						, prato_one
						, prato_two
						, guarnicao_one
						, guarnicao_two
						, salada_one
						, salada_two
						, salada_three
						, salada_four
						, sobremesa_one
						, sobremesa_two
						, deletar
						, date_create) 
						VALUES
						('.$filial.',
						'."'".$dia."'".',
						'.$mes.',
						'."'".$p1."'".',
						'."'".$p2."'".',
						'."'".$g1."'".',
						'."'".$g2."'".',
						'."'".$sa1."'".',
						'."'".$sa2."'".',
						'."'".$sa3."'".',
						'."'".$sa4."'".',
						'."'".$so1."'".',
						'."'".$so2."'".', 0, NOW())';

						$stmt = mysqli_prepare($this->conexao, $sql);

						$retorno = mysqli_stmt_execute($stmt);
					}

					if($retorno == true) $linha++;
				endif;
			endforeach;
 
			return $linha;
		}catch(Exception $erro){
			echo 'Erro: ' . $erro->getMessage();
		}
 
	}



	public function insertDadosDc($filial){

		$sqlAtualizaTabela = 'UPDATE refeicao_chef
		SET
		deletar = 1
		WHERE filial = '.$filial;
		$stmt = mysqli_prepare($this->conexao, $sqlAtualizaTabela);
		mysqli_stmt_execute($stmt);
 
		try{
			
			$linha = 0;
			$retorno = true;
			foreach($this->planilha->rows() as $chave => $valor):
				if ($chave >= 1):

					$diaTemp    = explode(" - ",trim($valor[0]));
					$dia  = $diaTemp[0];

					$mes = date("n");

					$p1   = trim($valor[1]);

					if($linha >= 1 && $linha <= date("t")){
						$sql = 'INSERT INTO refeicao_chef (filial
						, dia
						, mes
						, prato_one
						, deletar
						, date_create) 
						VALUES
						('.$filial.',
						'."'".$dia."'".',
						'.$mes.',
						'."'".$p1."'".',
						0, NOW())';

						$stmt = mysqli_prepare($this->conexao, $sql);

						$retorno = mysqli_stmt_execute($stmt);
					}

					if($retorno == true) $linha++;
				endif;
			endforeach;
 
			return $linha;
		}catch(Exception $erro){
			echo 'Erro: ' . $erro->getMessage();
		}
 
	}
}