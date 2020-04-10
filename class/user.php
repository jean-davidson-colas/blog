<?php

class user extends bdd{

    private $id = NULL;
    private $login = NULL;
    private $mail = NULL;
    private $id_droits = NULL;


    public function inscription($login,$mdp,$confmdp,$mail){
        if($login != NULL && $mdp != NULL && $confmdp != NULL && $mail != NULL){
            if($mdp == $confmdp){
                $this->connect();
                $requete = "SELECT login,mail FROM utilisateurs WHERE login = '$login' OR mail = '$mail'";
                $query = mysqli_query($this->connexion,$requete);
                $result = mysqli_fetch_all($query);
                
                if(empty($result)){
                    $mdp = password_hash($mdp, PASSWORD_BCRYPT, array('cost' => 12));
                    $requete ="INSERT INTO `utilisateurs` (`login`, `password`, `email`, `id_droits`) VALUES ('$login', '$mdp', '$mail', '1')";
                    //var_dump($requete);
                    $query = mysqli_query($this->connexion,$requete);
                    //var_dump($query);
                    
                     
                     //var_dump($requete);
                    return "ok";
                    }
                else{
                    return "log";
                }
            }
            else{
                return "mdp";
            }
        }
        else{
            return "empty";
        };

    }
    public function connexion($login,$mdp)
    {
        $this->connect();
        $requete = "SELECT * FROM utilisateurs WHERE login = '$login'";
        $query = mysqli_query($this->connexion,$requete);
        $result = mysqli_fetch_assoc($query);
        

        if(!empty($result))
        {
            if($login == $result["login"])
            {
                if(password_verify($mdp,$result["password"]))
                {
                    $_SESSION['id'] = $result['id'];
                    $_SESSION['login'] = $result['login'] ;
                    $_SESSION['email'] = $result['email'] ;
                    $_SESSION['id_droits'] =$result['id_droits'] ;
                    var_dump($_SESSION['id_droits']);
                    echo $requete;
                    var_dump($_SESSION);
                   //header('location:profil.php');
                    /*$infoUser = [$_SESSION['login'], $_SESSION['mail'], $_SESSION['id_droits']];*/
                    
                    
                    
                   
                }
                else{
                    echo "mot de passe errone";
                }
            }
            else{
                echo "login errone";
            }
        }
        else{
            return false;
        }
    }
    public function profil($login = "",$mail= "",$mdp = "",$confmdp=""){
        $this->connect();
    $request = "SELECT mdp FROM utilisateurs WHERE id = ".$_SESSION['id']."";
    $query = mysqli_query($this->connexion,$request);
    $fetchmdp = mysqli_fetch_assoc($query);
        if(password_verify($confmdp,$fetchmdp["mdp"])){
            if($login != NULL){
                $request = "SELECT login FROM utilisateurs WHERE id = ".$_SESSION['id']."";
                $query = mysqli_query($this->connexion,$request);
                $result = mysqli_fetch_all($query);
                if(empty($result)){
                    $this->login = $login;
                }
                else{
                    return false;
                }
            }
            if($mail != NULL){
                $request = "SELECT mail FROM utilisateurs WHERE id = ".$_SESSION['id']."";
                $query = mysqli_query($this->connexion,$request);
                $result = mysqli_fetch_all($query);
                if(empty($result)){
                    $this->mail = $mail;
                }
                else{
                    return false;
                }
            }
            if($mdp != NULL)
            {
                $mpd = password_hash($mdp, PASSWORD_BCRYPT, array('cost' => 12));
                $request = "UPDATE utilisateurs SET mdp = '$mdp' WHERE id = ".$_SESSION['id']."";
                $query = mysqli_query($this->connexion,$request);
            }
            $request = "UPDATE utilisateurs SET login = '".$login."',mail = '".$mail."'WHERE id = ".$_SESSION['id']."";
            $query = mysqli_query($this->connexion,$request);
        }
        else{
            return false;
        }
    }
    public function disconnect(){
        session_unset();
        session_destroy();
        header('location:index.php');
    }
   
    
    
   
}
?>