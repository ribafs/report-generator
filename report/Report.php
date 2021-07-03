<?php
require_once dirname(__FILE__)."/../autoload.php";

use \koolreport\KoolReport;
use \koolreport\processes\Filter;
use \koolreport\processes\TimeBucket;
use \koolreport\processes\Group;
use \koolreport\processes\Limit;

class Report extends KoolReport
{
    function settings()
    {
        // Configuração do banco
        return array(
            "dataSources"=>array(
                "data_src"=>array(
                    "connectionString"=>"$sgbd:host=$host;dbname=$db;port=$port",
                    "username"=>"$user",
                    "password"=>"$pass",
                    "charset"=>"utf8"
                ),
            )
        ); 
    }

    protected function setup()
    {
        // Configuração do relatório. Campos: date/mês - horizontal, value - vertical
        $this->src('data_src')
        ->query("SELECT $fieldVert,$fieldHor FROM $table")
        ->pipe(new TimeBucket(array(
            "$fieldHor"=>"month"
        )))
        ->pipe(new Group(array(
            "by"=>"$fieldHor",
            "sum"=>"$fieldVert"
        )))
        ->pipe($this->dataStore('data_store'));
    } 
}
