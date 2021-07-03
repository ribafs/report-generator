<?php 
    use \koolreport\widgets\koolphp\Table;
    use \koolreport\widgets\google\ColumnChart;
    use \koolreport\widgets\google\PieChart;
?>

<div class="report-content">
    <h1 class="text-center"><?php echo "$title"; ?></h1>

    <?php
    PieChart::create(array(
        "dataStore"=>$this->dataStore('data_store'),  
        "columns"=>array(
            "$fieldHor"=>array(
                "label"=>"$labelHor",
                "type"=>"datetime",
                "format"=>"Y-n",
                "displayFormat"=>"F, Y",
            ),
            "$fieldVert"=>array(
                "label"=>"$labelVert",
                "type"=>"number",
                "prefix"=>"$",
            )
        ),
        "width"=>"100%",
    ));
    ?>

    <?php
        ColumnChart::create([
            "dataSource"=>$this->dataStore("data_store"),
            "columns"=>[
                "$fieldHor",
                "$fieldVert"=>[
                    "style"=>function($row) {
                        switch($row["$fieldHor"])
                        {
                            case "$valueHor1":
                                return "color: #00F";
                            case "$valueHor2":
                                return "color: #0F0";
                            case "$valueHor3":
                                return "color: #F00";
                        }
                    }
                ]
            ],
            "width"=>"100%",
        ]);
    ?>

    <?php
    Table::create(array(
        "dataStore"=>$this->dataStore('data_store'),
        "columns"=>array(
            "$fieldHor" => array(
                "label"=>"$labelHor",
                "type"=>"datetime",
                "format"=>"Y-n",
                "displayFormat"=>"F, Y",
            ),
            "$fieldVert"=>array(
                "label"=>"$labelVert",
                "type"=>"number",
                "prefix"=>"$",
            )
        ),
        "cssClass"=>array(
            "table"=>"table table-hover table-bordered"
        )
    ));
    ?>
</div>

<br>
<hr>
<h3>Título da descrição</h3>
<p>Corpo da descrição do relatório</p>
