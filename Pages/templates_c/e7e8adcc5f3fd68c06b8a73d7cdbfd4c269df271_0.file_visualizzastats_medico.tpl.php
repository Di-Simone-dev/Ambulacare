<?php
/* Smarty version 5.3.0, created on 2024-06-30 10:42:01
  from 'file:visualizzastats_medico.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_66811a59a3d839_86545330',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e7e8adcc5f3fd68c06b8a73d7cdbfd4c269df271' => 
    array (
      0 => 'visualizzastats_medico.tpl',
      1 => 1719731977,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_66811a59a3d839_86545330 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_60796469466811a59a2a036_72446723', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_medico.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_60796469466811a59a2a036_72446723 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
?>


    <br>
    <div id="container" style="height: 500px;">
        <h2 style="margin-left:35px;">Statistiche nell'intervallo di tempo selezionato</h2>
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
        <button class="btn btn-primary" style="margin-left:35px;">Cambia intervallo di tempo</button>
    </div>
<br>

<?php
}
}
/* {/block 'content'} */
}
