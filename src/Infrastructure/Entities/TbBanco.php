<?php

namespace School\Infrastructure\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbBanco
 *
 * @ORM\Table(name="tb_banco")
 * @ORM\Entity
 */
class TbBanco
{
	/**
	 * @var int
	 *
	 * @ORM\Column(name="id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	private $id;

	/**
	 * @var string|null
	 *
	 * @ORM\Column(name="titular", type="string", length=255, nullable=true)
	 */
	private $titular;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="nome", type="string", length=80, nullable=false)
	 */
	private $nome;

	/**
	 * @var string|null
	 *
	 * @ORM\Column(name="endereco", type="string", length=255, nullable=true)
	 */
	private $endereco;

	/**
	 * @var int|null
	 *
	 * @ORM\Column(name="id_pais", type="integer", nullable=true)
	 */
	private $idPais;

	/**
	 * @var int|null
	 *
	 * @ORM\Column(name="id_estado", type="integer", nullable=true)
	 */
	private $idEstado;

	/**
	 * @var int|null
	 *
	 * @ORM\Column(name="id_cidade", type="integer", nullable=true)
	 */
	private $idCidade;

	/**
	 * @var string|null
	 *
	 * @ORM\Column(name="codigo_postal", type="string", length=20, nullable=true)
	 */
	private $codigoPostal;

	/**
	 * @var string|null
	 *
	 * @ORM\Column(name="codigo_swift", type="string", length=20, nullable=true)
	 */
	private $codigoSwift;

	/**
	 * @var string|null
	 *
	 * @ORM\Column(name="agencia", type="string", length=40, nullable=true)
	 */
	private $agencia;

	/**
	 * @var string|null
	 *
	 * @ORM\Column(name="conta", type="string", length=20, nullable=true)
	 */
	private $conta;

	/**
	 * @var string|null
	 *
	 * @ORM\Column(name="conta_banco_intermediario", type="string", length=20, nullable=true)
	 */
	private $contaBancoIntermediario;

	/**
	 * @var string|null
	 *
	 * @ORM\Column(name="instrucao_especiais", type="string", length=255, nullable=true)
	 */
	private $instrucaoEspeciais;

	/**
	 * @var string|null
	 *
	 * @ORM\Column(name="aba_numero", type="string", length=20, nullable=true)
	 */
	private $abaNumero;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="conta_sistema_reserva_federal", type="string", length=255, nullable=false, options={"default"="N"})
	 */
	private $contaSistemaReservaFederal = 'N';

	/**
	 * @var int
	 *
	 * @ORM\Column(name="id_fonte", type="integer", nullable=false)
	 */
	private $idFonte;

	/**
	 * @var int|null
	 *
	 * @ORM\Column(name="id_moeda", type="integer", nullable=true)
	 */
	private $idMoeda;

	/**
	 * @var \DateTime|null
	 *
	 * @ORM\Column(name="criado", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
	 */
	private $criado = 'CURRENT_TIMESTAMP';

	/**
	 * @var \DateTime|null
	 *
	 * @ORM\Column(name="excluido", type="datetime", nullable=true)
	 */
	private $excluido;

	/**
	 * @var int
	 *
	 * @ORM\Column(name="id_usuario", type="integer", nullable=false)
	 */
	private $idUsuario;



	/**
	 * Get id.
	 *
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Set titular.
	 *
	 * @param string|null $titular
	 *
	 * @return TbBanco
	 */
	public function setTitular($titular = null)
	{
		$this->titular = $titular;

		return $this;
	}

	/**
	 * Get titular.
	 *
	 * @return string|null
	 */
	public function getTitular()
	{
		return $this->titular;
	}

	/**
	 * Set nome.
	 *
	 * @param string $nome
	 *
	 * @return TbBanco
	 */
	public function setNome($nome)
	{
		$this->nome = $nome;

		return $this;
	}

	/**
	 * Get nome.
	 *
	 * @return string
	 */
	public function getNome()
	{
		return $this->nome;
	}

	/**
	 * Set endereco.
	 *
	 * @param string|null $endereco
	 *
	 * @return TbBanco
	 */
	public function setEndereco($endereco = null)
	{
		$this->endereco = $endereco;

		return $this;
	}

	/**
	 * Get endereco.
	 *
	 * @return string|null
	 */
	public function getEndereco()
	{
		return $this->endereco;
	}

	/**
	 * Set idPais.
	 *
	 * @param int|null $idPais
	 *
	 * @return TbBanco
	 */
	public function setIdPais($idPais = null)
	{
		$this->idPais = $idPais;

		return $this;
	}

	/**
	 * Get idPais.
	 *
	 * @return int|null
	 */
	public function getIdPais()
	{
		return $this->idPais;
	}

	/**
	 * Set idEstado.
	 *
	 * @param int|null $idEstado
	 *
	 * @return TbBanco
	 */
	public function setIdEstado($idEstado = null)
	{
		$this->idEstado = $idEstado;

		return $this;
	}

	/**
	 * Get idEstado.
	 *
	 * @return int|null
	 */
	public function getIdEstado()
	{
		return $this->idEstado;
	}

	/**
	 * Set idCidade.
	 *
	 * @param int|null $idCidade
	 *
	 * @return TbBanco
	 */
	public function setIdCidade($idCidade = null)
	{
		$this->idCidade = $idCidade;

		return $this;
	}

	/**
	 * Get idCidade.
	 *
	 * @return int|null
	 */
	public function getIdCidade()
	{
		return $this->idCidade;
	}

	/**
	 * Set codigoPostal.
	 *
	 * @param string|null $codigoPostal
	 *
	 * @return TbBanco
	 */
	public function setCodigoPostal($codigoPostal = null)
	{
		$this->codigoPostal = $codigoPostal;

		return $this;
	}

	/**
	 * Get codigoPostal.
	 *
	 * @return string|null
	 */
	public function getCodigoPostal()
	{
		return $this->codigoPostal;
	}

	/**
	 * Set codigoSwift.
	 *
	 * @param string|null $codigoSwift
	 *
	 * @return TbBanco
	 */
	public function setCodigoSwift($codigoSwift = null)
	{
		$this->codigoSwift = $codigoSwift;

		return $this;
	}

	/**
	 * Get codigoSwift.
	 *
	 * @return string|null
	 */
	public function getCodigoSwift()
	{
		return $this->codigoSwift;
	}

	/**
	 * Set agencia.
	 *
	 * @param string|null $agencia
	 *
	 * @return TbBanco
	 */
	public function setAgencia($agencia = null)
	{
		$this->agencia = $agencia;

		return $this;
	}

	/**
	 * Get agencia.
	 *
	 * @return string|null
	 */
	public function getAgencia()
	{
		return $this->agencia;
	}

	/**
	 * Set conta.
	 *
	 * @param string|null $conta
	 *
	 * @return TbBanco
	 */
	public function setConta($conta = null)
	{
		$this->conta = $conta;

		return $this;
	}

	/**
	 * Get conta.
	 *
	 * @return string|null
	 */
	public function getConta()
	{
		return $this->conta;
	}

	/**
	 * Set contaBancoIntermediario.
	 *
	 * @param string|null $contaBancoIntermediario
	 *
	 * @return TbBanco
	 */
	public function setContaBancoIntermediario($contaBancoIntermediario = null)
	{
		$this->contaBancoIntermediario = $contaBancoIntermediario;

		return $this;
	}

	/**
	 * Get contaBancoIntermediario.
	 *
	 * @return string|null
	 */
	public function getContaBancoIntermediario()
	{
		return $this->contaBancoIntermediario;
	}

	/**
	 * Set instrucaoEspeciais.
	 *
	 * @param string|null $instrucaoEspeciais
	 *
	 * @return TbBanco
	 */
	public function setInstrucaoEspeciais($instrucaoEspeciais = null)
	{
		$this->instrucaoEspeciais = $instrucaoEspeciais;

		return $this;
	}

	/**
	 * Get instrucaoEspeciais.
	 *
	 * @return string|null
	 */
	public function getInstrucaoEspeciais()
	{
		return $this->instrucaoEspeciais;
	}

	/**
	 * Set abaNumero.
	 *
	 * @param string|null $abaNumero
	 *
	 * @return TbBanco
	 */
	public function setAbaNumero($abaNumero = null)
	{
		$this->abaNumero = $abaNumero;

		return $this;
	}

	/**
	 * Get abaNumero.
	 *
	 * @return string|null
	 */
	public function getAbaNumero()
	{
		return $this->abaNumero;
	}

	/**
	 * Set contaSistemaReservaFederal.
	 *
	 * @param string $contaSistemaReservaFederal
	 *
	 * @return TbBanco
	 */
	public function setContaSistemaReservaFederal($contaSistemaReservaFederal)
	{
		$this->contaSistemaReservaFederal = $contaSistemaReservaFederal;

		return $this;
	}

	/**
	 * Get contaSistemaReservaFederal.
	 *
	 * @return string
	 */
	public function getContaSistemaReservaFederal()
	{
		return $this->contaSistemaReservaFederal;
	}

	/**
	 * Set idFonte.
	 *
	 * @param int $idFonte
	 *
	 * @return TbBanco
	 */
	public function setIdFonte($idFonte)
	{
		$this->idFonte = $idFonte;

		return $this;
	}

	/**
	 * Get idFonte.
	 *
	 * @return int
	 */
	public function getIdFonte()
	{
		return $this->idFonte;
	}

	/**
	 * Set idMoeda.
	 *
	 * @param int|null $idMoeda
	 *
	 * @return TbBanco
	 */
	public function setIdMoeda($idMoeda = null)
	{
		$this->idMoeda = $idMoeda;

		return $this;
	}

	/**
	 * Get idMoeda.
	 *
	 * @return int|null
	 */
	public function getIdMoeda()
	{
		return $this->idMoeda;
	}

	/**
	 * Set criado.
	 *
	 * @param \DateTime|null $criado
	 *
	 * @return TbBanco
	 */
	public function setCriado($criado = null)
	{
		$this->criado = $criado;

		return $this;
	}

	/**
	 * Get criado.
	 *
	 * @return \DateTime|null
	 */
	public function getCriado()
	{
		return $this->criado;
	}

	/**
	 * Set excluido.
	 *
	 * @param \DateTime|null $excluido
	 *
	 * @return TbBanco
	 */
	public function setExcluido($excluido = null)
	{
		$this->excluido = $excluido;

		return $this;
	}

	/**
	 * Get excluido.
	 *
	 * @return \DateTime|null
	 */
	public function getExcluido()
	{
		return $this->excluido;
	}

	/**
	 * Set idUsuario.
	 *
	 * @param int $idUsuario
	 *
	 * @return TbBanco
	 */
	public function setIdUsuario($idUsuario)
	{
		$this->idUsuario = $idUsuario;

		return $this;
	}

	/**
	 * Get idUsuario.
	 *
	 * @return int
	 */
	public function getIdUsuario()
	{
		return $this->idUsuario;
	}
}
