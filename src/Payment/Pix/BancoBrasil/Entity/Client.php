<?php

namespace Futuralibs\Paymentslib\Payment\Pix\BancoBrasil\Entity;

use Futuralibs\Futurautils\Trait\JsonSerializable\JsonWithOutNull;
use Futuralibs\Paymentslib\Payment\Pix\AbstractPixEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Futuralibs\Futurautils\Constraint as FuturaConstraint;

class Client extends AbstractPixEntity
{
    use JsonWithOutNull;

    /**
     * @var string|null
     *
     * @FuturaConstraint\Optional({
     *      @Assert\NotBlank,
     *      @Assert\NotNull,
     *      @Assert\Length(
     *          min = 10,
     *          max = 11,
     *          minMessage = "Your cpf must be at least {{ limit }} characters long",
     *          maxMessage = "Your cpf cannot be longer than {{ limit }} characters",
     *      ),
     *      @FuturaConstraint\CpfCnpj(cpf="true")
     * })
     */
    private ?string $cpf = null;

    /**
     * @var string|null
     *
     * @FuturaConstraint\Optional({
     *      @Assert\NotBlank,
     *      @Assert\NotNull,
     *      @Assert\Length(
     *          min = 10,
     *          max = 11,
     *          minMessage = "Your cnpj must be at least {{ limit }} characters long",
     *          maxMessage = "Your cnpj cannot be longer than {{ limit }} characters",
     *      ),
     *      @FuturaConstraint\CpfCnpj(cnpj="true")
     * })
     */
    private ?string $cnpj = null;

    /**
     * @var string
     * @Assert\NotBlank
     * @Assert\NotNull
     */
    private string $nome;

    /**
     * @return string|null
     */
    public function getCpf(): ?string
    {
        return $this->cpf;
    }

    /**
     * @param string|null $cpf
     * @return Client
     */
    public function setCpf(?string $cpf): self
    {
        $this->cpf = $cpf;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCnpj(): ?string
    {
        return $this->cnpj;
    }

    /**
     * @param string|null $cnpj
     * @return Client
     */
    public function setCnpj(?string $cnpj): self
    {
        $this->cnpj = $cnpj;
        return $this;
    }

    /**
     * @return string
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     * @return Client
     */
    public function setNome(string $nome): self
    {
        $this->nome = $nome;
        return $this;
    }

}