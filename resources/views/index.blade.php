@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="row">
        <h3>Gráficos</h3>
        <hr>

        <div class="row">
            <div class="col-sm-3">
                <div class="label-group">
                    <label>Pesquisa:</label>
                </div>
                <i class="fa fa-caret-down select"></i>
                <select class="form-control" id="pesquisa" name="pesquisa">
                    <?php
                    echo '<option value="">Selecione a Pesquisa</option>';
                    foreach ($pesquisa as $key => $value)
                        echo '<option value="' . $key . '">' . $value . '</option>';
                    ?>
                </select>
            </div>

            <div class="col-sm-3">
                <div class="label-group">
                    <label>Unidade:</label>
                </div>
                <i class="fa fa-caret-down select"></i>
                <select class="form-control" id="unidade" name="unidade">
                    <option value="">Selecione a Unidade</option>
                </select>
            </div>
            <div id="treeview" class="col-sm-3">
                <div class="label-group">
                    <label>Categoria:</label>
                </div>
                <i class="fa fa-search"></i>
                <input type="text" id="categoria" class="form-control input-search" placeholder="Pesquisar Categoria">
                <div class="tree-menu no-active"></div>
            </div>
            <div class="col-sm-3">
                <div class="label-group">
                    <label>Tipo de Pesquisa:</label>
                </div>
                <input type="checkbox" checked="checked" id="tipo" data-toggle="toggle" data-on="Mercado" data-off="Empresa">
            </div>
            <div class="clearfix"></div>
            <div class="periodo-slider col-sm-12"></div>
        </div>

        <div id="grafico_coluna" class="chart"></div>
        <div id="grafico_linha" class="chart"></div>
        <div id="grafico_area" class="chart"></div>
    </div>
</div>
</div>

@endsection
