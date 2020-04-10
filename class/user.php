<?php

class user extends bdd{

    private $id = NULL;
    private $login = NULL;
    private $mail = NULL;
    private $role = NULL;


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
                    $this->id = $result["id"];
                    $this->login = $result["login"];
                    $this->mail = $result["email"];
                    $this->id_droits = $result["id_droits"];
                    /*$_SESSION['login'] = $this->login ;
                    $_SESSION['mail'] = $this->mail ;
                    $_SESSION['id_droits'] = $this->id_droits ;

                    $infoUser = [$_SESSION['login'], $_SESSION['mail'], $_SESSION['id_droits']];*/
                    return [$this->id,$this->login,$this->mail,$this->id_droits];
                    
                    
                   
                }
                else{
                    return false;
                }
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }
    public function profil($login = "",$mail= "",$mdp = "",$confmdp=""){
        $this->connect();
    $request = "SELECT mdp FROM utilisateurs WHERE id = ".$this->id."";
    $query = mysqli_query($this->connexion,$request);
    $fetchmdp = mysqli_fetch_assoc($query);
        if(password_verify($confmdp,$fetchmdp["mdp"])){
            if($login != NULL){
                $request = "SELECT login FROM utilisateurs WHERE login = '$login'";
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
                $request = "SELECT mail FROM utilisateurs WHERE login = '$login'";
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
                $request = "UPDATE utilisateurs SET mdp = '$mdp' WHERE id = ".$this->id."";
                $query = mysqli_query($this->connexion,$request);
            }
            $request = "UPDATE utilisateurs SET login = '".$this->login."',mail = '".$this->mail."'WHERE id = ".$this->id."";
            $query = mysqli_query($this->connexion,$request);
        }
        else{
            return false;
        }
    }
    public function disconnect(){
        $this->id = NULL;
        $this->login = NULL;
        $this->mail = NULL;
        $this->role = NULL;
    }
    public function getid(){
        return $this->id;
    }
    public function isConnected(){
        if ($this->id != null) {
            return true;
        } else {
            return false;
        }
    }

    public function getlogin(){
        echo $this->login;
        return $this->login;
    }
    public function getrole(){
        return $this->id_droits;
    }

   
}
?>