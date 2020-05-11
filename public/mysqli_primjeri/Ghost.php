<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Ghost
 *
 * @author Algebra
 */
class Ghost{
  public $nazPred,$broj_upisanih_koji_su_izasli_na_ispit,$prosjek,$suma_ocjena;   
  public function __toString() {
      $detalji= sprintf("%s, broj upisanih: %d, prosjek: %d, zbroj ocijena: %d"
              ,$this->nazPred
              ,$this->broj_upisanih_koji_su_izasli_na_ispit
              ,$this->prosjek
              ,$this->suma_ocjena
              );
      return $detalji;
  }
}
