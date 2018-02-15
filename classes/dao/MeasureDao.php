<?php

namespace dao;

use domain\Measure;

class MeasureDao extends DaoBdd
{

    public function __construct($config)
    {
        parent::__construct($config);
    }

    public function findAllMeasure() {

        $result = [];

        $reponse = $this->bdd->query("SELECT id, datetime, temperature, humidite FROM relevees order by id");

        while ($donnees = $reponse->fetch()) {

            $id = $donnees["id"];
            $datetime = $donnees["datetime"];
            $temperature= $donnees["temperature"];
            $humidite = $donnees["humidite"];
            

            $measure = new Measure($datetime, $temperature, $humidite);

            $result[] = $measure;
        }

        return $result;
    }

    public function findMeasureById($id)
       {

        $result = null;

        $query = $this->bdd->prepare("SELECT datetime, temperature, humidite FROM relevees where id = :id ");

        $query->bindParam(":id", $id);

        if ($query->execute()) {

            if ($donnees = $query->fetch()) {

                $datetime = $donnees["datetime"];
                $temperature = $donnees["temperature"];
                $humidite = $donnees["humidite"];



                $result = new Measure($datetime, $temperature, $humidite);
            }
        }

        return $result;
    }

    public function createMeasure($measure)
    {


        $query = $this->bdd->prepare("INSERT INTO relevees (datetime, temperature, humidite) VALUES (:datetime, :temperature, :humidite)");

        $query->bindParam(":datetime", $measure->datetime);
        $query->bindParam(":temperature", $measure->temperature);
        $query->bindParam(":humidite", $measure->humidite);

        $query->execute();

        $id = $this->bdd->lastInsertId();

        $measure->id = $id;

        return $id;

    }

    public function deleteMeasure($id) {

        $query = $this->bdd->prepare("DELETE FROM relevees WHERE id = :id");

        $query->bindParam(":id", $id);

        $query->execute();
    }
    public function updateMeasure($measure,$id) {



        $query = $this->bdd->prepare("UPDATE relevees SET datetime = :datetime, temperature = :temperature, humidite = :humidite WHERE id = :id");

        $query->bindParam(":datetime", $measure->datetime);

        $query->bindParam(":temperature", $measure->temperature);

        $query->bindParam(":humidite", $measure->humidite);

        $query->bindParam(":id", $id);


        $query->execute();
    }
}
