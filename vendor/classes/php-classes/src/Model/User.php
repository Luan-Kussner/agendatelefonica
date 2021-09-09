<?php

namespace Agenda\Model;

use \Agenda\DB\Sql;
use \Agenda\Model;

class User extends Model
{

  public static function listAll()
  {
      $sql = new Sql();

     // return $sql->select("SELECT * FROM contatos a INNER JOIN telefone b USING(id_telefone) ORDER BY b.numero");

    //  return $sql->select("SELECT * FROM contatos a INNER JOIN cargo b USING(id_cargo) ORDER BY b.descricao");
    
   return $sql->select("SELECT ct.id_contato, ct.nome, cg.descricao, ct.email, tel.numero, ct.status
   FROM contatos as ct left JOIN telefone as tel on ct.id_telefone = tel.id_telefone
   left join cargo as cg on ct.id_cargo = cg.id_cargo");
  }

  public function save($dados)
  {
   //$dataCriacao = $this->formatarData($dados['criacao']);
       //$dataCriacao = new \DateTime("now");
       //$dataCriacao->format("Y-M-D HH:ii:ss");

       // $dataCriacao = \DateTime::createFromFormat('Y-m-d H:i:s', "now");

       $datetime = new \DateTime('now');
       $dataCriacao = $datetime->format('Y-m-d H:i:s');

       //date_default_timezone_set('America/Sao_Paulo');
       //$dataCriacao = new \DateTime("now", new \DateTimeZone("America/Sao_Paulo"));
       //$dataCriacao->setTimezone(new \DateTimeZone("America/Sao_Paulo"));
       //var_dump($dataCriacao);
       //exit;
      
       $conn = new Sql();
       
       $conn->query("INSERT INTO telefone (numero) VALUES ('{$dados['numero']}')");
       
       $telefone = $conn->select("SELECT id_telefone FROM telefone where numero = ('{$dados['numero']}')");
     
       $telefone1 = $telefone[0];
     
       $conn->query("INSERT INTO contatos (`nome`, `email`, `status`, `criacao`, `id_cargo`, `id_telefone`)
       VALUES ('{$dados['nome']}', '{$dados['email']}', '{$dados['status']}', '{$dataCriacao}', '{$dados['id_cargo']}', '{$telefone1['id_telefone']}')");

    }

    public function get($idcontato)
    {
        $sql = new Sql();

        $results = $sql->select("SELECT * FROM contatos a INNER JOIN telefone b USING(id_telefone)
        inner join cargo c using(id_cargo) WHERE a.id_contato = :id_contato",
        array(

        ":id_contato"=>$idcontato

        ));
       
        $this->setData($results[0]);
        
        
    } 

    public function update($dados)
    {

      $sql = new Sql();

      $sql->query("UPDATE telefone set numero = '{$dados['numero']}' where id_telefone = '{$dados['id_telefone']}'");
      $sql->query("UPDATE contatos set nome = '{$dados['nome']}', email = '{$dados['email']}', id_cargo = {$dados['id_cargo']}, status = 1 where (id_contato = {$dados['id_contato']})");
    
    }

    public function delete($id_contato)
    {
        $sql = new Sql();
        
       $results = $sql->query("DELETE FROM contatos where id_contato = :id_contato;",
    array(

        ":id_contato"=>$id_contato
    ));

    }
    
}
