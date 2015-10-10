<?php
class ElevadorPessoaTest extends PHPUnit_Framework_TestCase {
	
	public function setUp()
	{
		spl_autoload_register(function($className){
			include $className . '.php';
		});
	}
	
	
	 public function testInstanciaElevador()
	 {
		 $elevador2 = Elevador::getInstance();
		 $elevador3 = Elevador::getInstance();
		 $this->assertInstanceOf('Elevador', $elevador2->getInstance());
		 $this->assertInstanceOf('Elevador', $elevador3->getInstance());
		 $this->assertEquals($elevador2, $elevador3);
	 }
	 
	 public function testInstanciaPessoa()
	 {
	 	$pessoa = new Pessoa();
	 	$this->assertInstanceOf('Pessoa', $pessoa);
	 }	 
	 
	 public function testOperacoes()
	 {
	 	$elevador = new Elevador();
	 	$this->assertEquals($elevador->getInstance(), Elevador::getInstance());
	 	Elevador::getInstance()->ativarElevador();
	 	$this->assertInternalType('object', Elevador::getInstance());
	 	$this->assertInstanceOf('Elevador', $elevador);
	 	$this->assertCount(0, Elevador::getInstance()->getPessoas());
	 	$this->assertEmpty(Elevador::getInstance()->getPessoas());
	 	
	 	$pessoa = new Pessoa();
	 	$pessoa->setNome("Felipe");
	 	$this->assertInternalType('object', $pessoa);
	 	$this->assertInstanceOf('Pessoa', $pessoa);
	 	$pessoa->setLocalizacao(4);
	 	echo "\n*Pessoa (" . $pessoa->getNome() . ") está no " . $pessoa->getLocalizacao() . "º andar. Elevador está no " . Elevador::getInstance()->getAndarAtual() . "º andar. \n";
	 	$this->assertGreaterThan(Elevador::getInstance()->getAndarAtual(), $pessoa->getLocalizacao());
	 	$pessoa->chamarElevador();	

	 	$pessoa2 = new Pessoa();
	 	$pessoa2->setNome("Felipe2");
	 	$this->assertInternalType('object', $pessoa2);
	 	$this->assertInstanceOf('Pessoa', $pessoa2);
	 	$pessoa2->setLocalizacao(5);
	 	echo "*Pessoa (" . $pessoa2->getNome() . ") está no " . $pessoa2->getLocalizacao() . "º andar. Elevador está no " . Elevador::getInstance()->getAndarAtual() . "º andar. \n";
	 	$this->assertGreaterThan(Elevador::getInstance()->getAndarAtual(), $pessoa2->getLocalizacao());
	 	$pessoa2->chamarElevador();
	 	
	 	$pessoa3 = new Pessoa();
	 	$pessoa3->setNome("Felipe3");
	 	$pessoa3->setLocalizacao(3);
	 	$this->assertInternalType('object', $pessoa3);
	 	$this->assertInstanceOf('Pessoa', $pessoa3);
	 	echo "*Pessoa (" . $pessoa3->getNome() . ") está no " . $pessoa3->getLocalizacao() . "º andar. Elevador está no " . $elevador->getInstance()->getAndarAtual() . "º andar. \n";
	 	$this->assertGreaterThan($pessoa3->getLocalizacao(), Elevador::getInstance()->getAndarAtual());
	 	$pessoa3->chamarElevador();
	 	$this->assertCount(0, Elevador::getInstance()->getPessoas());
	 	$this->assertEmpty(Elevador::getInstance()->getPessoas());
	 	$pessoa3->entrarElevador();
	 	$this->assertCount(1, Elevador::getInstance()->getPessoas());
	 	$pessoa3->escolherAndar(8);	
	 	$pessoa3->sairElevador();
	 	echo "*Pessoa (" . $pessoa3->getNome() . ") está no " . $pessoa3->getLocalizacao() . "º andar. Elevador está no " . $elevador->getInstance()->getAndarAtual() . "º andar. Qtde. Pessoas no elevador (" . count(Elevador::getInstance()->getPessoas()) . "); \n";	
	 
	 }
	 
	 
	
}

?>