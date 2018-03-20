<?php
/**
 * Created by PhpStorm.
 * User: richard
 * Date: 20/03/18
 * Time: 14:01
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Products
 *
 * @ORM\Table(name="users")
 * @ORM\Entity
 */
class Users extends EntityAbstract
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="senha", type="string", length=255)
     */
    private $senha;


    /**
     * @var integer
     *
     * @ORM\Column(name="ativo_usu", type="integer")
     */
    private $ativo_usu;


}

