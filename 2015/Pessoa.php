<?php
class Pessoa {
	
	protected $nome;
	protected $localizacao;
	
	public function __constructor()
	{
	}	
	
	public function getNome()
	{
		return $this->nome;
	}
	
	public function setNome($nome)
	{
		$this->nome = $nome;
	}
		
	public function getLocalizacao()
	{
		return $this->localizacao;
	}
	
	public function setLocalizacao($localizacao)
	{
		$this->localizacao = $localizacao;
	}
	
	public function chamarElevador()
	{
		Elevador::getInstance()->nivelarComAndar($this);
	}	
	
	public function escolherAndar($andar)
	{
		Elevador::getInstance()->nivelarComAndarEscolhido($this,$andar);
	}	
	
	public function entrarElevador()
	{
		Elevador::getInstance()->inserirPessoa($this);
	}
	
	public function sairElevador()
	{
		Elevador::getInstance()->removerPessoa($this);
	}
}

?>