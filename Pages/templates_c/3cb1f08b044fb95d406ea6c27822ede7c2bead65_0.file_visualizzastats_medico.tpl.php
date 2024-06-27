<?php
/* Smarty version 5.3.0, created on 2024-06-27 16:05:51
  from 'file:visualizzastats_medico.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_667d71bf7edfe6_57190434',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3cb1f08b044fb95d406ea6c27822ede7c2bead65' => 
    array (
      0 => 'visualizzastats_medico.tpl',
      1 => 1719497148,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_667d71bf7edfe6_57190434 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1441561793667d71bf7c6883_00325661', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_medico.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_1441561793667d71bf7c6883_00325661 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
?>


    <br><br><br><br><br>
    <div id="container" style="height: 500px;">
        <h2>Statistiche nell'intervallo di tempo selezionato</h2>
    <br>
    <?php echo '<script'; ?>
>
        function getData() {
            return [
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('statistiche'), 'esame');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('esame')->value) {
$foreach0DoElse = false;
?>
                ['<?php echo $_smarty_tpl->getValue('esame')['data'];?>
',<?php echo $_smarty_tpl->getValue('esame')['NumEsami'];?>
],
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            ];
        }
        // create a data set on our data
        var dataSet = anychart.data.set(getData());
        // map data for the line chart,
        // take x from the zero column and value from the first column
        var seriesData = dataSet.mapAs({ x: 0, value: 1 });
        //var matrice = new Array();
        //matrice=[['21/05',1],['22/05',2]];

        //document.write(matrice[0]);
        //document.write(getData()[4]);
        // create a line chart
        var chart = anychart.line();

        // configure the chart title text settings
        chart.title('Guadagno dal <?php echo $_smarty_tpl->getValue('data1');?>
 al <?php echo $_smarty_tpl->getValue('data2');?>
: <?php echo $_smarty_tpl->getValue('guadagno');?>
€');

        // set the y axis title
        chart.xAxis().title('intervallo di tempo');
        chart.yAxis().title('esami complessivi');

        // create a line series with the mapped data
        var lineChart = chart.line(seriesData);
        lineChart.name('esami giornalieri');
        //chart.legend().enabled(true);
        chart.crosshair().enabled(true).yStroke(null).yLabel(false);
        lineChart.hovered().markers().type("circle").size(4);
        lineChart.normal().stroke("#7b60a2", 2.5);

        // set the container id for the line chart
        chart.container('container');

            // draw the line chart
            chart.draw();
        <?php echo '</script'; ?>
>
    </div>
    <br><br><br><br>
    <div>
        <button class="btn btn-primary">Cambia intervallo di tempo</button>
    </div>

<?php
}
}
/* {/block 'content'} */
}
