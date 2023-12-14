<?php

    class DAO{

        // variable de connexion avec la base de données
        private $conn;

        // constructeur sans paramétres pour l'instanciation de la connexion avec la base de données
        public function __construct(){
            try {
                $this->conn = new PDO(DSN, Username, Password);
                // print "Connexion avec la base de données est effectuée avec succées";
            } catch (PDOException $ex) {
                // echo 'Ooops !!! connexion avec la base de données est echouée: ' . $ex->getMessage();
            }
        }

        /**
         * 
         * Les opérations CRUD avec la base de données
         * 
         */

        // la fonction "ajouter"
        public function ajouterNote($data){
            try {
                // recupérer les données à insérer
                $t = $data['titre'];
                $d = $data['description'];
                $s = 0;
                $ts = date('Y-m-d h:i:sa');

                // utiliser la variable de connexion pour ajouter les données recupérer dans la bd en se basant sur le tableau associative
                $req = $this->conn->prepare('INSERT INTO notes (title, description, status, created_at) VALUES (:tt, :dd, :ss, :tss)');
                $params = array(':tt' => $t, ':dd' => $d, ':ss' => $s, ':tss' => $ts);
                $req->execute($params);

                // message de vérification
                // echo "Les données ont étés ajoutée avec succées";

                // Ajouter la variable de session, dont l'objectif de mettre des alerts
                $_SESSION['added'] = "Les données ont étés ajoutée avec succées";
                // La redirection
                $this->redirect('index.php');
            } catch (PDOException $ex) {
                echo "Ooops !!! Erreur: " . $ex.getMessage();
            }
        }

        // La fonction récupérer tous les enregistrements
        public function getAllNotes(){
            try {
                // utiliser la variable de connexion pour récupérer tous les enregistrements
                $req = $this->conn->prepare('SELECT * FROM notes');
                $req->execute();

                // résultats à retourner
                $res = $req->fetchAll();
            } catch (PDOException $ex) {
                echo 'Erreur : ' . $ex->getMessage();
            }

            return $res;
        }

        // Une deuxiémme version de la fonction getAllNotes
        public function getAllNotesV2(){
            try {
                // utiliser la variable de connexion pour récupérer tous les enregistrements
                $req = $this->conn->prepare('SELECT * FROM notes');
                $req->execute();
                // echo gettype($req->fetch());
                // mettez résultats dans un tableau html
                while($res = $req->fetch(PDO::FETCH_OBJ)){
                    $output = "
                        <tr>
                            <td> $res->id </td>
                            <td> $res->title </td>
                            <td> $res->description </td>
                            <td> $res->status </td>
                            <td> $res->created_at </td>
                            <td colspan='2'>
                                <a href='updateN.php?idPB=$res->id' class='btn btn-success'> 
                                    <i class='fas fa-edit'></i>
                                </a>
                                <a href='deleteN.php?idPB=$res->id' class='btn btn-danger'> 
                                    <i class='fas fa-trash'></i>
                                </a>
                            </td>
                        </tr>
                    ";
                    echo $output;
                }
            } catch (PDOException $ex) {
                echo 'Erreur : ' . $ex->getMessage();
            }
        }

        // La fonction récuperer une note par l'identifiant
        public function getNoteByID($data){
            try {
                // récuperer l'identifiant de l'enregistrement à récupérer
                $idN = $data['idN'];

                // utiliser la variable de connexion pour récuperer l'enregistrement correspond à l'id
                $req = $this->conn->prepare('SELECT * FROM notes WHERE id = :idN');
                $params = array('idN' => $idN);
                $req->execute($params);

                // résultat à retourner
                $res = $req->fetch();
            } catch (PDOException $ex) {
                echo 'Erreur : ' . $ex->getMessage();
            }

            return $res;
        }

        // La fonction "supprimer"
        public function supprimerNote($data){
            try {
                // Récupérer l'id de la note à supprimer
                $idNote = $data['idN'];

                // utiliser la variable de connexion pour supprimer l'enregistrement associée à l'id passées en paramètre à travers tableau paramétré
                $req = $this->conn->prepare('DELETE FROM notes WHERE id = ?');
                $params = array($idNote);
                $req->execute($params);

                // message de vérification
                // echo 'L\'enregistrement correspond à l\'id est supprimé avec succées';

                $_SESSION['deleted'] = 'L\'enregistrement correspond à l\'id est supprimé avec succées';
                $this->redirect('index.php');
            } catch (PDOException $ex) {
                echo "Ooops !!! Erreur: " . $ex.getMessage();
            }
        }

        // La fonction "modifier"
        public function modifierNote($data){
            try {
                // Récupérer les données à modifier
                $idNote = $data['idN'];
                $t = $data['tit'];
                $d = $data['desc'];
                $s = $data['stat'];
                $ts = $data['tstamp'];

                // utiliser la variable de connexion pour faire la modification
                $req = $this->conn->prepare('UPDATE notes SET title=:tt, description=:dd, status=:ss, created_at=:tss WHERE id=:idd');
                $params = array(':tt' => $t, ':dd' => $d, ':ss' => $s, ':tss' => $ts, ':idd' => $idNote);
                $req->execute($params);

                // message de vérification
                // echo 'L\'enregistrement correspond à l\'id passées en paramètre est bien modifiée';

                $_SESSION['updated'] = 'L\'enregistrement correspond à l\'id passées en paramètre est bien modifiée';
                $this->redirect('index.php');
            } catch (PDOException $ex) {
                echo 'Erreur : ' . $ex->getMessage();
            }
        }

        // La fonction de redirection
        public function redirect($page){
            header('location:'.$page);
        }
       




    }


