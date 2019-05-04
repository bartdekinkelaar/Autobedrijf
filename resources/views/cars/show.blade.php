<?php
/**
 * Created by PhpStorm.
 * User: Bartj
 * Date: 4-5-2019
 * Time: 16:37
 */
?>
@extends('welcome')
@section('title', 'Occasions')
@section('main')
    @parent
    <div class="col-md-12">
        <div class="voertuigpage row">
            <div class="row">
                <div class="voertuig_slider col-md-7">
                    <img src="../img/car_2.png"/>
                </div>
                @include('cars.features')
<!--                --><?php //dd($car); ?>
            </div>
        </div>
    </div>
    @include('footer')
@endsection