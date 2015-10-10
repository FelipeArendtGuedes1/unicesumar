<?php
class Elevador {

	protected $andarAtual;
	protected $situacao;
	protected static $instance = NULL;
	protected $pessoas = array();
	
	private function __constructor()
	{
	}	
	
	public static function getInstance()
	{
		if (self::$instance == NULL){
			self::$instance = new self();
		}
		return self::$instance;
	}
	
	public function getSituacao()
	{
		return $this->situacao;
	}
	
	private function setSituacao($situacao)
	{
		$this->situacao = $situacao;
	}	
	
	public function getAndarAtual()
	{
		return $this->andarAtual;
	}

	private function setAndarAtual($andarAtual)
	{
		$this->andarAtual = $andarAtual;
	}
		
	public function getPessoas()
	{
		return $this->pessoas;
	}
		
	public function ativarElevador()
	{
		$this->setSituacao("Parado");
		$this->setAndarAtual(1);
	}
	
	public function inserirPessoa(Pessoa $pessoa)
	{
		$this->pessoas[] = $pessoa;
		echo "-> Pessoa (" . $pessoa->getNome() . ") entrou no elevador. Elevador está no " . Elevador::getInstance()->getAndarAtual() . "º andar. \n";
	}
	
	public function removerPessoa(Pessoa $pessoa)
	{
		foreach($this->pessoas as $index => $pessoaElevador){
			if ($pessoaElevador === $pessoa){
				unset($this->pessoas[$index]);
				echo "-> Pessoa (" . $pessoa->getNome() . ") saiu no elevador. Elevador está no " . Elevador::getInstance()->getAndarAtual() . "º andar. \n";
			}
		}
	}

	public function nivelarComAndar(Pessoa $pessoa)
	{
		Elevador::getInstance()->setSituacao("Em Movimento");
		echo "-> Pessoa (" . $pessoa->getNome() . ") chamou o elevador. \n";
		echo "	Pessoa (" . $pessoa->getNome() . ") está no " . $pessoa->getLocalizacao() . "º andar. Elevador está no " . Elevador::getInstance()->getAndarAtual() . "º andar. Portas Fechadas. \n";
		echo "	Elevador " . Elevador::getInstance()->getSituacao() . ". Qtde. Pessoas no elevador (" . count(Elevador::getInstance()->getPessoas()) . ");\n";
		echo "	Pessoa (" . $pessoa->getNome() . ") está no " . $pessoa->getLocalizacao() . "º andar. Elevador está no " . Elevador::getInstance()->getAndarAtual() . "º andar. \n";
			
		while ($pessoa->getLocalizacao() != Elevador::getInstance()->getAndarAtual()) {
			if ($pessoa->getLocalizacao() > Elevador::getInstance()->getAndarAtual())
			{
				Elevador::getInstance()->setAndarAtual(Elevador::getInstance()->getAndarAtual()+1);
		        echo "	Pessoa (" . $pessoa->getNome() . ") está no " . $pessoa->getLocalizacao() . "º andar. Elevador está no " . Elevador::getInstance()->getAndarAtual() . "º andar. \n";
				if ($pessoa->getLocalizacao() == Elevador::getInstance()->getAndarAtual())
				{
					Elevador::getInstance()->setSituacao("Parado");
					echo "	Elevador " . Elevador::getInstance()->getSituacao() . ". Qtde. Pessoas no elevador (" . count(Elevador::getInstance()->getPessoas()) . ");\n";
					echo "	Elevador está no " . Elevador::getInstance()->getAndarAtual() . "º andar. Portas abertas. \n";
				}				
			}elseif ($pessoa->getLocalizacao() < Elevador::getInstance()->getAndarAtual())
			{
				Elevador::getInstance()->setAndarAtual(Elevador::getInstance()->getAndarAtual()-1);
		        echo "	Pessoa (" . $pessoa->getNome() . ") está no " . $pessoa->getLocalizacao() . "º andar. Elevador está no " . Elevador::getInstance()->getAndarAtual() . "º andar. \n";
				if ($pessoa->getLocalizacao() == Elevador::getInstance()->getAndarAtual())
				{
					Elevador::getInstance()->setSituacao("Parado");
					echo "	Elevador " . Elevador::getInstance()->getSituacao() . ". Qtde. Pessoas no elevador (" . count(Elevador::getInstance()->getPessoas()) . ");\n";
					echo "	Elevador está no " . Elevador::getInstance()->getAndarAtual() . "º andar. Portas abertas. \n";
				}				
			}
		}
	}
	
	public function nivelarComAndarEscolhido(Pessoa $pessoa, $andar)
	{
		Elevador::getInstance()->setSituacao("Em Movimento");
		echo "-> Pessoa (" . $pessoa->getNome() . ") escolheu o " . $andar . "º andar. \n";
		echo "	Pessoa (" . $pessoa->getNome() . ") está no elevador. Elevador está no " . Elevador::getInstance()->getAndarAtual() . "º andar. Portas Fechadas. \n";
		echo "	Elevador " . Elevador::getInstance()->getSituacao() . ". Qtde. Pessoas no elevador (" . count(Elevador::getInstance()->getPessoas()) . ");\n";
		echo "	Pessoa (" . $pessoa->getNome() . ") está no elevador. Elevador está no " . Elevador::getInstance()->getAndarAtual() . "º andar. \n";
			
		while ($andar != Elevador::getInstance()->getAndarAtual()) {
			if ($andar > Elevador::getInstance()->getAndarAtual())
			{
				Elevador::getInstance()->setAndarAtual(Elevador::getInstance()->getAndarAtual()+1);
				$pessoa->setLocalizacao(Elevador::getInstance()->getAndarAtual());
				echo "	Pessoa (" . $pessoa->getNome() . ") está no elevador. Elevador está no " . Elevador::getInstance()->getAndarAtual() . "º andar. \n";
				if ($andar == Elevador::getInstance()->getAndarAtual())
				{
					Elevador::getInstance()->setSituacao("Parado");
					echo "	Elevador " . Elevador::getInstance()->getSituacao() . ". Qtde. Pessoas no elevador (" . count(Elevador::getInstance()->getPessoas()) . ");\n";
					echo "	Elevador está no " . Elevador::getInstance()->getAndarAtual() . "º andar. Portas abertas. \n";
				}
			}elseif ($andar < Elevador::getInstance()->getAndarAtual())
			{
				Elevador::getInstance()->setAndarAtual(Elevador::getInstance()->getAndarAtual()-1);
				$pessoa->setLocalizacao(Elevador::getInstance()->getAndarAtual());
				echo "	Pessoa (" . $pessoa->getNome() . ") está no elevador. Elevador está no " . Elevador::getInstance()->getAndarAtual() . "º andar. \n";
				if ($andar == Elevador::getInstance()->getAndarAtual())
				{
					Elevador::getInstance()->setSituacao("Parado");
					echo "	Elevador " . Elevador::getInstance()->getSituacao() . ". Qtde. Pessoas no elevador (" . count(Elevador::getInstance()->getPessoas()) . ");\n";
					echo "	Elevador está no " . Elevador::getInstance()->getAndarAtual() . "º andar. Portas abertas. \n";
				}
			}
		}
	}	
}

?>