<!DOCTYPE HTML>
<html>
<head>
    <title>Valutazione</title>
</head>

<body>
    <?php
    function cssRating($name='voto'){
        $return = "
          <style>
          .rating {
           float:left;
          }
          .rating:not(:checked) > input {
            position:absolute;
            top:-9999px;
            clip:rect(0,0,0,0);
          }
          .rating:not(:checked) > label {
            float:right;
            width:1em;
            padding:0 .1em;
            overflow:hidden;
            white-space:nowrap;
            cursor:pointer;
            font-size:200%;
            line-height:1.2;
            color:#ddd;
            text-shadow:1px 1px #bbb, 2px 2px #666, .1em .1em .2em rgba(0,0,0,.5);
          }
          .rating:not(:checked) > label:before {
            content: '★ ';
          }
          .rating > input:checked ~ label {
            color: #f70;
            text-shadow:1px 1px #c60, 2px 2px #940, .1em .1em .2em rgba(0,0,0,.5);
          }
          .rating:not(:checked) > label:hover,
          .rating:not(:checked) > label:hover ~ label {
            color: gold;
            text-shadow:1px 1px goldenrod, 2px 2px #B57340, .1em .1em .2em rgba(0,0,0,.5);
          }
          .rating > input:checked + label:hover,
          .rating > input:checked + label:hover ~ label,
          .rating > input:checked ~ label:hover,
          .rating > input:checked ~ label:hover ~ label,
          .rating > label:hover ~ input:checked ~ label {
            color: #ea0;
            text-shadow:1px 1px goldenrod, 2px 2px #B57340, .1em .1em .2em rgba(0,0,0,.5);
          }
          .rating > label:active {
            position:relative;
            top:2px;
            left:2px;
          }
          </style>";
        $return .= '<fieldset class="rating">
          <input type="radio" id="star5" name="'.$name.'" value="5" /><label for="star5" title="Ottimo">5 stars</label>
          <input type="radio" id="star4" name="'.$name.'" value="4" /><label for="star4" title="Notevole">4 stars</label>
          <input type="radio" id="star3" name="'.$name.'" value="3" checked="checked" /><label for="star3" title="Buono">3 stars</label>
          <input type="radio" id="star2" name="'.$name.'" value="2" /><label for="star2" title="Non è il massimo">2 stars</label>
          <input type="radio" id="star1" name="'.$name.'" value="1" /><label for="star1" title="Sconsigliato">1 star</label>
          </fieldset>';
        return $return;
      }
      echo cssRating();
      ?>

</body>
</html>