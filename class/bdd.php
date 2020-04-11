<?php

class bdd
{

    private $query="";
    protected $connexion = "";
    private $result=[];


    public function connect()
    {
        $connect = mysqli_connect('localhost', 'root', '','blog');
        //var_dump($connect);
        if($connect == false)
        {
            return false;
        }
        $this->connexion = $connect;
    }


    public function close(){
        mysqli_close($this->connexion);
    }


    public function execute($query)
    { 
        {
            $this->query=$query;
            $execute=mysqli_query($this->connexion, $query);

            // Si le résultat est un booléen 
            if(is_bool($execute))
            {
                $this->result=$execute;
            }
            // Si le résultat est un tableau
            else
            {
                $this->result=mysqli_fetch_all($execute);
            }

            return $this->result;
        }
    }

    public function delete()
    {
        
        if (!isset($_SESSION))
        {
           echo "Impossible de supprimer. Veuillez d'abord vous connecter.";
        }
        else
        {
            $connect = mysqli_connect("localhost", "root", "", "blog");
            $delete="DELETE FROM articles WHERE articles.id_utilisateur = '".$_POST['resat']."'";
            $query=mysqli_query($connect,$delete);
            
            $delete1="DELETE FROM commentaires WHERE commentaires.id_utilisateur = '".$_POST['resat']."' ";
            $query1=mysqli_query($connect,$delete1);
            
            $delete2="DELETE FROM utilisateurs WHERE utilisateurs.id = '".$_POST['resat']."'";
            $query2=mysqli_query($connect,$delete2);
            echo "Les informations ont bien été supprimer";

        }
    }
    public function SupprArticle()
    {
        
        
        if (!isset($_SESSION))
        {
           echo "Impossible de supprimer. Veuillez d'abord vous connecter.";
        }
        else
        {
            $connect = mysqli_connect("localhost", "root", "", "blog");
            $delete="DELETE FROM articles WHERE articles.id_utilisateur = '".$_POST['art']."'";
            $query=mysqli_query($connect,$delete);
            
            $delete1="DELETE FROM commentaires WHERE commentaires.id_utilisateur = '".$_POST['art']."' ";
            $query1=mysqli_query($connect,$delete1);
            
            echo "Les informations ont bien été supprimer";
            
        }
       
    }
    public function SupprCom()
    {
       
        
        if (!isset($_SESSION))
        {
           echo "Impossible de supprimer. Veuillez d'abord vous connecter.";
        }
        else
        {
            $connect = mysqli_connect("localhost", "root", "", "blog");
            $delete="DELETE FROM commentaires WHERE commentaires.id_utilisateur = '".$_POST['com']."' ";
            $query=mysqli_query($connect,$delete);
            
            echo "Les informations ont bien été supprimer";
            
        }
       
    }

    public function update($id)
    {
        $connect = mysqli_connect("localhost", "root", "", "blog");
        $update="UPDATE prix SET prix = ".$_POST[$id]." WHERE id = $id";
        $query_update=mysqli_query($connect,$update);
        echo "les informations ont bien été modifier.";
    }
}    
?>