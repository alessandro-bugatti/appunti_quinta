<?php $this->layout('main_chart',
        [
                'argomento' => 'Grafico delle prenotazioni',
                'data_points' => $data_points,
                'username' => $username
        ]); ?>

<div id="chartContainer"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
